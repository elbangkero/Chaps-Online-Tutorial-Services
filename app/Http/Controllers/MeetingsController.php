<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meetings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Classes\ZoomClasses;

class MeetingsController extends Controller
{
    public function meetings_index()
    {
        $meetings = $this->display_meetings();
        return view('home.manage_meetings.index', compact('meetings'));
    }
    public function join_meeting()
    {
        $meetings = $this->display_meetings();
        return view('home.manage_meetings.join_meeting', compact('meetings'));
    }
    public function create_meeting(ZoomClasses $zoomClasses, Request $request)
    {
        $rules = [
            'meeting_name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1|max:1800', // Duration must be an integer between 1 and 1800
        ];

        // Add conditional validation for `schedule_start`
        if (!$request->is_instant_meeting) {
            $rules['schedule_start'] = 'required|date|after_or_equal:now'; // Validate only if instantMeeting is false
        }

        $messages = [
            'meeting_name.required' => 'Please provide a meeting name.',
            'meeting_name.string' => 'The meeting name must be a valid string.',
            'meeting_name.max' => 'The meeting name must not exceed 255 characters.',

            'schedule_start.required' => 'The schedule start field is required.',
            'schedule_start.date' => 'The schedule start must be a valid datetime.',
            'schedule_start.after_or_equal' => 'The schedule start must be a future date.',

            'duration.required' => 'The duration field is required.',
            'duration.integer' => 'The duration must be a valid integer.',
            'duration.min' => 'The duration must be at least 1 minute.',
            'duration.max' => 'The duration cannot exceed 30 hours.',
        ];
        $request->validate($rules, $messages);
        $meetings_payload = [
            'agenda' => $request->meeting_name,  // Assuming $request->meeting_name is coming from your form or API request
            'default_password' => false,
            'duration' =>  $request->duration,
            'password' => 'chaps2021',
            'pre_schedule' => $request->is_instant_meeting == 0 ? false : true,
            'settings' => [
                'approved_or_denied_countries_or_regions' => [
                    'enable' => false,
                ],
                'host_video' => true,
                'participant_video' => true,
                'mute_upon_entry' => true,
                'approval_type' => 2,
                'waiting_room' => false,
                'join_before_host' => true,
            ],
            'start_time' => $request->is_instant_meeting == 0 ? Carbon::createFromFormat('Y-m-d\TH:i', $request->schedule_start, 'Asia/Manila')->setTimezone('UTC')->toIso8601String() : null,  // This should be in ISO 8601 format
            'timezone' => 'Asia/Manila',
            'topic' => $request->meeting_name,
            'type' => 2,
        ];

        $accessToken = DB::table('zoom_access_tokens')->limit(1)->pluck('access_token')->first();
        $zoom_response =  $zoomClasses->createMeeting($accessToken, $meetings_payload);
        $response = json_decode($zoom_response);

        $meetings = new Meetings();
        $meetings->agenda = $request->meeting_name;
        $meetings->duration = $request->duration;
        $meetings->password = 'chaps2021';
        $meetings->topic = $request->meeting_name;
        $meetings->timezone = 'Asia/Manila';
        $meetings->pre_schedule = $request->is_instant_meeting;
        $meetings->start_time =  $request->is_instant_meeting == 0 ? $request->schedule_start : null;
        $meetings->created_by = Auth::user()->full_name;

        if (isset($response->message) && $response->code == 124) {
            $access_token_response =  $zoomClasses->createAccessToken();
            $access_token = json_decode($access_token_response);
            DB::table('zoom_access_tokens')->updateOrInsert(
                ['id' => 1], // Unique condition (where clause)
                [
                    'access_token' => $access_token->access_token,
                    'expires_in' => $access_token->expires_in,
                    'token_type' => $access_token->token_type,
                    'scope' =>  $access_token->scope,
                    'api_url' => $access_token->api_url,
                    'updated_at' => now(), // Optionally update the timestamp
                ]
            );
            $retry =  $zoomClasses->createMeeting($access_token->access_token, $meetings_payload);
            $response = json_decode($retry);
            $meetings->meeting_id = isset($response->id) ? $response->id : null;
        }

        $meetings->meeting_id = isset($response->id) ? $response->id : null;
        $meetings->is_active = 1;
        $meetings->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Meeting created successfully!',
        ]);
    }

    private function display_meetings()
    {
        $meetings = DB::table('meetings')
            ->select([
                'meeting_id',
                'agenda',
                'pre_schedule',
                'duration',
                'created_by',
                DB::raw('DATE(created_at) AS created_date'),
                'timezone',
                DB::raw("
                CASE 
                    WHEN pre_schedule = 0 THEN DATE_FORMAT(start_time, '%a, %b %d')
                    WHEN pre_schedule = 1 THEN DATE_FORMAT(created_at, '%a, %b %d')
                END AS schedule_time
            "),
                DB::raw("
                CASE 
                    WHEN pre_schedule = 0 THEN TIME_FORMAT(start_time, '%h:%i %p')
                    WHEN pre_schedule = 1 THEN TIME_FORMAT(CONVERT_TZ(created_at, '+00:00', '+08:00'), '%h:%i %p')
                END AS start_time
            "),
                DB::raw("
                CASE 
                    WHEN pre_schedule = 0 THEN TIME_FORMAT(DATE_ADD(start_time, INTERVAL duration MINUTE), '%h:%i %p')
                    WHEN pre_schedule = 1 THEN TIME_FORMAT(CONVERT_TZ(DATE_ADD(created_at, INTERVAL duration MINUTE), '+00:00', '+08:00'), '%h:%i %p')
                END AS end_time
            "),
                DB::raw("
                CASE
                    WHEN pre_schedule = 0 AND start_time > CONVERT_TZ(NOW(), '+00:00', '+08:00') THEN 'Upcoming'
                    WHEN pre_schedule = 0 
                         AND start_time <= CONVERT_TZ(NOW(), '+00:00', '+08:00') 
                         AND DATE_ADD(start_time, INTERVAL duration MINUTE) >= CONVERT_TZ(NOW(), '+00:00', '+08:00') 
                         THEN 'Ongoing'
                    WHEN pre_schedule = 1 
                         AND CONVERT_TZ(created_at, '+00:00', '+08:00') <= CONVERT_TZ(NOW(), '+00:00', '+08:00') 
                         AND DATE_ADD(CONVERT_TZ(created_at, '+00:00', '+08:00'), INTERVAL duration MINUTE) >= CONVERT_TZ(NOW(), '+00:00', '+08:00') 
                         THEN 'Ongoing'
                    WHEN pre_schedule = 0 AND DATE_ADD(start_time, INTERVAL duration MINUTE) < CONVERT_TZ(NOW(), '+00:00', '+08:00') THEN 'Completed'
                    WHEN pre_schedule = 1 AND DATE_ADD(CONVERT_TZ(created_at, '+00:00', '+08:00'), INTERVAL duration MINUTE) < CONVERT_TZ(NOW(), '+00:00', '+08:00') THEN 'Completed'
                    ELSE 'Unknown'
                END AS status
            ")
            ])
            ->where('is_active', 1)
            ->whereRaw("!(DATE_ADD(CONVERT_TZ(created_at, '+00:00', '+08:00'), INTERVAL duration MINUTE) < CONVERT_TZ(NOW(), '+00:00', '+08:00') 
            || pre_schedule = 0 AND DATE_ADD(start_time, INTERVAL duration MINUTE) < CONVERT_TZ(NOW(), '+00:00', '+08:00'))")
            ->orderByRaw("
            CASE 
                WHEN status = 'Ongoing' THEN 1
                WHEN status = 'Upcoming' THEN 2
                WHEN status = 'Completed' THEN 3
                WHEN status = 'Cancelled' THEN 4
                ELSE 5
            END
        ")
            ->orderBy('pre_schedule', 'asc')
            ->orderByRaw("
            CASE
                WHEN pre_schedule = 0 THEN start_time
                ELSE NULL
            END ASC
        ")
            ->orderByRaw("
            CASE
                WHEN pre_schedule = 1 THEN created_at
                ELSE NULL
            END DESC
        ")
            ->get();

        return $meetings;
    }
    public function delete_meeting(ZoomClasses $zoomClasses, $meeting_id)
    {

        $accessToken = DB::table('zoom_access_tokens')->limit(1)->pluck('access_token')->first();
        $zoom_request =  $zoomClasses->deleteMeeting($accessToken, $meeting_id);
        $response = json_decode($zoom_request);

        if (isset($response->message) && $response->code == 124) {
            $access_token_response =  $zoomClasses->createAccessToken();
            $access_token = json_decode($access_token_response);
            DB::table('zoom_access_tokens')->updateOrInsert(
                ['id' => 1],
                [
                    'access_token' => $access_token->access_token,
                    'expires_in' => $access_token->expires_in,
                    'token_type' => $access_token->token_type,
                    'scope' =>  $access_token->scope,
                    'api_url' => $access_token->api_url,
                    'updated_at' => now(),
                ]
            );
            $zoom_request =  $zoomClasses->deleteMeeting($access_token->access_token, $meeting_id);
        }

        DB::table('meetings')
            ->where('meeting_id', $meeting_id)
            ->update(['is_active' => 0]);


        return redirect()->back()->with('error', 'Meeting Deleted. Meeting ID : ' . preg_replace('/(\d{3})(\d{4})(\d{4})/', '$1 $2 $3', $meeting_id) . '');
    }
    public function end_meeting(ZoomClasses $zoomClasses, $meeting_id)
    {
        $accessToken = DB::table('zoom_access_tokens')->limit(1)->pluck('access_token')->first();
        $zoom_request =  $zoomClasses->endMeeting($accessToken, $meeting_id);
        $response = json_decode($zoom_request);

        if (isset($response->message) && $response->code == 124) {
            $access_token_response =  $zoomClasses->createAccessToken();
            $access_token = json_decode($access_token_response);
            DB::table('zoom_access_tokens')->updateOrInsert(
                ['id' => 1],
                [
                    'access_token' => $access_token->access_token,
                    'expires_in' => $access_token->expires_in,
                    'token_type' => $access_token->token_type,
                    'scope' =>  $access_token->scope,
                    'api_url' => $access_token->api_url,
                    'updated_at' => now(),
                ]
            );
            $zoom_request =  $zoomClasses->endMeeting($access_token->access_token, $meeting_id);
        }
        return redirect()->back()->with('message', 'Successfully Ended. Meeting ID : ' . preg_replace('/(\d{3})(\d{4})(\d{4})/', '$1 $2 $3', $meeting_id) . '');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReviewersVideo as Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VideoController extends Controller
{
    public function videos()
    {
        $videos = DB::table('reviewers_video')->where('status', '=', 1)->get();
        return view('home.videos', compact('videos'));
    }
    public function edit_video($id)
    {
        $table = DB::table('reviewers_video')->where('status', '=', 1)->get();
        $edit_video = DB::table('reviewers_video')->where('id', '=', $id)->get();
        return view('home.manage_video.index', compact('table', 'edit_video'));
    }
    public function manage_videos()
    {
        $table = DB::table('reviewers_video')->where('status', '=', 1)->get();
        return view('home.manage_video.index', compact('table'));
    }
    public function view_video($id)
    {
        $video = DB::table('reviewers_video')->where('id', '=', $id)->first()->link;
        return view('home.view_video', compact('video'));
    }


    public function store_video(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);
        $myString = $request->link;
        $result = strstr($myString, '?v', false);

        $final_value = trim($result, '?v=');


        if (!empty($final_value)) {
            $thumbnail =   'https://img.youtube.com/vi/' . $final_value . '/mqdefault.jpg';

            $video = new Video();
            $video->name = $request->name;
            $video->created_by = Auth::user()->full_name;
            $video->status = $request->status == null ? 0 : 1;
            $video->link = $final_value;
            $video->thumbnail = $thumbnail;
            $video->save();
        }

        $vid_link =  empty($final_value) ? back()->with('delete', 'Link not working') :  back()->with('success', 'Registered Successfully');

        return $vid_link;


        //dd($final_value);
    }
    public function delete_video($id)
    {

        Video::where('id', $id)->update(['status' => '0']);
        return back()->with('delete', 'Your Data has been Deleted');
    }
    public function update_video(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);
        $myString = $request->input('link');
        $result = strstr($myString, '?v', false);

        $final_value = trim($result, '?v=');

        if (!empty($final_value)) {
            $update = [
                'name' => $request->input('name'),
                'link' => $final_value,
                'status' => $request->status == null ? 0 : 1,
            ];

            DB::table('reviewers_video')
                ->where('id', $id)
                ->update($update);
        }

        $vid_link =  empty($final_value) ? back()->with('delete', 'Link not working') :  back()->with('success', 'Registered Successfully');

        return $vid_link;
    }
}

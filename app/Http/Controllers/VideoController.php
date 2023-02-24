<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReviewersVideo as Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VideoController extends Controller
{
    public function videos(Request $request)
    {
        $keyword = $request->keyword;
        $user_id = Auth::user()->id;
        $folder = $request->folder;
        $folders_pdf = DB::table('folders')->where([['status', 1], ['folder_type', 'pdf'], ['parent_id', 0]])->get();
        $folders_video = DB::table('folders')->where([['status', 1], ['parent_id', 0], ['folder_type', 'video']])->get();
        $video_items = DB::table(DB::raw('users a'))->select('a.id', 'a.email', 'a.full_name', 's.service_name', DB::raw('(
            CASE 
                WHEN a.user_type =\'1\' THEN \'Admin\' 
                WHEN a.user_type =\'2\' THEN \'Student\' 
            END) AS user_type'), DB::raw('(
            CASE 
                WHEN a.user_type =\'1\' THEN (select GROUP_CONCAT(id) from reviewers_video where status = 1)
                WHEN a.user_type =\'2\' THEN (select GROUP_CONCAT(id) from reviewers_video where status = 1) 
            END) AS video_items'))->leftJoin(DB::raw('services s'), 's.id', '=', 'a.service_id')->where('a.id', '=',    $user_id)->first();

        $str_arr_video = preg_split("/\,/", $video_items->video_items);


        if (!empty($keyword)) {
            $videos = DB::table('reviewers_video')->whereIn('id', $str_arr_video)->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'DESC')->paginate(12);
        } elseif (!empty($folder)) {
            //$pdf = DB::table('reviewers_pdf')->where('status', '=', 1)->paginate(12);
            $videos = DB::table('reviewers_video')->whereIn('id', $str_arr_video)->where('folder_id', $folder)->orderBy('id', 'DESC')->paginate(12);
        } else {

            $videos = DB::table('reviewers_video')->whereIn('id', $str_arr_video)->where('status', '=', 1)->orderBy('id', 'DESC')->paginate(12);
        }
        $page = $request->page;
        return view('home.videos', compact('videos', 'keyword', 'page', 'folders_pdf', 'folders_video'));
    }
    public function edit_video($id)
    {
        $table = DB::table('reviewers_video')->where('status', '!=', 2)->get();
        $edit_video = DB::table('reviewers_video')->where('id', '=', $id)->get();
        $selected_folder = DB::table(DB::raw('reviewers_video rp'))->select('f.id', 'f.name')->leftJoin(DB::raw('folders f'), 'f.id', '=', 'rp.folder_id')->where('rp.id', '=', $id)->first();
        $parent  = DB::table('folders')->where([['status', 1], ['folder_type', 'video'], ['parent_id', 0]])->get();
        return view('home.manage_video.index', compact('table', 'edit_video', 'selected_folder', 'parent'));
    }
    public function manage_videos()
    {
        $parent  = DB::table('folders')->where([['status', 1], ['folder_type', 'video'], ['parent_id', 0]])->get();
        $table = DB::table('reviewers_video')->where('status', '!=', 2)->get();
        return view('home.manage_video.index', compact('table', 'parent'));
    }
    public function view_video($id)
    {
        $folders_video = DB::table('folders')->where([['status',1],['parent_id',0],['folder_type','video']])->get();
        $folders_pdf = DB::table('folders')->where([['status',1],['folder_type','pdf'],['parent_id',0]])->get();
        $video = DB::table('reviewers_video')->where('id', '=', $id)->first()->link;
        return view('home.view_video', compact('video','folders_pdf','folders_video'));
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
            $video->folder_id = $request->folder_id;
            $video->thumbnail = $thumbnail;
            $video->save();
        }

        $vid_link =  empty($final_value) ? back()->with('delete', 'Link not working') :  back()->with('success', 'Registered Successfully');

        return $vid_link;


        //dd($final_value);
    }
    public function delete_video($id)
    {

        Video::where('id', $id)->update(['status' => '2']);
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
                'folder_id' =>  $request->folder_id,
            ];

            DB::table('reviewers_video')
                ->where('id', $id)
                ->update($update);
        }

        $vid_link =  empty($final_value) ? back()->with('delete', 'Link not working') :  back()->with('success', 'Registered Successfully');

        return $vid_link;
    }
}

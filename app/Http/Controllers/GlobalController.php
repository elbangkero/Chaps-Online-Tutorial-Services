<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GlobalController extends Controller
{
    public function login_page()
    {
        return view('login_page');
    }
    public function student_registration()
    {
        $services = DB::table('services')->where('status', '=', 1)->get();
        return view('home.registration', compact('services'));
    }
    public function dashboard()
    {

        return view('home.dashboard');
    }
    public function search_engine(Request $request)
    {
        $user_id = Auth::user()->id;

        $keyword = $request->keyword;
        $page = $request->page;
        $user_type = DB::table('users')->select('id', 'full_name', 'user_type')->where('id', '=', $user_id)->first();
        if ($user_type->user_type == '1') {

            $keyword = $request->keyword;
            $pdf_search = DB::table('reviewers_pdf')->select('id', 'name', DB::raw('"pdf" as type'),'created_at as first_entry','created_by as last_entry',DB::raw('"" as email'))->where([['name', 'LIKE', '%' . $keyword . '%'],['status',1]]);
            $video_search = DB::table('reviewers_video')->select('id', 'name', DB::raw('"videos" as type'),'created_at as first_entry','created_by as last_entry',DB::raw('"" as email'))->where([['name', 'LIKE', '%' . $keyword . '%'],['status',1]])
                ->unionAll($pdf_search);
            $result = DB::table('users')->select('id', 'full_name as name', DB::raw('"users" as type'),'user_type as first_entry','updated_at  as last_entry','email')->where([['full_name', 'LIKE', '%' . $keyword . '%'],['status',1]])
                ->unionAll($video_search)->paginate(24);
 
            return view('home.search_engn_result',compact('result','keyword'));
        } else {
            $keyword = $request->keyword;
            $pdf_search = DB::table('reviewers_pdf')->select('id', 'name', DB::raw('"pdf" as type'),'created_at as first_entry','created_by as last_entry',DB::raw('"" as email'))->where([['name', 'LIKE', '%' . $keyword . '%'],['status',1]]);
            $result = DB::table('reviewers_video')->select('id', 'name', DB::raw('"videos" as type'),'created_at as first_entry','created_by as last_entry',DB::raw('"" as email'))->where([['name', 'LIKE', '%' . $keyword . '%'],['status',1]])
                ->unionAll($pdf_search)->paginate(24);
          
            return view('home.search_engn_result',compact('result','keyword'));
        }
    }
}

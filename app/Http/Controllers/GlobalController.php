<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalController extends Controller
{
    public function login_page()
    {
        return view('login_page');
    }
    public function student_registration()
    {
        $services = DB::table('services')->where('status','=',1)->get();
        return view('home.registration',compact('services'));
    }
    public function dashboard()
    {
        
        return view('home.dashboard');
    }
}

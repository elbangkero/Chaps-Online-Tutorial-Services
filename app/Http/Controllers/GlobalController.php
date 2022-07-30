<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function login_page()
    {
        return view('login_page');
    }
}

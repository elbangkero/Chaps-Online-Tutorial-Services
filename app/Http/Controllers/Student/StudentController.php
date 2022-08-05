<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentUser as Students;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store_students(Request $request)
    {

        $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'contact_number' => 'required',
            'exam_takes' => 'required',
            'email' => 'required|unique:student_users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        //convert dates
        $new_date_graduated = $request->date_graduated;
        $date_graduated = strtotime($new_date_graduated); 

        $new_date_of_birth = $request->date_of_birth;
        $date_of_birth = strtotime($new_date_of_birth); 

        $students = new Students();
        $students->full_name = $request->full_name;
        $students->address = $request->address;
        $students->date_of_birth = date('Y-m-d', $date_of_birth);
        $students->contact_number = $request->contact_number;
        $students->school_graduated = $request->school_graduated;
        $students->date_graduated = date('Y-m-d', $date_graduated);
        $students->exam_takes = $request->exam_takes;
        $students->email = $request->email;
        $students->password = Hash::make($request['password']);
        $students->save();
        return back()->with('success', 'Registered Successfully');
        //dd('success');

    }
}

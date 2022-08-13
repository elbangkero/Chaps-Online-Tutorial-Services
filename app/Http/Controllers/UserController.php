<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ChapsUser as Users;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function store_admin(Request $request)
    {

        $request->validate([
            'full_name' => 'required',
            'password' => 'required|min:3|confirmed',
            'email' => 'required|unique:users,email',
        ]);

        $admin = new Users();
        $admin->full_name = $request->full_name;
        $admin->user_type = 1;
        $admin->status = 1;
        $admin->email = $request->email;
        $admin->password = Hash::make($request['password']);
        $admin->save();
        return back()->with('success', 'Registered Successfully');
        //dd('success');

    }

    public function admin_index()
    {
        $table =  DB::table('users')
            ->where([['user_type', 1], ['status', 1]])
            ->orderBy('id', 'DESC')->get();
        return view('home.manage_admin.index', compact('table'));
    }
    public function delete_admin($id)
    {

        Users::where('id', $id)->update(['status' => '2']);
        return back()->with('delete', 'Your Data has been Deleted');
    }
    public function edit_admin($id)
    {
        $edit_admin = DB::table('users')
            ->where('id', $id)
            ->get();
        $table =  DB::table('users')
            ->where([['user_type', 1], ['status', 1]])
            ->orderBy('id', 'DESC')->get();
        return view('home.manage_admin.index', compact('edit_admin', 'table'));
    }
    public function update_admin(Request $request, $id)
    {
        $request->validate([
            'email' => 'unique:users,email,' . $id . '',
            'password' => 'min:3|confirmed',
        ]);
        $update = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request['password']),
        ];

        DB::table('users')
            ->where('id', $id)
            ->update($update);

        return back()->with('success', 'Your Data has been Update');
    }
    public function student_index()
    {
        $table =  DB::table('users')
            ->where([['user_type', 2], ['status', 1]])
            ->orderBy('id', 'DESC')->get();
        return view('home.manage_students.index', compact('table'));
    }
    public function store_students(Request $request)
    {

        $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'contact_number' => 'required',
            'exam_takes' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        //convert dates
        $new_date_graduated = $request->date_graduated;
        $date_graduated = strtotime($new_date_graduated);

        $new_date_of_birth = $request->date_of_birth;
        $date_of_birth = strtotime($new_date_of_birth);

        $students = new Users();
        $students->full_name = $request->full_name;
        $students->address = $request->address;
        $students->user_type = 2;
        $students->status = 1;
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


    public function delete_student($id)
    {
        Users::where('id', $id)->update(['status' => '2']);
        return back()->with('delete', 'Your Data has been Deleted');
    }
}

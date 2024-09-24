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
        $admin->is_active = 1;
        $admin->email = $request->email;
        $admin->email_verified_at = '2022-08-29 04:45:47';
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
            'password' => 'confirmed',
        ]);
        $pass = $request->input('password');
        if (!empty($pass)) {
            $update = [
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request['password']),
            ];
        } else {
            $update = [
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
            ];
        }

        DB::table('users')
            ->where('id', $id)
            ->update($update);
        
        // Return a JSON response for the Ajax request
        return response()->json([
            'status' => 'success',
            'message' => $id,
            'heheh' => $pass,
            'dsada' => $request->input('email'),
        ]);
    }
    public function student_index()
    {
        $table =  DB::table('users')->where([['user_type', 2], ['status', '!=', 2]])->get();

        $select_service = DB::table('services')->where('status', '=', 1)->get();
        return view('home.manage_students.index', compact('table', 'select_service'));
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
        $students->status =  1;
        $students->is_active = $request->is_active == null ? 0 : 1;
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
    public function edit_student($id)
    {
        $edit_student = DB::table(DB::raw('users a'))
            ->select('a.*', 'b.service_name')
            ->leftJoin(DB::raw('services b'), 'b.id', '=', 'a.service_id')
            ->where('a.id', '=', $id)->get();


        $table =  DB::table('users')
            ->where([['user_type', 2], ['status', '!=', 2]])
            ->orderBy('id', 'DESC')->get();

        $select_service = DB::table('services')->where('status', '=', 1)->get();
        return view('home.manage_students.index', compact('table', 'select_service', 'edit_student'));
    }
    public function update_student(Request $request, $id)
    {

        $request->validate([
            'email' => 'unique:users,email,' . $id . '',
            'password' => 'confirmed',
        ]);

        $new_date_of_birth = $request->date_of_birth;
        $date_of_birth = strtotime($new_date_of_birth);


        $new_date_graduated = $request->date_graduated;
        $date_graduated = strtotime($new_date_graduated);


        $pass = $request->input('password');
        if (!empty($pass)) {
            $update = [
                'full_name' => $request->input('full_name'),
                'address' => $request->input('address'),
                'user_type' => 2,
                'status' => 1,
                'is_active' => $request->is_active == null ? 0 : 1,
                'service_id' => $request->input('service_id'),
                'date_of_birth' => date('Y-m-d', $date_of_birth),
                'contact_number' => $request->input('contact_number'),
                'school_graduated' => $request->input('school_graduated'),
                'date_graduated' => date('Y-m-d', $date_graduated),
                'exam_takes' => $request->input('exam_takes'),
                'email' => $request->input('email'),
                'password' => Hash::make($request['password']),
            ];
        } else {
            $update = [
                'full_name' => $request->input('full_name'),
                'address' => $request->input('address'),
                'user_type' => 2,
                'status' => 1,
                'is_active' => $request->is_active == null ? 0 : 1,
                'service_id' => $request->input('service_id'),
                'date_of_birth' => date('Y-m-d', $date_of_birth),
                'contact_number' => $request->input('contact_number'),
                'school_graduated' => $request->input('school_graduated'),
                'date_graduated' => date('Y-m-d', $date_graduated),
                'exam_takes' => $request->input('exam_takes'),
                'email' => $request->input('email'),
            ];
        }



        DB::table('users')
            ->where('id', $id)
            ->update($update);

        return back()->with('success', 'Your Data has been Update');
    }
}

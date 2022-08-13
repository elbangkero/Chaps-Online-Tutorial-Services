<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChapsUser as Users;
use App\Models\ReviewersPDF as PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Imagick;

class HomeController extends Controller
{

    public function admin_index()
    {
        $table =  DB::table('users')
            ->where([['user_type', 1], ['status', 1]])
            ->orderBy('id', 'DESC')->get();
        return view('home.manage_admin.index', compact('table'));
    }
    public function student_index()
    {
        $table =  DB::table('users')
            ->where([['user_type', 2], ['status', 1]])
            ->orderBy('id', 'DESC')->get();
        return view('home.manage_students.index', compact('table'));
    }
    public function reviewers()
    {
        $pdf = DB::table('reviewers_pdf')->where('status', '=', 1)->get();
        return view('home.reviewers', compact('pdf'));
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
    public function delete_admin($id)
    {

        Users::where('id', $id)->update(['status' => '0']);
        return back()->with('delete', 'Your Data has been Deleted');
    }

    public function delete_student($id)
    {
        Users::where('id', $id)->update(['status' => '0']);
        return back()->with('delete', 'Your Data has been Deleted');
    }
    public function view_reviewers($id)
    {
        $pdf_path = DB::table('reviewers_pdf')->select('path')->where('id', '=', $id)->first()->path;
        //dd($pdf_path);
        return view('home.view_reviewers', compact('id', 'pdf_path'));
    }

    public function manage_reviewers()
    {
        $table = DB::table('reviewers_pdf')->where('status', '!=', 2)->get();
        return view('home.manage_reviewers.index', compact('table'));
    }
    public  function store_reviewers(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $prefix_img = Str::random(10);
        $file_path = $request->file('path');
        if (!empty($file_path)) {


            $pdf = new PDF();
            $pdf->name = $request->name;
            //file upload to db and storage
            $extension = $file_path->getClientOriginalName();
            $filename = $extension;
            $file_path->move('storage/app/public/pdf/', $prefix_img . '_' . $filename);
            $pdf->path = 'public/storage/pdf/' . $prefix_img . '_' . $filename;
            $pdf->thumbnail = ("storage/converted/" . $prefix_img . "_" . "" . $filename . "" . ".png");


            //file upload to db and storage
            $pdf->created_by =   Auth::user()->full_name;
            $pdf->status = $request->status == null ? 0 : 1;
            $pdf->save();

            $pdfThumb = new Imagick();
            $pdfThumb->setResolution(25, 25);
            $pdfThumb->readImage(public_path("storage/pdf/" . $prefix_img . "_" . "" . $filename . ""));
            $pdfThumb->setImageFormat('png');
            $pdfThumb->setIteratorIndex(0);
            $fp = public_path("storage/converted/" . $prefix_img . "_" . "" . $filename . "" . ".png");
            $pdfThumb->writeImage($fp);
            return back()->with('success', 'Registered Successfully');
        }
        return back()->with('delete', 'File Upload Error');
    }
    public function display_pdf(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data =  DB::select('
           
            SELECT * FROM reviewers_pdf
            WHERE id IN (' . $query . ')');
            echo json_encode(['result' => $data]);
        } else {
            return "not existing";
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ReviewersPDF as PDF;
use Illuminate\Support\Str;
use Imagick;

class ReviewerController extends Controller
{

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
    public function edit_reviewers($id)
    {
        $edit_pdf = DB::table('reviewers_pdf')
            ->where('id', $id)
            ->get();
        $table = DB::table('reviewers_pdf')->where('status', '!=', 2)->get();
        return view('home.manage_reviewers.index', compact('edit_pdf', 'table'));
    }
    public function update_reviewers(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $prefix_img = Str::random(10);
        $file_path = $request->file('path');


        if (!empty($file_path)) {



            $extension = $file_path->getClientOriginalName();
            $filename = $extension;
            $file_path->move('storage/app/public/pdf/', $prefix_img . '_' . $filename);


            $update = [

                'name' => $request->input('name'),
                'status' => $request->status == null ? 0 : 1,
                'path' => 'public/storage/pdf/' . $prefix_img . '_' . $filename,
                'thumbnail' => ("storage/converted/" . $prefix_img . "_" . "" . $filename . "" . ".png")
            ];

            DB::table('reviewers_pdf')
                ->where('id', $id)
                ->update($update);

            $pdfThumb = new Imagick();
            $pdfThumb->setResolution(25, 25);
            $pdfThumb->readImage(public_path("storage/pdf/" . $prefix_img . "_" . "" . $filename . ""));
            $pdfThumb->setImageFormat('png');
            $pdfThumb->setIteratorIndex(0);
            $fp = public_path("storage/converted/" . $prefix_img . "_" . "" . $filename . "" . ".png");
            $pdfThumb->writeImage($fp);


            return back()->with('success', 'Your Data has been Update');
        }
        $update = [

            'name' => $request->input('name'),
            'status' => $request->status == null ? 0 : 1,
        ];
        DB::table('reviewers_pdf')
            ->where('id', $id)
            ->update($update);
        return back()->with('success', 'Your Data has been Update');
    }
    public function delete_reviewers($id)
    {

        PDF::where('id', $id)->update(['status' => '2']);
        return back()->with('delete', 'Your Data has been Deleted');
    }
    public function view_reviewers($id)
    {
        $pdf_path = DB::table('reviewers_pdf')->select('path')->where('id', '=', $id)->first()->path;
        //dd($pdf_path);
        return view('home.view_reviewers', compact('id', 'pdf_path'));
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
    public function reviewers(Request $request)
    {
        $user_id = Auth::user()->id;

        $reviewer_items = DB::table(DB::raw('users a'))->select('a.id','a.email','a.full_name','s.service_name',DB::raw('(
            CASE 
                WHEN a.user_type =\'1\' THEN \'Admin\' 
                WHEN a.user_type =\'2\' THEN \'Student\' 
            END) AS user_type'),DB::raw('(
            CASE 
                WHEN a.user_type =\'1\' THEN (select GROUP_CONCAT(id) from reviewers_pdf where status = 1)
                WHEN a.user_type =\'2\' THEN s.reviewer_items 
            END) AS reviewer_items'))->leftJoin(DB::raw('services s'),'s.id','=','a.service_id')->where('a.id','=',$user_id)->first();

        $str_arr = preg_split("/\,/", $reviewer_items->reviewer_items);


        $keyword = $request->keyword;


        if (!empty($keyword)) {

            //$pdf = DB::table('reviewers_pdf')->where('name', 'LIKE', '%' . $keyword . '%')->paginate(12);
            $pdf = DB::table('reviewers_pdf')->whereIn('id', $str_arr)->where('name', 'LIKE', '%' . $keyword . '%')->paginate(12);
        } else {
            //$pdf = DB::table('reviewers_pdf')->where('status', '=', 1)->paginate(12);
            $pdf = DB::table('reviewers_pdf')->whereIn('id', $str_arr)->paginate(12);
        }
        $page = $request->page;
        return view('home.reviewers', compact('pdf', 'page', 'keyword'));


        //dd($current_display_pdf);
    }
}

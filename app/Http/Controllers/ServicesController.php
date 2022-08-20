<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ServicesController extends Controller
{
    protected $casts = [
        'reviewer_items' => 'array',
    ];
    public function services_index()
    {
        $pdf_reviewer = DB::table('reviewers_pdf')->where('status', '=', 1)->get();
        $table = DB::table('services')->where('status', '=', 1)->get();
        return view('home.manage_services.index', compact('pdf_reviewer', 'table'));
    }
    public function store_services(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $service = new Services();
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->created_by = Auth::user()->full_name;
        $service->status = $request->status == null ? 0 : 1;
        $service->reviewer_items = implode(',', $request->reviewer_items);


        $service->save();

        return back()->with('success', 'Registered Successfully');
        //$data = $request->all();
        //dd($data);
    }
    public function gcash()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://g.payx.ph/payment_request',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'x-public-key' => 'pk_c22d67cf56e9160477c9fa15f1bb613a',
                'amount' => '1',
                'description' => 'Payment for services rendered',
                'customername' => 'Robert John Gajelomo',
                'customermobile' => '09611573154',
                'customeremail' => 'gajelomo16@gmail.com',
                'webhooksuccessurl' => 'https://chapsonlinets2021.com/'



            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        dd($response);
    }
    public function edit_services($id)
    {


        $selected = DB::table('services')->where('id', '=', $id)->first();

        $str_arr = preg_split("/\,/", $selected->reviewer_items);
        $pdf_reviewer = DB::table('reviewers_pdf')->whereNotIn('id', $str_arr)->get();
        $table = DB::table('services')->where('status', '=', 1)->get();
        $edit_service = DB::table('services')->where('id', '=', $id)->get();


        $selected_pdf = DB::table(DB::raw('reviewers_pdf'))->whereIn('id', $str_arr)->get();

        //dd($selected_pdf);
        return view('home.manage_services.index', compact('pdf_reviewer', 'table', 'edit_service', 'selected_pdf'));
    }
    public function update_services(Request $request, $id)
    {
        $request->validate([
            'service_name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $update = [
            'service_name' => $request->input('service_name'),
            'price' =>  $request->input('price'),
            'description' => $request->input('description'),
            'status' => $request->status == null ? 0 : 1,
            'reviewer_items' =>   $request->reviewer_items == null ? "" : implode(',', $request->reviewer_items),
        ];

        DB::table('services')
            ->where('id', $id)
            ->update($update);

        return back()->with('success', 'Your Data has been Update');
    }
    public function delete_services($id)
    {

        Services::where('id', $id)->update(['status' => '2']);
        return back()->with('delete', 'Your Data has been Deleted');
    }
}

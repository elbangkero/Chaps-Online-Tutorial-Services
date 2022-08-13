<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    protected $casts = [
        'reviewer_items' => 'array',
    ];
    public function services_index()
    {
        return view('home.manage_services.index');
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
        $service->status = implode(',', $request->reviewer_items);


        $service->save();

        return back()->with('success', 'Registered Successfully');
        //$data = $request->all();
        //dd($data);
    }
}

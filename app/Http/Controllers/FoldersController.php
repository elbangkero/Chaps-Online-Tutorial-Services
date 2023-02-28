<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoldersController extends Controller
{
    public function folders_index()
    {
        $table =  DB::table('folders')
            ->where('status', 1)
            ->orderBy('id', 'DESC')->get();
        $parent  = DB::table('folders')->where([['status', 1], ['parent_id', 0]])->get();
        return view('home.manage_folders.index', compact('table', 'parent'));
    }
    public function store_folders(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'folder_type' => 'required',
        ]);

        $folders = new Folders();
        $folders->name = $request->name;
        $folders->folder_type = $request->folder_type;

        ($request->parent_option == null) ? $folders->parent_id = $request->parent_id : $folders->parent_id = 0;

        //$folders->parent_id = $request->parent_id;
        $folders->created_by = Auth::user()->full_name;
        $folders->status = 1;



        $folders->save();

        return back()->with('success', 'Registered Successfully');
        //$data = $request->all();
        //dd($request->parent_option);
    }

    public function delete_folders($id)
    {

        Folders::where('id', $id)->update(['status' => '2']);
        Folders::where('parent_id', $id)->update(['status' => '2']);
        return back()->with('delete', 'Your Data has been Deleted');
    }
    public function edit_folders($id)
    {
        $table =  DB::table('folders')
            ->where('status', 1)
            ->orderBy('id', 'DESC')->get();
        $edit_folder = DB::table('folders')->where('id', '=', $id)->get();
        $parent  = DB::table('folders')->where([['status', 1], ['parent_id', 0]])->get();
        $selected_parent = DB::table('folders')->whereRaw('id = (select parent_id FROM folders where id = ' . $id . ')')->first();
        return view('home.manage_folders.index', compact('table', 'parent', 'edit_folder', 'selected_parent'));
    }
    public function update_folders(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'folder_type' => 'required',
        ]);  

        $update = [
            'name' => $request->name,
            'folder_type' => $request->folder_type, 
            'parent_id' =>  ($request->parent_option == null) ? $request->parent_id : 0, 
        ];

      
        DB::table('folders')
            ->where('id', $id)
            ->update($update); 

        return back()->with('success', 'Your Data has been Update');
    }
}

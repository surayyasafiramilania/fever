<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $title = "User"; 

    public function dataTable(Request $request){
        $data = User::select('*')->latest('id');
        if($request->ajax()){
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('role', function($row){
                return role($row->role);
            })
            ->addColumn('action', function($row){
                return '<center><a href="javascript:void(0)" class="btn btn-light btn-outline-primary btn-sm editButton" data-id="'.$row->id.'"><i class="icon-note menu-icon before:text-primary"> Edit</i></a> 
                <a href="javascript:void(0)" class="btn btn-light btn-outline-danger btn-sm delButton" data-id="'.$row->id.'"><i class="icon-trash menu-icon before:text-danger"> Delete</i></a></center>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['data'] = User::all();
        return view('user.index',$data);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->id){
            $data= User::find($request->id);
            if(! $data){
                abort(404);
            }
            $request->validate([
                'name' => 'required|min:2|max:40',
                'email' => 'required',
                'password' => 'required',
            ]);
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return response()->json([
                'success' => 'Data User Berhasil diupdate'
            ], 201);
        }
        else {
            $request->validate([
                'name' => 'required|min:2|max:40',
                'email' => 'required',
                'password' => 'required',
            ]);
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'role' => $request->role,
            ]);
            return response()->json([
                'success' => 'Data User Berhasil disimpan'
            ], 201);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = User::find($id);
        if(! $data) {
            abort(404);
        }
        return $data;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $data = User::find($id)->delete();
    }
}

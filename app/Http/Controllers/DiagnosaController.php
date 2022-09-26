<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DiagnosaController extends Controller
{
    public $title = "Diagnosa Penyakit";

    public function dataTable(Request $request){
        $data = Diagnosa::select('*');
        if($request->ajax()){
            return DataTables::of($data)
            ->addIndexColumn()
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
        $data['data'] = Diagnosa::all();
        return view('diagnosa.index',$data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if($request->id){
            $data= Diagnosa::find($request->id);
            if(! $data){
                abort(404);
            }
            $request->validate([
                'nama_diagnosa' => 'required',
                'deskripsi' => 'required',
                'pengobatan' => 'required',
                'pencegahan' => 'required',
            ]);
            $data->update([
                'nama_diagnosa' => $request->nama_diagnosa,
                'deskripsi' => $request->deskripsi,
                'pengobatan' => $request->pengobatan,
                'pencegahan' => $request->pencegahan,
            ]);
            return response()->json([
                'success' => 'Data User Berhasil diupdate'
            ], 201);
        }
        else {
            $request->validate([
                'nama_diagnosa' => 'required',
                'deskripsi' => 'required',
                'pengobatan' => 'required',
                'pencegahan' => 'required',
            ]);
            Diagnosa::create([
                'nama_diagnosa' => $request->nama_diagnosa,
                'deskripsi' => $request->deskripsi,
                'pengobatan' => $request->pengobatan,
                'pencegahan' => $request->pencegahan,
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
        $data = Diagnosa::find($id);
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
        $data = Diagnosa::find($id)->delete();
    }
}

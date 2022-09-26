<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PelatihanController extends Controller
{
    public $title = "Pelatihan";

    public function status($id){
        Pelatihan::query()->update(['status'=>false]);
        $data = Pelatihan::find($id);
        $data->status=true;
        $data->save();
        return True;
    }

    public function dataTable(Request $request){
        $data = Pelatihan::select('*')->latest('id');
        if($request->ajax()){
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('akurasi', function($row){
                return $row->akurasi." %";
            })
            ->editColumn('status', function($row){
                return $row->status ? 'Aktif':'Tidak Aktif';
            })
            ->addColumn('action', function($row){
                return '<center><a href="javascript:void(0)" class="btn btn-light btn-outline-danger btn-sm statusButton" data-id="'.$row->id.'"><i class="icon-star menu-icon before:text-danger"></i></a>&nbsp;&nbsp;
                <a href="javascript:void(0)" class="btn btn-light btn-outline-danger btn-sm delButton" data-id="'.$row->id.'"><i class="icon-trash menu-icon before:text-danger"></i></a></center>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

    }
    
    public function connectPython(Request $request)
    {
        $k = $request->k_ketetanggaan;
        $exp = $request->exp;
        $cmd = "python pelatihan.py ".$exp." ".$k;
        $command = escapeshellcmd($cmd);
        $output = shell_exec($command);
        Pelatihan::create([
            'k_ketetanggaan'=>$request->k_ketetanggaan,
            'exp'=>$request->exp,
            'akurasi'=>$output,
            'status'=>false,
        ]);
        return 'berhasil';
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['data'] = Pelatihan::all();
        return view('pelatihan.index',$data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $data = Pelatihan::find($id)->delete();
    }
}

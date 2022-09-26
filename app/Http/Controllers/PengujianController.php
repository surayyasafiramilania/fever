<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pengujian;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PengujianController extends Controller
{
    public $title = "Pengujian";

    public function dataTable(Request $request){
        $data = Pengujian::select('*')->latest('id');
        if($request->ajax()){
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('akurasi', function($row){
                return $row->akurasi." %";
            })
            ->addColumn('k_ketetanggaan', function($row){
                return $row->pelatihan->k_ketetanggaan;
            })
            ->addColumn('exp', function($row){
                return $row->pelatihan->exp;
            })
            ->addColumn('action', function($row){
                return '<center><a href="javascript:void(0)" class="btn btn-light btn-outline-danger btn-sm delButton" data-id="'.$row->id.'"><i class="icon-trash menu-icon before:text-danger"> Delete</i></a></center>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

    }
    
    public function connectPython(Request $request)
    {
        $pelatihan_id = $request->pelatihan_id;
        $pelatihan = Pelatihan::find($pelatihan_id);
        $cmd = "python pengujian.py ".$pelatihan->exp." ".$pelatihan->k_ketetanggaan;
        $command = escapeshellcmd($cmd);
        $output = shell_exec($command);
        Pengujian::create([
            'pelatihan_id'=>$request->pelatihan_id,
            'akurasi'=>$output,
        ]);
        return 'berhasil';
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['data'] = Pengujian::all();
        $data['pelatihan'] = Pelatihan::where('status', True)->first();
        return view('pengujian.index',$data);
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
        $data = Pengujian::find($id)->delete();
    }
}

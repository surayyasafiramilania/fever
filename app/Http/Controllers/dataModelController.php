<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class dataModelController extends Controller
{
    public $title = "Data Model Penyakit Demam";

    public function dataTable(Request $request){
        $data = Dataset::join('data_model','dataset.id', '=', 'data_model.dataset_id')
                ->select(['data_model.*','dataset.*']);
        if($request->ajax()){
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('jenis_kelamin', function($row){
                return gender($row->jenis_kelamin);
            })
            ->editColumn('g1', function($row){
                return gejala($row->g1);
            })
            ->editColumn('g2', function($row){
                return gejala($row->g2);
            })
            ->editColumn('g3', function($row){
                return gejala($row->g3);
            })
            ->editColumn('g4', function($row){
                return gejala($row->g4);
            })
            ->editColumn('g5', function($row){
                return gejala($row->g5);
            })
            ->editColumn('g6', function($row){
                return gejala($row->g6);
            })
            ->editColumn('g7', function($row){
                return gejala($row->g7);
            })
            ->editColumn('g8', function($row){
                return gejala($row->g8);
            })
            ->editColumn('g9', function($row){
                return gejala($row->g9);
            })
            ->editColumn('g10', function($row){
                return gejala($row->g10);
            })
            ->editColumn('g11', function($row){
                return gejala($row->g11);
            })
            ->editColumn('g12', function($row){
                return gejala($row->g12);
            })
            ->editColumn('g13', function($row){
                return gejala($row->g13);
            })
            ->editColumn('g14', function($row){
                return gejala($row->g14);
            })
            ->editColumn('g15', function($row){
                return gejala($row->g15);
            })
            ->editColumn('g16', function($row){
                return gejala($row->g16);
            })
            ->editColumn('g17', function($row){
                return gejala($row->g17);
            })
            ->editColumn('g18', function($row){
                return gejala($row->g18);
            })
            ->editColumn('g19', function($row){
                return gejala($row->g19);
            })
            ->editColumn('g20', function($row){
                return gejala($row->g20);
            })
            ->editColumn('g21', function($row){
                return gejala($row->g21);
            })
            ->editColumn('g22', function($row){
                return gejala($row->g22);
            })
            ->editColumn('g23', function($row){
                return gejala($row->g23);
            })
            ->editColumn('g24', function($row){
                return gejala($row->g24);
            })
            ->editColumn('g25', function($row){
                return gejala($row->g25);
            })
            ->editColumn('g26', function($row){
                return gejala($row->g26);
            })
            ->editColumn('g27', function($row){
                return gejala($row->g27);
            })
            ->editColumn('g28', function($row){
                return gejala($row->g28);
            })
            ->editColumn('g29', function($row){
                return gejala($row->g29);
            })
            ->editColumn('diagnosa_id', function($row){
                return $row->diagnosa->nama_diagnosa;
            })
            ->addColumn('action', function($row){
                return '<center><a href="javascript:void(0)" class="btn btn-light btn-outline-warning btn-sm showButton" data-id="'.$row->id.'"><i class="icon-eye menu-icon before:text-warning"></i></a></center>';
            })
            ->make(true);
        }
    }

    public function index()
    {
        $data['title'] = $this->title;
        return view('data-model.index',$data);
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
        $data = Dataset::join('data_model','dataset.id', '=', 'data_model.dataset_id')
                ->select(['data_model.*','dataset.*'])
                ->find($id);
        return response()->json($data);
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
        //
    }
}

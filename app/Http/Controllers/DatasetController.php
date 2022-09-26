<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Diagnosa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatasetController extends Controller
{
    public $title = "Dataset Pasien Demam";

    public function dataTable(Request $request){
        $data = Dataset::select('*');
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
                return '<center><a href="javascript:void(0)" class="btn btn-light btn-outline-warning btn-sm showButton" data-id="'.$row->id.'"><i class="icon-eye menu-icon before:text-warning"></i></a>
                <a href="javascript:void(0)" class="btn btn-light btn-outline-primary btn-sm editButton" data-id="'.$row->id.'"><i class="icon-note menu-icon before:text-primary"></i></a> 
                <a href="javascript:void(0)" class="btn btn-light btn-outline-danger btn-sm delButton" data-id="'.$row->id.'"><i class="icon-trash menu-icon before:text-danger"></i></a></center>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['data'] = Dataset::all();
        $data['diagnosa'] = Diagnosa::all();
        return view('dataset.index',$data);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if($request->id){
            $data= Dataset::find($request->id);
            if(! $data){
                abort(404);
            }
            $request->validate([
                'nama_pasien' => 'required|min:2|max:40',
                'jenis_kelamin' => 'required',
                'umur' => 'required',
                'diagnosa_id' => 'required',
            ]);
            $data->update([     
                'nama_pasien' => $request->nama_pasien,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => $request->umur,
                'g1' => isset($request->g[1]) ? 1 : 0,
                'g2' => isset($request->g[2]) ? 1 : 0,
                'g3' => isset($request->g[3]) ? 1 : 0,
                'g4' => isset($request->g[4]) ? 1 : 0,
                'g5' => isset($request->g[5]) ? 1 : 0,
                'g6' => isset($request->g[6]) ? 1 : 0,
                'g7' => isset($request->g[7]) ? 1 : 0,
                'g8' => isset($request->g[8]) ? 1 : 0,
                'g9' => isset($request->g[9]) ? 1 : 0,
                'g10' => isset($request->g[10]) ? 1 : 0,
                'g11' => isset($request->g[11]) ? 1 : 0,
                'g12' => isset($request->g[12]) ? 1 : 0,
                'g13' => isset($request->g[13]) ? 1 : 0,
                'g14' => isset($request->g[14]) ? 1 : 0,
                'g15' => isset($request->g[15]) ? 1 : 0,
                'g16' => isset($request->g[16]) ? 1 : 0,
                'g17' => isset($request->g[17]) ? 1 : 0,
                'g18' => isset($request->g[18]) ? 1 : 0,
                'g19' => isset($request->g[19]) ? 1 : 0,
                'g20' => isset($request->g[20]) ? 1 : 0,
                'g21' => isset($request->g[21]) ? 1 : 0,
                'g22' => isset($request->g[22]) ? 1 : 0,
                'g23' => isset($request->g[23]) ? 1 : 0,
                'g24' => isset($request->g[24]) ? 1 : 0,
                'g25' => isset($request->g[25]) ? 1 : 0,
                'g26' => isset($request->g[26]) ? 1 : 0,
                'g27' => isset($request->g[27]) ? 1 : 0,
                'g28' => isset($request->g[28]) ? 1 : 0,
                'g29' => isset($request->g[29]) ? 1 : 0,
                'diagnosa_id' => $request->diagnosa_id,
            ]);
            return response()->json([
                'success' => 'Data User Berhasil diupdate'
            ], 201);
        }
        else {
            $request->validate([
                'nama_pasien' => 'required|min:2|max:40',
                'jenis_kelamin' => 'required',
                'umur' => 'required',
                'diagnosa_id' => 'required',
            ]);
            Dataset::create([
                'nama_pasien' => $request->nama_pasien,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => $request->umur,
                'g1' => isset($request->g[1]) ? 1 : 0,
                'g2' => isset($request->g[2]) ? 1 : 0,
                'g3' => isset($request->g[3]) ? 1 : 0,
                'g4' => isset($request->g[4]) ? 1 : 0,
                'g5' => isset($request->g[5]) ? 1 : 0,
                'g6' => isset($request->g[6]) ? 1 : 0,
                'g7' => isset($request->g[7]) ? 1 : 0,
                'g8' => isset($request->g[8]) ? 1 : 0,
                'g9' => isset($request->g[9]) ? 1 : 0,
                'g10' => isset($request->g[10]) ? 1 : 0,
                'g11' => isset($request->g[11]) ? 1 : 0,
                'g12' => isset($request->g[12]) ? 1 : 0,
                'g13' => isset($request->g[13]) ? 1 : 0,
                'g14' => isset($request->g[14]) ? 1 : 0,
                'g15' => isset($request->g[15]) ? 1 : 0,
                'g16' => isset($request->g[16]) ? 1 : 0,
                'g17' => isset($request->g[17]) ? 1 : 0,
                'g18' => isset($request->g[18]) ? 1 : 0,
                'g19' => isset($request->g[19]) ? 1 : 0,
                'g20' => isset($request->g[20]) ? 1 : 0,
                'g21' => isset($request->g[21]) ? 1 : 0,
                'g22' => isset($request->g[22]) ? 1 : 0,
                'g23' => isset($request->g[23]) ? 1 : 0,
                'g24' => isset($request->g[24]) ? 1 : 0,
                'g25' => isset($request->g[25]) ? 1 : 0,
                'g26' => isset($request->g[26]) ? 1 : 0,
                'g27' => isset($request->g[27]) ? 1 : 0,
                'g28' => isset($request->g[28]) ? 1 : 0,
                'g29' => isset($request->g[29]) ? 1 : 0,
                'diagnosa_id' => $request->diagnosa_id,
            ]);
            return response()->json([
                'success' => 'Data User Berhasil disimpan'
            ], 201);
        }
    }


    public function show($id)
    {
        $data = Dataset::find($id);
        return response()->json($data);
    }

    public function edit($id)
    {
        $data = Dataset::find($id);
        if(! $data) {
             abort(404);
        }
        return $data;
    }

    public function update(Request $request,$id)
    {
        //
    }

    public function destroy($id)
    {
        $data = Dataset::find($id)->delete();
    }
}

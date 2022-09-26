<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Klasifikasi;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class klasifikasiController extends Controller
{
    public function hasil_klasifikasi($id){
        $klasifikasi = klasifikasi::find($id);
        $diagnosa = Diagnosa::find($klasifikasi->diagnosa);
        return view('klasifikasi.hasil-klasifikasi', compact('diagnosa','klasifikasi'));
    }
    public function connectPython(Request $request)
    {
        $data = Klasifikasi::create([
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
        ]);
        $pelatihan = Pelatihan::where('aktif',True)->first();
        $cmd = "python klasifikasi.py ".$pelatihan->exp." ".$pelatihan->k_ketetanggaan;
        $command = escapeshellcmd($cmd);
        $output = shell_exec($command);
        $klasifikasi = Klasifikasi::find($data->id);
        $klasifikasi->diagnosa=(int)$output;
        $klasifikasi->save();

        return redirect()->route('hasil-klasifikasi', $data->id);
    }

    public function index()
    {
        $data['data'] = Klasifikasi::all();
        return view('klasifikasi.index', $data);
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
        //
    }
}

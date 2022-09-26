<?php

namespace App\Http\Controllers;

use App\Models\DataLatih;
use App\Models\DataModel;
use App\Models\Dataset;
use App\Models\DataUji;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {   
        $dataset = Dataset::all()->count();
        $dataLatih = DataLatih::all()->count();
        $dataModel = DataModel::all()->count();
        $dataUji = DataUji::all()->count();
        return view('home')->with('dataset', $dataset)->with('datalatih',$dataLatih)->with('datamodel',$dataModel)->with('datauji',$dataUji);
    }
}

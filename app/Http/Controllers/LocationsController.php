<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Provinsi;
use App\Models\Kota;

class LocationsController extends Controller
{
    public function getProvince(){
        $prov = Provinsi::get();

        return response()->json($prov);
    }

    public function getCity($id){
        $kota = Kota::where('id_provinsi',$id)->get();
        return response()->json($kota);
    }
}

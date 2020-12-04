<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Katalog;
use App\Models\Kain;

class WelcomeController extends Controller
{
    public function index()
    {
        $katalog = Katalog::where('id_paket','!=','2')->get();
        $custom = Katalog::where('id_paket','2')->first();
        // dd($custom);
        return view('user/welcome',compact('katalog','custom'));
    }

    public function product (){
        $kain = Kain::get();
        return view('user/produk',compact('kain'));
    }
}

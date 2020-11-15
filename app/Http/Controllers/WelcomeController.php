<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Katalog;

class WelcomeController extends Controller
{
    public function index()
    {
        $katalog = Katalog::where('id_paket','!=','2')->get();
        $custom = Katalog::where('id_paket','2')->first();
        // dd($custom);
        return view('user/welcome',compact('katalog','custom'));
    }
}

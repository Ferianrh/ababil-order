<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Katalog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $katalog = Katalog::where('id_paket','!=','2')->get();
        $custom = Katalog::where('id_paket','2')->first();
        return view('user/welcome',compact('katalog','custom'));
    }
}

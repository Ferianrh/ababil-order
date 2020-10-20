<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Katalog;

class WelcomeController extends Controller
{
    public function index()
    {
        $katalog = Katalog::get();
        return view('user/welcome',['katalog'=>$katalog]);
    }
}

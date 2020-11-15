<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Pengiriman;
use App\Models\Pembayaran;
use App\Models\Katalog;

class DashboardController extends Controller
{
    public function index (){
        $order = Pesanan::where('status_pesanan','!=','SELESAI')->get();
        $pengiriman = Pengiriman::whereNotNull('no_resi')->get();
        $cust = Pelanggan::get();
        $katalog = Katalog::get();

        return view('admin/dashboard',compact('order','pengiriman','cust','katalog'));
    }
}

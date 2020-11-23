<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pelanggan;
use App\Models\Katalog;
use App\Models\Pembayaran;

use DB;
use PDF;

class LaporanController extends Controller
{
    //index
    public function index(){
        $order = Pesanan::where('status_pesanan','SELESAI')->get();
        $year = Pesanan::select(DB::raw("DISTINCT DATE_FORMAT(updated_at, '%Y') as year"))->get();
        // $year = $year->updated_at->format('Y');
        return view('admin/laporan/laporan',compact('order','year'));
    }

    public function info($bulan, $tahun){
        $order = Pesanan::where('status_pesanan','SELESAI')
                ->whereMonth('updated_at',$bulan)
                ->whereYear('updated_at',$tahun)
                ->get();
        return response()->json($order);

    }

    public function cetak(){
        $order = Pesanan::where('status_pesanan','SELESAI')->get();
    	$pdf = PDF::loadview('admin/laporan/pdf',['order'=>$order]);
    	return $pdf->download('laporan-penjualan.pdf');
    }
}

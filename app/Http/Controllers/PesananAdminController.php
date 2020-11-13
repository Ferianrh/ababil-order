<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pengiriman;
use App\Models\Pelanggan;
use App\Models\Kurir;
use App\Models\Pembayaran;
use App\Models\Provinsi;
use App\Models\Kota;

class PesananAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view pesanan
        $pesananPaket = Pesanan::distinct('p.pesanan')->join('pembayaran as p','p.id_pesanan','=','pesanan.id_pesanan')->
                        whereNotNull('id_paket')->orderBy('p.updated_at')->get();
        $pesananCustom = Pesanan::distinct('p.pesanan')->join('pembayaran as p','p.id_pesanan','=','pesanan.id_pesanan')->
                        whereNull('id_paket')->orderBy('p.updated_at')->get();
        return view('admin/pemesanan/index',compact('pesananPaket','pesananCustom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //show edit form
        $payment = Pembayaran::where('id_pesanan',$id)->first();
        $order = DetailPesanan::where('id_pesanan',$id)->first();
        $detailOrder = DetailPesanan::where('id_pesanan',$id)->get();
        $pengiriman = Pengiriman::where('id_pesanan',$id)->first();
        $courier = Kurir::get();
        $prov = Provinsi::get();
        $city = Kota::get();
        
        return view('admin/pemesanan/edit',compact('payment','order','detailOrder','pengiriman','courier','prov','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

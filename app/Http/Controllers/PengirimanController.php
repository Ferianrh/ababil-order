<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pengiriman;
use App\Models\Pelanggan;
use App\Models\Kurir;
use App\Models\Pembayaran;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //insert pengiriman
        $id_kurir = Kurir::where('kode_kurir',$request->kurir)->first();
        $pengiriman = Pengiriman::create([
            'id_provinsi' => $request->provinsi,
            'id_kota' => $request->kota,
            'id_pesanan' => $request->id_pesanan,
            'id_kurir' => $id_kurir->id_kurir,
            'nama_penerima' => $request->nama_pelanggan,
            'no_hp' => $request->no_hp,
            'alamat_pengiriman' => $request->alamat_lengkap,
            'kode_pos' => $request->kode_pos,
            'jenis_pengiriman' => $request->jenis_pengiriman,
            'biaya_pengiriman' => $request->biaya_pengiriman
        ]);
        //insert pembayaran
        $payment = Pembayaran::create([
            'id_pesanan' => $request->id_pesanan,
            'total_pembayaran' => $request->grand_total,
            'sudah_dibayar' => null,
            'tanggal_pembayaran' => null,
            'bukti_pembayaran' => null,
            'status_pembayaran' => 'BELUM BAYAR'
        ]);

        return redirect(route('pembayaran.show',$request->id_pesanan));
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
        $order = DetailPesanan::where('id_pesanan',$id)->first();
        $detailOrder = DetailPesanan::where('id_pesanan',$id)->get();
        
        $courier = Kurir::get();
        return view('user/pengiriman',compact('order','courier', 'detailOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
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

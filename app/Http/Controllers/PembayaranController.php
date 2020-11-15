<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pengiriman;
use App\Models\Pelanggan;
use App\Models\Kurir;
use App\Models\Pembayaran;


class PembayaranController extends Controller
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
        //show pembayaran
        $payment = Pembayaran::where('id_pesanan',$id)->first();
        $order = DetailPesanan::where('id_pesanan',$id)->first();
        $detailOrder = DetailPesanan::where('id_pesanan',$id)->get();
        $pengiriman = Pengiriman::where('id_pesanan',$id)->first();
        
        return view('user/pembayaran',compact('payment','order','detailOrder','pengiriman'));
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
        //update pembayaran
        $uploadedFile = $request->file('image');
            $extension = '.'.$uploadedFile->getClientOriginalExtension();
            $filename  = $id."_".$request->id_pesanan."_".date('Y-m-d ').$extension;
            $file = str_replace(' ','_',$filename);
            $uploadedFile->move(base_path('public/assets/images/pembayaran'), $file);
        $payment = Pembayaran::where('id_pembayaran',$id)->update([
            'id_pesanan' => $request->id_pesanan,
            'sudah_dibayar' => null,
            'tanggal_pembayaran' => date('Y-m-d'),
            'bukti_pembayaran' => $file,
        ]);

        return redirect()->back();
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

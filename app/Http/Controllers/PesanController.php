<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Katalog;
use App\Models\CustomPrint;
use App\Models\Pesanan;
use App\Models\JenisJahit;
use App\Models\Ukuran;
use App\Models\Kain;
use App\Models\DetailPesanan;
use DB;

use Auth;

class PesanController extends Controller
{

    public function ukuran($id_jahit, $jenis){
        $ukuran = Ukuran::where('id_jahit',$id_jahit)
                        ->where('nama_ukuran',$jenis)
                        ->get();
        return response()->json($ukuran);
        
     }

     public function kain(){
        $kain = Kain::get();
        // dd($kain);
        return response()->json($kain,200);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function index()
    {
        //
        return view('user/pemesanan');
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
            $uploadedFile = $request->file('image');
            $extension = '.'.$uploadedFile->getClientOriginalExtension();
            $filename  = $request->id_pelanggan."_".date('Y-m-d').$extension;
            $file = str_replace(' ','_',$filename);
            $uploadedFile->move(base_path('public/assets/images/examples'), $file);

            $ket = 'Grade : '. $request->grade.'\nJenis Lengan: '. $request->jenis_lengan.'\n'.$request->keterangan_pesanan;
            $order = Pesanan::create([
                'id_paket' => $request->id_paket,
                'id_kain' => $request->id_kain,
                'keterangan_pesanan' => $ket,
                'tanggal_pesanan' => date('Y-m-d'),
                'status_pesanan' => 'PENDING',
                'custom_desain' => $file
            ]);

            for($i = 0;$i<sizeof($request->id_ukuran);$i++){
                $detail =DetailPesanan::create([
                    'id_pelanggan' => $request->id_pelanggan,
                    'id_pesanan' => $order->id_pesanan,
                    'id_ukuran' => $request->id_ukuran[$i],
                    'jumlah' => $request->jumlah[$i]
                ]);
            }

        return redirect('/pengiriman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show paket

        $katalog = Katalog::where('id_paket',$id)->first();
        $jenis = JenisJahit::get();
        return view('user/pemesanan',compact('katalog','jenis'));
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

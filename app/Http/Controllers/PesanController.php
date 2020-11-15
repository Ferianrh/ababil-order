<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Katalog;
use App\Models\CustomPrint;
use App\Models\SisiPrint;
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
        $kain = Kain::where('id_kain','!=','1')->get();
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
            $filename  = $request->id_pelanggan."_".date('Y-m-d H-i-s').$extension;
            $file = str_replace(' ','_',$filename);
            $uploadedFile->move(base_path('public/assets/images/pesan'), $file);

            // $ket = 'Grade : '. $request->grade.'\nJenis Lengan: '. $request->jenis_lengan.'\n'.$request->keterangan_pesanan;
            $order = Pesanan::create([
                'id_paket' => $request->id_paket,
                'id_kain' => $request->id_kain,
                'jenis_lengan' => $request->jenis_lengan,
                'grade_kain' => $request->grade,
                'keterangan_pesanan' => $request->keterangan_pesanan,
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

        return redirect(route('pengiriman.show',$order->id_pesanan));
    }

    public function pesanCustom(Request $request){
        $uploadedFile = $request->file('image');
            $extension = '.'.$uploadedFile->getClientOriginalExtension();
            $filename  = $request->id_pelanggan."_".date('Y-m-d H-i-s').$extension;
            $file = str_replace(' ','_',$filename);
            $uploadedFile->move(base_path('public/assets/images/pesan'), $file);

            // $ket = 'Grade : '. $request->grade.'\nJenis Lengan: '. $request->jenis_lengan.'\n'.$request->keterangan_pesanan;
            $order = Pesanan::create([
                'id_paket' => $request->id_paket,
                'keterangan_pesanan' => $request->keterangan_pesanan,
                'tanggal_pesanan' => date('Y-m-d H-i-s'),
                'status_pesanan' => 'PENDING',
                'custom_desain' => $file
            ]);
            
            //get id_custom

            for($i = 0;$i<sizeof($request->id_ukuran);$i++){
                $getId = CustomPrint::select('id_custom')->where('id_print',$request->id_print)
                        ->where('id_jahit',$request->jenis_jahit)
                        ->where('id_ukuran',$request->id_ukuran[$i])
                        ->first();
                $id_custom[] = (string) $getId['id_custom'];
            }
            // dd($id_custom);
            for($i = 0;$i<sizeof($request->id_ukuran);$i++){
                $detail =DetailPesanan::create([
                    'id_pelanggan' => $request->id_pelanggan,
                    'id_pesanan' => $order->id_pesanan,
                    'id_custom' => (string) $id_custom[$i],
                    'id_ukuran' => $request->id_ukuran[$i],
                    'jumlah' => $request->jumlah[$i]
                ]);
            }
        return redirect(route('pengiriman.show',$order->id_pesanan));

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
        $custom = Katalog::where('id_paket',$id)->first();
        $sisi = SisiPrint::get();
        $jenis = JenisJahit::get();
        return view('user/pemesanan',compact('katalog','jenis','sisi','custom'));
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

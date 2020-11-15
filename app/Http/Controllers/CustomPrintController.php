<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CustomPrint;
use App\Models\Ukuran;
use App\Models\JenisJahit;
use App\Models\SisiPrint;

class CustomPrintController extends Controller
{
    public function getUkuran($id){
        $ukuran = Ukuran::where('id_jahit',$id)->orderBy('nama_ukuran')->get();

        return response()->json($ukuran);
    }

    public function getJenis(){
        $jenis = JenisJahit::get();
        return response()->json($jenis);
    }

    public function getSisi(){
        $sisi = SisiPrint::get();
        return response()->json($sisi);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view
        $custom = CustomPrint::get();
        return view('admin/customPrint/index',compact('custom'));
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
        // dd($request);
        $custom = CustomPrint::create([
            'id_print' => $request->sisi_print,
            'id_ukuran' => $request->nama_ukuran,
            'id_jahit' => $request->jenis_jahit,
            'harga' =>$request->harga,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back();
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
        //update
        $custom = CustomPrint::where('id_custom',$id)->update([
            'id_print' => $request->sisi_print,
            'id_ukuran' => $request->nama_ukuran,
            'id_jahit' => $request->jenis_jahit,
            'harga' =>$request->harga,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
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

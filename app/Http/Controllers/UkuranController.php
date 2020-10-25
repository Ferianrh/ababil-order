<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ukuran;

class UkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Ukuran::get();

        return view('admin/ukuran/index',compact('size'));
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
        //insert
        $jenis = Ukuran::insert([
            "id_jahit" => $request->id_jahit,
            'nama_ukuran' => $request->nama_ukuran,
            'singkatan_ukuran' => $request->singkatan_ukuran,            
            'detil_ukuran' => $request->detil_ukuran,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with(['success' => 'Data Jahit Berhasil Ditambahkan']);
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
        //
        Ukuran::where('id_ukuran', $id)->update([
            "id_jahit" => $request->id_jahit,
            "nama_ukuran" => $request->nama_ukuran,
            "singkatan_ukuran" => $request->singkatan_ukuran,
            "detil_ukuran" => $request->detil_ukuran,
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
        // $ukuran = Ukuran::where('id_ukuran',$id)->first();
        // $ukuran->delete();
        // return redirect()->back()->with('success', 'Data Ukuran Berhasil Dihapus');
    }
}

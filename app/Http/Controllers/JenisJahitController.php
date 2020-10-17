<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JenisJahit;

class JenisJahitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisJahit::get();
        return view('admin/jenisJahit/index',compact('data'));
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
        $JenisJahit = JenisJahit::create([
            'nama_jahit' => $request->nama_jahit,
            'deskripsi_jahit' => $request->deskripsi_jahit
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
        JenisJahit::where('id_jahit', $id)->update([
            "nama_jahit" => $request->nama_jahit,
            "deskripsi_jahit" => $request->deskripsi_jahit
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
        $jahit = JenisJahit::where('id_jahit',$id)->first();
        $jahit->delete();
        return redirect()->back()->with('success', 'Data Kamar Berhasil Dihapus');
    }
}

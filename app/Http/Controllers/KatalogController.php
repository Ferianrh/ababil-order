<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Katalog;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view
        $katalog = Katalog::get();

        return view('admin/katalog/index',compact('katalog'));
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
        $uploadedFile = $request->file('image');
            $extension = '.'.$uploadedFile->getClientOriginalExtension();
            $filename  = $request->nama_paket.$extension;
            $file = str_replace(' ','_',$filename);
            $uploadedFile->move(base_path('public/assets/images/examples'), $file);

        $katalog = Katalog::create([
            'nama_paket' => $request->nama_paket,
            'deskripsi_paket' => $request->deskripsi_paket,
            'harga_paket' => $request->harga_paket,
            'gambar_desain' => $file
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
        $uploadedFile = $request->file('image');
            $extension = '.'.$uploadedFile->getClientOriginalExtension();
            $filename  = $request->nama_paket.$extension;
            $file = str_replace(' ','_',$filename);
            $uploadedFile->move(base_path('public/assets/images/examples'), $file);

        $katalog = Katalog::where('id_paket',$id)->update([
            'nama_paket' => $request->nama_paket,
            'deskripsi_paket' => $request->deskripsi_paket,
            'harga_paket' => $request->harga_paket,
            'gambar_desain' => $file,
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
        $paket = Katalog::where('id_paket',$id)->first();
        $paket->delete();
        return redirect()->back()->with('success', 'Data paket Berhasil Dihapus');
    }
}

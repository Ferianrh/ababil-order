<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelanggan;
use App\Models\User;

use Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pelanggan = Pelanggan::where('id',Auth::user()->id)->first();
        return view('user/setting',compact('pelanggan'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if($request->password != null && $request->confirm_password != null && $request->password == $request->confirm_password ){
            $user = User::where('id',$id)->update([
                'password' => $request->password
            ]);
        }elseif($request->password != $request->confirm_password){
            return redirect()->back()->with(['msg'=> 'Konfirmasi Sandi Tidak Sama !']);
        }

        $pelanggan = Pelanggan::where('id',$id)->update([
            'id_provinsi' => $request->provinsi,
            'id_kota' => $request->kota,
            'nama_lengkap' =>$request->nama_lengkap,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kode_pos' => $request->kode_pos,
            'no_hp' => $request->no_hp
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelanggan;
use App\Models\User;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pelanggan
        $cust = Pelanggan::get();

        return view('admin/pelanggan/index',compact('cust'));
    }

    public function signUp(){
        return view('sign-up');
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
        //insert user
        $dataUser = [
            'id_role' => '2',
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ];

        $user = User::create($dataUser);
        // dd($user->id);
        $cust = Pelanggan::create([
            'id' => $user->id,
            'id_provinsi' => $request->provinsi,
            'id_kota' => $request->kota,
            'nama_lengkap' => $request->fname.' '. $request->lname,
            'tanggal_lahir' => date('Y-m-d'),
            'alamat_lengkap' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'no_hp' => $request->no_hp,
            'email' => $request->email
        ]);

        return view('login');
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

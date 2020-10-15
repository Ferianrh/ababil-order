<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'id_user',
        'id_provinsi',
        'id_kota',
        'nama_lengkap',
        'tanggal_lahir',
        'alamat_lengkap',
        'no_hp',
        'email'
    ];

    public function userPelanggan(){
        return $this->hasOne('App\Models\User','id','id_pelanggan');
    }
}

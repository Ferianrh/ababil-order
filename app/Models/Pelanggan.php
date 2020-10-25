<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    public $timestamps = true;
    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'id_user',
        'id_provinsi',
        'id_kota',
        'nama_lengkap',
        'tanggal_lahir',
        'alamat_lengkap',
        'kode_pos',
        'no_hp',
        'email'
    ];

    public function user(){
        return $this->hasOne('App\Models\User','id','id_pelanggan');
    }

    public function detailPesan(){
        return $this->hasMany('App\Models\DetailPesanan','id_pelanggan');
    }

    public function provinsi(){
        return $this->belongsTo('App\Models\Provinsi','id_provinsi');
    }

    public function Kota(){
        return $this->belongsTo('App\Models\Kota','id_kota');
    }
}

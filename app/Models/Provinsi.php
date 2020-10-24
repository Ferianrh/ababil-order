<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{

    protected $guarded = [];

    protected $table = 'provinsi';

    protected $primaryKey = 'id_provinsi';

    protected $fillable = [
        'nama_provinsi'
    ];

    public function pelanggan(){
        return $this->hasMany('App\Models\Pelanggan','id_provinsi');
    }

    public function pengiriman(){
        return $this->hasMany('App\Models\Pengiriman','id_provinsi');
    }

    public function Kota(){
        return $this->hasMany('App\Models\Kota','id_provinsi');
    }
}

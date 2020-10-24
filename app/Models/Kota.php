<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    //
    protected $guarded = [];

    protected $table = 'kota';

    protected $primaryKey = 'id_kota';

    protected $fillable = [
        'id_provinsi',
        'nama_kota'
    ];

    public function pelanggan(){
        return $this->hasMany('App\Models\Pelanggan','id_kota');
    }

    public function pengiriman(){
        return $this->hasMany('App\Models\Pengiriman','id_kota');
    }

}

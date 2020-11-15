<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisJahit extends Model
{
    public $timestamps = true;
    protected $table = 'jenis_jahit';

    protected $primaryKey = 'id_jahit';

    protected $fillable =[
        'nama_jahit',
        'deskripsi_jahit'
    ];


    public function customPrint(){
        return $this->hasMany('App\Models\CustomPrint','id_jahit');
    }

    public function ukuran(){
        return $this->hasMany('App\Models\Ukuran','id_jahit');
    }

    public function detailPesanan(){
        return $this->hasMany('App\Models\DetailPesanan','id_jahit');
    }

}

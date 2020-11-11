<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPrint extends Model
{
    public $timestamps = true;
    protected $table = 'custom_print';

    protected $primaryKey = 'id_custom';

    protected $fillable =[
        'id_print',
        'id_jahit',
        'id_ukuran',
        'harga'
    ];

    public function sisiPrint(){
        return $this->belongsTo('App\Models\SisiPrint','id_print');
    }

    public function ukuran(){
        return $this->belongsTo('App\Models\Ukuran','id_ukuran');
    }

    public function jenisJahit(){
        return $this->belongsTo('App\Models\JenisJahit','id_jahit');
    }

    public function detailPesanan(){
        return $this->hasMany('App\Models\DetailPesanan','id_custom');
    }

}

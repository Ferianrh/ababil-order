<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SisiPrint extends Model
{
    public $timestamps = true;
    protected $table = 'sisi_print';

    protected $primaryKey = 'id_print';

    protected $fillable = [
        'keterangan_print'
    ];

    public function detailPesanan(){
        return $this->hasMany('App\Models\DetailPesanan','id_print');
    }

    public function customPrint(){
        return $this->hasMany('App\Models\CustomPrint','id_print');
    }
}

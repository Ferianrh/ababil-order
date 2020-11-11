<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    public $timestamps = true;
    protected $table = 'ukuran';

    protected $primaryKey = 'id_ukuran';

    protected $fillable = [
        'id_jahit',
        'singkatan_ukuran',
        'nama_ukuran',
        'detil_ukuran'
    ];

    public function jenisJahit(){
        return $this->belongsTo('App\Models\JenisJahit','id_jahit');
    }
    
    public function pesanan(){
        return $this->hasMany('App\Models\DetailPesanan','id_ukuran');
    }

    public function customPrint(){
        return $this->hasMany('App\Models\CustomPrint','id_ukuran');
    }
}

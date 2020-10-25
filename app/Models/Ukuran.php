<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = 'ukuran';

    protected $primaryKey = 'id_ukuran';

    protected $fillable = [
        'singkatan_ukuran',
        'nama_ukuran',
        'detil_ukuran'
    ];

    public function pesanan(){
        return $this->hasMany('App\Models\DetailPesanan','id_ukuran');
    }

    public function customPrint(){
        return $this->hasMany('App\Models\CustomPrint','id_ukuran');
    }
}

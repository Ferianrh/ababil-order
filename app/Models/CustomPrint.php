<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPrint extends Model
{
    protected $table = 'custom_print';

    protected $primaryKey = 'id_custom';

    protected $fillable =[
        'harga'
    ];

    public function sisiPrint(){
        return $this->belongsto('App\Models\SisiPrint','id_print');
    }

    public function ukuran(){
        return $this->belongsto('App\Models\Ukuran','id_ukuran');
    }

    public function jenisJahit(){
        return $this->belongsto('App\Models\JenisJahit','id_jahit');
    }
}

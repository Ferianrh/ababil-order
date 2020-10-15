<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanan';

    protected $primaryKey = 'id_detail';

    protected $fillable =[
        'jumlah'
    ];

    public function pelanggan(){
        return $this->belongsto('App\Models\Pelanggan','id_pelanggan');
    }

    public function pesanan(){
        return $this->belongsto('App\Models\Pesanan','id_pesanan');
    }

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

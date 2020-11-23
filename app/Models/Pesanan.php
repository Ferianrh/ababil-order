<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    public $timestamps = true;
    protected $table ='pesanan';

    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'id_paket',
        'id_kain',
        'jenis_lengan',
        'grade_kain',
        'keterangan_pesanan',
        'tanggal_pesanan',
        'status_pesanan',
        'custom_desain'
    ];

    public function detailPesanan(){
        return $this->hasMany('App\Models\DetailPesanan','id_pesanan');

    }

    public function pembayaran(){
        return $this->hasOne('App\Models\Pembayaran','id_pesanan');
    }

    public function katalog(){
        return $this->belongsTo('App\Models\Katalog','id_paket');
    }

    public function pengiriman(){
        return $this->hasOne('App\Models\Pengiriman', 'id_pesanan');
    }

    public function kurir(){
        return $this->belongsTo('App\Models\Kurir','id_kurir');
    }

    public function kain(){
        return $this->belongsTo('App\Models\Kain','id_kain');
    }

    public function pelanggan(){
        return $this->belongsToMany('App\Models\Pelanggan','detail_pesanan', 'id_pelanggan','id_pesanan');
    }


}

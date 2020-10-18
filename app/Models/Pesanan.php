<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table ='pesanan';

    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'id_paket',
        'id_kurir',
        'id_kain',
        'total_pembayaran',
        'sudah_dibayar',
        'tanggal_pembayaran',
        'bukti_pembayaran',
        'status_pembayaran'
    ];

    public function pembayaran(){
        return $this->hasMany('App\Models\Pesanan','id_pesanan');
    }

    public function katalog(){
        return $this->belongsTo('App\Models\Katalog','id_paket');
    }

    

    public function kurir(){
        return $this->belongsTo('App\Models\Kurir','id_kurir');
    }

    public function kain(){
        return $this->belongsTo('App\Models\Kain','id_kain');
    }
}

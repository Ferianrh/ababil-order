<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public $timestamps = true;
    protected $table ='pembayaran';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pesanan',
        'total_pembayaran',
        'sudah_dibayar',
        'tanggal_pembayaran',
        'bukti_pembayaran',
        'status_pembayaran'
    ];

    public function pesanan(){
        return $this->hasOne('App\Models\Pesanan','id_pesanan','id_pembayaran');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    public $timestamps = true;
    //table

    protected $table = 'pengiriman';

    protected $primaryKey = 'id_pengiriman';

    protected $fillable = [
        'id_pesanan',
        'id_provinsi',
        'id_kota',
        'id_kurir',
        'nama_penerima',
        'no_hp',
        'kode_pos',
        'alamat_pengiriman',
        'jenis_pengiriman',
        'biaya_pengiriman',
        'no_resi'
    ];

    public function pesanan(){
        return $this->hasOne('App\Models\Pesanan', 'id_pesanan','id_pengiriman');
    }

    public function provinsi(){
        return $this->belongsTo('App\Models\Provinsi','id_provinsi');
    }

    public function kota(){
        return $this->belongsTo('App\Models\Kota','id_kota');
    }

    public function kurir(){
        return $this->belongsTo('App\Models\Kurir','id_kurir');
    }
}

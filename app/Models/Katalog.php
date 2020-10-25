<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $table ='katalog';

    protected $primaryKey = 'id_paket';

    protected $fillable = [
        'nama_paket',
        'deskripsi_paket',
        'harga_paket'
    ];

    public function pesanan(){
        return $this->hasMany('App\Models\Pesanan','id_paket');
    }
}

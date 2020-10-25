<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    public $timestamps = true;
    protected $table ='katalog';

    protected $primaryKey = 'id_paket';

    protected $fillable = [
        'nama_paket',
        'deskripsi_paket',
        'harga_paket',
        'gambar_desain'
    ];

    public function pesanan(){
        return $this->hasMany('App\Models\Pesanan','id_paket');
    }
}

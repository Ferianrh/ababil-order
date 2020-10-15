<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    //
    protected $table = 'kurir';

    protected $primaryKey = 'id_kurir';

    protected $fillable = [
        'kode_kurir',
        'nama_kurir'
    ];

    public function pesanan(){
        return $this->hasMany('App\Models\Pesanan','id_kurir');
    }

}

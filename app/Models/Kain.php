<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kain extends Model
{
    protected $table = 'kain';

    protected $primaryKey = 'id_kain';

    protected $fillable = [
        'nama_kain',
        'deskripsi_kain'
    ];
}

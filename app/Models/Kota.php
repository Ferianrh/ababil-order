<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    //

    protected $table = 'kota';

    protected $primaryKey = 'id_kota';

    protected $guarded = [];

    protected $fillable = [
        'id_provinsi',
        'province_id',
        'city_id',
        'nama_kota'
    ];
}

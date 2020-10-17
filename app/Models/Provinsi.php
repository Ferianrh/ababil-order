<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{

    protected $guarded = [];

    protected $table = 'provinsi';

    protected $primaryKey = 'id_provinsi';

    protected $fillable = [
        'province_id',
        'nama_provinsi'
    ];
}

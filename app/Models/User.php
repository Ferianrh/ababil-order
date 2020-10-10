<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_role',
        'username',
        'nama', 
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relation User to Role
    public function role(){
        return $this->belongsTo('App\Models\Role','id_role');
    }

    //Relation User to Log
    public function log(){
        return $this->hasMany('App\Models\Log');
    }

    //Relation User to Santri
    public function santri(){
        return $this->hasOne('App\Models\Santri', 'id_user');
    }
}

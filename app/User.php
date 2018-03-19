<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $primaryKey  = 'id_kl';
    protected $fillable = [
        'gebrnm_kl', 'email_kl', 'pw_kl',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pw_kl', 'remember_token',
    ];
    public function getAuthPassword(){
    return $this->pw_kl;
    }
    public function getAuthemail(){
    return $this->email_kl;
    }
}

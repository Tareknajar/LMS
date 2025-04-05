<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;

class trainer extends Authenticatable implements JWTSubject
{
    protected $fillable=[
           'uuid',
           'first_name',
           'last_name',
           'experiens_year',
           'cv'
    ];
    public function track(){
        return $this->hasMany(track::class);
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }
}

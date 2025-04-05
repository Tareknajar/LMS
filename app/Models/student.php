<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


use Illuminate\Database\Eloquent\Model;

class student extends Authenticatable implements JWTSubject
{
    protected $fillable=[
        'uuid',
        'first_name',
        'last_name',
        'father_name',
        'addres',
        'date_on_brith',
        'gender',
    ];
    public function education_record(){
        return $this->hasMany(education_record::class);
    }

    public function cretoficate(){
        return $this->hasMany(cretoficate::class);
    }
    public function getFullNameAttribute(){
        return trim("{$this->first_name} {$this->last_name}");
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }
}

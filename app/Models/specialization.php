<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class specialization extends Model
{
    protected $fillable=[
         'uuid',
         'specialization_name'
    ];
    public function education_record(){
        return $this->hasMany(education_record::class);
    }
}

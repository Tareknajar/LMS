<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class university extends Model
{
    protected $fillable=[
          'uuid',
          'university_name',
          'university_addres',
    ];
    public function education_record(){
        return $this->hasMany(education_record::class);
    }
}

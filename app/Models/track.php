<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class track extends Model
{
    protected $fillable=[
        'uuid',
        'track_name',
        'track_descraption',
        'trainer_id'	
    ];
    public function trainer(){
        return $this->belongsTo(trainer::class,'trainer_id');
    }
    public function track_session(){
        return $this->hasMany(track_session::class);
    }
    public function cretoficate(){
        return $this->hasMany(cretoficate::class);
    }
}

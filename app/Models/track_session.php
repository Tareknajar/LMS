<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class track_session extends Model
{
    protected $fillable=[
        'uuid',
        'track_id',
        'batch_number',
        'date_start',
        'date_end',
    ];
    public function track(){
        return $this->belongsTo(track::class,'track_id');
    }
    public function course(){
        return $this->hasMany(course::class);
    }
}

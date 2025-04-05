<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cretoficate extends Model
{
    protected $fillable=[
        'uuid',
        'student_id',
        'track_id',
        'issus_date',
        'student_rate',
        'pdf_link'
    ];

    public function student(){
       return $this->belongsTo(student::class,'student_id');
    }

    public function track(){
        return $this->belongsTo(track::class,'track_id');

    }
    
    
}

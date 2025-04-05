<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class electronic_courses extends Model
{
    protected $fillable=[
        'course_id',
        'pdf',
        'video',
    ];
    public function course(){
        return $this->belongsTo(course::class,'course_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable=[
            'uuid',
        	'course_titel',
        	'lecture_titel',
        	'lecture_number',
        	'lecture_date',
        	'track_session_id',


    ];
    public function track_session(){
        return $this->belongsTo(track_session::class,'track_session_id');
    }
	public function electronic_courses(){
        return $this->hasMany(electronic_courses::class);
    }

}

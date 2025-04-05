<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class education_record extends Model
{
    protected $fillable=[
        'uuid',	
        'student_id',
        'university_id',
        'specialization_id',
        'registration_date',
        'graduation_date',
        'status'	
    ];
    public function student(){
        return $this->belongsTo(student::class,'student_id');
    }
    public function university(){
        return $this->belongsTo(university::class,'university_id');
    }
    public function specialization(){
        return $this->belongsTo(specialization::class,'specialization_id');
    }
}

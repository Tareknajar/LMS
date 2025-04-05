<?php
namespace App\Services;
use Illuminate\Support\Str;
use App\Models\course;

class course_service{
    public function storecourse($data){
        $data['uuid']=Str::uuid();
        course::create($data);
    }
    public function updatecourse($uuid,$data){
       $course=course::where('uuid',$uuid)->first();
       $course->update($data);
    }

    public function destorecourse($uuid){
        $course=course::where('uuid',$uuid)->first();
        if(!$course){
            return 'unavailable';
        }
        $course->delete();
    }
    public function indexcourse(){
        $course=course::all();
        return $course;
    }















}
?>
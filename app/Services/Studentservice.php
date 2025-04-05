<?php

namespace App\Services;
use illuminate\Support\Str;
use App\Models\student;

class Studentservice{
    
    public function storestudent($data){
        $data['uuid']=Str::uuid();
         student::create($data);
    }
    public function updatestudent($uuid,$data){
        $student=student::where('uuid',$uuid)->first();
        $student->update($data);
    }
    public function destorestudent($uuid){
        $student=student::where('uuid',$uuid)->first();
        if(!$student){
            return 'unavailable';
        }
        $student->delete();
    }
    public function indexstudent(){
        $student=student::all();
        return $student;
    }
        
 
}

?>
<?php

namespace App\Services;
use App\Models\electronic_courses;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\http\Traits\Uploadfile;
 class electronic_courses_service{
     use Uploadfile;
    public function store_electronic_courses($data){
        $data['uuid']=Str::uuid();
        electronic_courses::create($data);
    }
    public function update_electronic_courses($uuid,$data){
        $electronic_courses=electronic_courses::where('uuid',$uuid)->first();
        $this->deletefile($electronic_courses,'pdf','public');
        $this->deletefile($electronic_courses,'video','public');
        $electronic_courses->update($data);
    }
    public function destore_electronic_courses($uuid){
        $electronic_courses=electronic_courses::where('uuid',$uuid)->first();
        $this->deletefile($electronic_courses,'pdf','public');
        $this->deletefile($electronic_courses,'video','public');
        $electronic_courses->delete();
    }
    public function index_electronic_courses(){
        $electronic_courses=electronic_courses::all();
        return $electronic_courses;
    }
















 }
?>
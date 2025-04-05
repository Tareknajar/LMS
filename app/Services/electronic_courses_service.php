<?php

namespace App\Services;
use App\Models\electronic_courses;
use Illuminate\Support\Str;
 class electronic_courses_service{


    public function store_electronic_courses($data){
        $data['uuid']=Str::uuid();
        electronic_courses::create($data);
    }
    public function update_electronic_courses($uuid,$data){
        $electronic_courses=electronic_courses::where('uuid',$uuid)->first();
        $electronic_courses->update($data);
    }
    public function destore_electronic_courses($uuid){
        $electronic_courses=electronic_courses::where('uuid',$uuid)->first();
        if(!$electronic_courses){
            return 'unavailable';
        }
        $electronic_courses->delete();
    }
    public function index_electronic_courses(){
        $electronic_courses=electronic_courses::all();
        return $electronic_courses;
    }
















 }
?>
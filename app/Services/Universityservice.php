<?php
namespace App\Services;
use Illuminate\Support\Str;
use App\Models\university;

class Universityservice{

    public function storeuniversity($data){
        $data['uuid']=Str::uuid();
        university::create($data);
    }
    public function updateuniversity($uuid,$data){
       $university=university::where('uuid',$uuid)->first();
       $university->update($data);
    }

    public function destoreuniversity($uuid){
        $university=university::where('uuid',$uuid)->first();
        if(!$university){
            return 'unavailable';
        }
        $university->delete();
    }
    public function indexuniversity(){
        $university=university::all();
        return $university;
    }












}
?>
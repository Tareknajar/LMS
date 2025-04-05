<?php
namespace App\Services;

use App\Models\specialization;
use Illuminate\Support\Str;

class Specializationservice{

    public function storeSpecialization($data){
        $data['uuid']=Str::uuid();
         specialization::create($data);
    }
    public function updateSpecialization($uuid,$data){
        $Specialization=specialization::where('uuid',$uuid)->first();
        $Specialization->update($data);
    }
    public function destoreSpecialization($uuid){
        $Specialization=specialization::where('uuid',$uuid)->first();
        if(!$Specialization){
            return 'unavailable';
        }
        $Specialization->delete();
    }
    public function indexSpecialization(){
        $Specialization=specialization::all();
        return $Specialization;
    }






}

?>
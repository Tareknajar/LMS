<?php
namespace App\Services;
use Illuminate\Support\Str;
use App\Models\trainer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\http\traits\Uploadfile;
class trainer_service{
     use Uploadfile;
    public function storetrainer($data){
        $data['uuid']=Str::uuid();
        $data['password']=Hash::make($data['password']);
        trainer::create($data);
    }
    public function updatetrainer($uuid,$data){
        $trainer=trainer::where('uuid',$uuid)->first();
        $this->deletefile($trainer,'cv','public');
        $trainer->update($data);
    }
    public function destoretrainer($uuid){
        $trainer=trainer::where('uuid',$uuid)->first();
        if(!$trainer){
            return 'unavailable';
        }
        $this->deletefile($trainer,'cv','public');
        $trainer->delete();
    }
    public function indextrainer(){
        $trainer=trainer::all();
        return $trainer;
    }
    public function searchtrainer($requste){
        $search=trainer::where('last_name','like',"%{$requste->last_name}%")
        ->orWhere('first_name','like',"%{$requste->first_name}%")
        ->get();
        return $search;
    }


}?>


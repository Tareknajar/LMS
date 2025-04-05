<?php
namespace App\Services;
use Illuminate\Support\Str;
use App\Models\trainer;
use Illuminate\Support\Facades\Storage;

class trainer_service{

    public function storetrainer($data){
        $data['uuid']=Str::uuid();
        trainer::create($data);
    }
    public function updatetrainer($uuid,$data){
        $trainer=trainer::where('uuid',$uuid)->first();
        $trainer->update($data);
    }
    public function destoretrainer($uuid){
        $trainer=trainer::where('uuid',$uuid)->first();
        if(!$trainer){
            return 'unavailable';
        }
        
        if ($trainer->cv && Storage::disk('public')->exists($trainer->cv)) {
            Storage::disk('public')->delete($trainer->cv);
        }
        $trainer->delete();
    }
    public function indextrainer(){
        $trainer=trainer::all();
        return $trainer;
    }


}?>
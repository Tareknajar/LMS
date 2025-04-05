<?php
namespace App\Services;
use Illuminate\Support\Str;
use App\Models\track;

class trackservice{

    public function storetrack($data){
        $data['uuid']=Str::uuid();
         track::create($data);
    }
    public function updatetrack($uuid,$data){
        $track=track::where('uuid',$uuid)->first();
        $track->update($data);
    }
    public function destoretrack($uuid){
        $track=track::where('uuid',$uuid)->first();
        if(!$track){
            return 'unavailable';
        }
        $track->delete();
    }
    public function indextrack(){
        $track=track::all();
        return $track;
    }

}
?>
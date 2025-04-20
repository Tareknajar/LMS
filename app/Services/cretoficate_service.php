<?php
namespace App\Services;
use App\Models\cretoficate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\http\Traits\Uploadfile;
class cretoficate_service{
    use Uploadfile;
    public function storecretoficate($data){
        $data['uuid']=Str::uuid();
        cretoficate::create($data);
    }
    public function updatecretoficate($uuid,$data){
        $cretoficate=cretoficate::where('uuid',$uuid)->first();
        $this->deletefile($cretoficate,'pdf_link','public');
        $cretoficate->update($data);
    }
    public function destorecretoficate($uuid){
        $cretoficate=cretoficate::where('uuid',$uuid)->first();
        if(!$cretoficate){
            return 'unavailable';
        }
        $this->deletefile($cretoficate,'pdf_link','public');
        $cretoficate->delete();
    }
    public function indexcretoficate(){
        $cretoficate=cretoficate::all();
        return $cretoficate;
    }


}

?>
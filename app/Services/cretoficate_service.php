<?php
namespace App\Services;
use App\Models\cretoficate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class cretoficate_service{

    public function storecretoficate($data){
        $data['uuid']=Str::uuid();
        cretoficate::create($data);
    }
    public function updatecretoficate($uuid,$data){
        $cretoficate=cretoficate::where('uuid',$uuid)->first();
        $cretoficate->update($data);
    }
    public function destorecretoficate($uuid){
        $cretoficate=cretoficate::where('uuid',$uuid)->first();
        if(!$cretoficate){
            return 'unavailable';
        }
        
        if ($cretoficate->pdf_link && Storage::disk('public')->exists($cretoficate->pdf_link)) {
            Storage::disk('public')->delete($cretoficate->pdf_link);
        }
        $cretoficate->delete();
    }
    public function indexcretoficate(){
        $cretoficate=cretoficate::all();
        return $cretoficate;
    }


}

?>
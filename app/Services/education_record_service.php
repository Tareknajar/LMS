<?php
namespace App\Services;

use App\Models\education_record;
use Illuminate\Support\Str;
class education_record_service{

    public function store_education_record($data){
        $data['uuid']=Str::uuid();
        education_record::create($data);
    }
    public function update_education_record($uuid,$data){
       $education_record=education_record::where('uuid',$uuid)->first();
       $education_record->update($data);
    }

    public function destore_education_record($uuid){
        $education_record=education_record::where('uuid',$uuid)->first();
        if(!$education_record){
            return 'unavailable';
        }
        $education_record->delete();
    }
    public function index_education_record(){
        $education_record=education_record::with('student','university','specialization')->get();
        return $education_record;
    }








}
?>
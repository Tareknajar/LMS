<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store_education_record;
use App\Http\Resources\education_record_Resource;
use App\Models\education_record;
use Illuminate\Http\Request;
use App\Http\traits\GeneralTrait;
use App\Services\education_record_service;

class EducationRecordController extends Controller
{
    use GeneralTrait;
    protected $education_record_service;
    public function __construct(education_record_service $education_record_service)
    {
        $this->education_record_service=$education_record_service;
    }

    public function store(Store_education_record $request){
        $education_recordity=$request->validated();
        $this->education_record_service->store_education_record($education_recordity);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,Store_education_record $request ){
        $education_recordity=$request->validated();
        $this->education_record_service->update_education_record($uuid,$education_recordity);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->education_record_service->destore_education_record($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $education_recorditys=$this->education_record_service->index_education_record();
        $education_recordity=education_record_Resource::collection($education_recorditys);
        return $this->apiResponse($education_recordity);
    }
    
}

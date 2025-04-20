<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store_electronic_courses;
use App\Http\Resources\electronic_courses_Resource;
use App\Http\traits\GeneralTrait;
use App\Http\traits\Uploadfile;
use App\Services\electronic_courses_service;
use Illuminate\Http\Request;

class ElectronicCoursesController extends Controller
{
    use GeneralTrait;
    use Uploadfile;
    protected $electronic_courses_service;
    public function __construct(electronic_courses_service $electronic_courses_service)
    {
        $this->electronic_courses_service=$electronic_courses_service;
    }

    public function store(Store_electronic_courses $request){
        $electronic_courses_service=$request->validated();

        $file_Path_pdf = $this->upload($request,'pdf','pdfs');
        $electronic_courses_service['pdf'] = $file_Path_pdf;

        $file_Path_video = $this->upload($request,'video','videos');
        $electronic_courses_service['video'] = $file_Path_video;
              
        $this->electronic_courses_service->store_electronic_courses($electronic_courses_service);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,Store_electronic_courses $request ){
        $electronic_courses_service=$request->validated();
        $file_Path_pdf = $this->upload($request,'pdf','pdfs');
        $electronic_courses_service['pdf'] = $file_Path_pdf;
        $file_Path_video = $this->upload($request,'video','videos');
        $electronic_courses_service['video'] = $file_Path_video;
        $this->electronic_courses_service->update_electronic_courses($uuid,$electronic_courses_service);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->electronic_courses_service->destore_electronic_courses($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $trainers=$this->electronic_courses_service->index_electronic_courses();
        $trainer=electronic_courses_Resource::collection($trainers);
        return $this->apiResponse($trainer);
    }
}

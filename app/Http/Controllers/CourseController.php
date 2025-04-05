<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storecourse;
use App\Http\Resources\course_Resource;
use App\Services\course_service;
use Illuminate\Http\Request;
use App\Http\traits\GeneralTrait;
use App\Http\traits\Uploadfile;

class CourseController extends Controller
{
    protected $course_service;
    use GeneralTrait;
    use Uploadfile;
    public function __construct(course_service $course_service)
    {
        $this->course_service=$course_service;
    }

    public function store(Storecourse $request){
        $course=$request->validated();
        $this->course_service->Storecourse($course);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,Storecourse $request ){
        $course=$request->validated();
        $this->course_service->updatecourse($uuid,$course);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->course_service->destorecourse($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $courses=$this->course_service->indexcourse();
        $course=course_Resource::collection($courses);
        return $this->apiResponse($course);
    }
}

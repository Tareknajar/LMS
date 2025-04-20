<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Http\Resources\Student_Resource;
use App\Http\traits\GeneralTrait;
use App\Models\User;
use App\Services\Studentservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    use GeneralTrait;
    protected $studentservice;
    public function __construct(Studentservice $studentservice){
        $this->studentservice=$studentservice;
    }

    public function store(StoreStudent $request){
        $validate=$request->validated();
        $this->studentservice->storestudent($validate);
        return $this->apiResponse('successfull'); 

    }
    public function update(StoreStudent $request,$uuid){
        $validate=$request->validated();
        $this->studentservice->updatestudent($uuid,$validate);
        return $this->apiResponse('successfull'); 
    }
    public function destore($uuid){
        $deleted=$this->studentservice->destorestudent($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $student=$this->studentservice->indexstudent();
        $students=Student_Resource::collection($student);
        return $this->apiResponse($students);
    }





    }
    


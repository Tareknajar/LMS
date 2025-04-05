<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeuniversity;
use App\Http\Resources\University_Resource;
use App\Http\traits\GeneralTrait;
use App\Models\university;
use Illuminate\Http\Request;
use App\Services\Universityservice;

class UniversityController extends Controller
{
    use GeneralTrait;
    protected $universityservice;
    public function __construct(Universityservice $universityservice)
    {
        $this->universityservice=$universityservice;
    }

    public function store(Storeuniversity $request){
        $university=$request->validated();
        $this->universityservice->storeuniversity($university);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,Storeuniversity $request ){
        $university=$request->validated();
        $this->universityservice->updateuniversity($uuid,$university);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->universityservice->destoreuniversity($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $universitys=$this->universityservice->indexuniversity();
        $university=University_Resource::collection($universitys);
        return $this->apiResponse($university);
    }
    
}

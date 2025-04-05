<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecialization;
use App\Http\Resources\Specialization_Resource;
use App\Http\traits\GeneralTrait;
use App\Services\Specializationservice;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    use GeneralTrait;
    protected $specializationservice;
    public function __construct(Specializationservice $specializationservice)
    {
        $this->specializationservice=$specializationservice;
    }

    public function store(StoreSpecialization $request){
        $specialization=$request->validated();
        $this->specializationservice->storeSpecialization($specialization);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,StoreSpecialization $request ){
        $university=$request->validated();
        $this->specializationservice->updateSpecialization($uuid,$university);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->specializationservice->destoreSpecialization($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $universitys=$this->specializationservice->indexSpecialization();
        $university=Specialization_Resource::collection($universitys);
        return $this->apiResponse($university);
    }

    
}

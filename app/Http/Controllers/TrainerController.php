<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storetrainer;
use App\Http\Resources\trainer_Resource;
use App\Services\trainer_service;
use Illuminate\Http\Request;
use App\Http\traits\GeneralTrait;
use App\Http\traits\Uploadfile;

class TrainerController extends Controller
{

    use GeneralTrait;
    use Uploadfile;
    protected $trainer_service;
    public function __construct(trainer_service $trainer_service)
    {
        $this->trainer_service=$trainer_service;
    }

    public function store(Storetrainer $request){
        $trainer=$request->validated();
        $filePath = $this->upload($request,'cv','cvs');
        if ($filePath) {
            $trainer['cv'] = $filePath;
        }        
        $this->trainer_service->storetrainer($trainer);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,Storetrainer $request ){
        $trainer=$request->validated();
        $filePath = $this->upload($request,'cv','cvs');
        if ($filePath) {
            $trainer['cv'] = $filePath;
        } 
        $this->trainer_service->updatetrainer($uuid,$trainer);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->trainer_service->destoretrainer($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $trainers=$this->trainer_service->indextrainer();
        $trainer=trainer_Resource::collection($trainers);
        return $this->apiResponse($trainer);
    }
}

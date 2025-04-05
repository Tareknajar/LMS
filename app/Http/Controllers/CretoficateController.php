<?php

namespace App\Http\Controllers;
use App\Services\cretoficate_service;
use App\Http\Requests\Store_cretoficate;
use App\Http\Resources\cretoficate_Resource;
use App\Http\traits\GeneralTrait;
use App\Http\traits\Uploadfile;
use Illuminate\Http\Request;

class CretoficateController extends Controller
{
    use GeneralTrait;
    use Uploadfile;
    protected $cretoficate_service;
    public function __construct(cretoficate_service $cretoficate_service)
    {
        $this->cretoficate_service=$cretoficate_service;
    }

    public function store(Store_cretoficate $request){
        $cretoficate=$request->validated();
        $filePath = $this->upload($request,'pdf_link','pdf_links');
        if ($filePath) {
            $cretoficate['pdf_link'] = $filePath;
        }        
        $this->cretoficate_service->storecretoficate($cretoficate);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,Store_cretoficate $request ){
        $cretoficate=$request->validated();
        $filePath = $this->upload($request,'pdf_link','pdf_links');
        if ($filePath) {
            $cretoficate['pdf_link'] = $filePath;
        } 
        $this->cretoficate_service->updatecretoficate($uuid,$cretoficate);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->cretoficate_service->destorecretoficate($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $cretoficates=$this->cretoficate_service->indexcretoficate();
        $cretoficate=cretoficate_Resource::collection($cretoficates);
        return $this->apiResponse($cretoficate);
    }
}

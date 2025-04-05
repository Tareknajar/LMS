<?php

namespace App\Http\Controllers;
use App\Http\traits\GeneralTrait;
use App\Http\Requests\Storetrack;
use App\Http\Resources\track_Resource;
use App\Services\trackservice;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    use GeneralTrait;

    protected $trackservice;
    public function __construct(trackservice $trackservice)
    {
        $this->trackservice=$trackservice;
    }

    public function store(Storetrack $request){
        $validate=$request->validated();
        $this->trackservice->storetrack($validate);
        return $this->apiResponse('successfull'); 
    }
    public function update(Storetrack $request,$uuid){
        $validate=$request->validated();
        $this->trackservice->updatetrack($uuid,$validate);
        return $this->apiResponse('successfull'); 
    }
    public function destore($uuid){
        $deleted=$this->trackservice->destoretrack($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $student=$this->trackservice->indextrack();
        $students=track_Resource::collection($student);
        return $this->apiResponse($students);
    }
}

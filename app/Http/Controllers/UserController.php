<?php

namespace App\Http\Controllers;
use App\Http\traits\GeneralTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Http\Requests\storeuser;
use App\Http\Resources\user_Resource;
use App\Services\user_service;
class UserController extends Controller
{
    use GeneralTrait;
    private $user_service;
    public function __construct(user_service $user_service){
        $this->user_service=$user_service;
    }

    public function store(storeuser $request){
        $user=$request->validated();
        $this->user_service->storeuser($user);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,storeuser $request ){
        $user=$request->validated();
        $this->user_service->updateuser($uuid,$user);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->user_service->destroyuser($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $users=$this->user_service->indexuser();
        $user=user_Resource::collection($users);
        return $this->apiResponse($user);
    }


    

}

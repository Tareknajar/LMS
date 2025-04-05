<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storetrack_session;
use App\Http\Resources\track_session_Resource;
use App\Http\traits\GeneralTrait;
use App\Models\track_session;
use App\Services\track_session_service;
use Illuminate\Http\Request;

class TrackSessionController extends Controller
{
    use GeneralTrait;
    protected $track_session_service;
    public function __construct(track_session_service $track_session_service)
    {
        $this->track_session_service=$track_session_service;
    }

    public function store(Storetrack_session $request){
        $track_session=$request->validated();       
        $this->track_session_service->store_track_session($track_session);
        return $this->apiResponse('successfull');
    }
    public function update($uuid,Storetrack_session $request ){
        $track_session=$request->validated();
        $this->track_session_service->update_track_session($uuid,$track_session);
        return $this->apiResponse('successfull');
    }
    public function destore($uuid){
        $deleted=$this->track_session_service->destore_track_session($uuid);
        return $this->apiResponse('deleted');
    }
    public function index(){
        $track_sessions=$this->track_session_service->index_track_session();
        $track_session=track_session_Resource::collection($track_sessions);
        return $this->apiResponse($track_session);
    }
}

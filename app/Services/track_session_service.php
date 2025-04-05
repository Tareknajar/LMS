<?php
namespace App\Services;
use illuminate\Support\Str;
use App\Models\track_session;
class track_session_service{

    public function store_track_session($data){
        $data['uuid']=Str::uuid();
        track_session::create($data);
    }
    public function update_track_session($uuid,$data){
        $track_session=track_session::where('uuid',$uuid)->first();
        $track_session->update($data);
    }
    public function destore_track_session($uuid){
        $track_session=track_session::where('uuid',$uuid)->first();
        if(!$track_session){
            return 'unavailable';
        }
        $track_session->delete();
    }
    public function index_track_session(){
        $track_session=track_session::all();
        return $track_session;
    }

}
?>
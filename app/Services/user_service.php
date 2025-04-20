<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class user_service{

    public function storeuser($data){
        $data['uuid']=Str::uuid();
        $data['password']=Hash::make($data['password']);
        User::create($data);
    }
    public function updateuser($uuid,$data){
       $user=User::where('uuid',$uuid)->first();
       $user->update($data);
    }

    public function destroyuser($uuid){
        $user=User::where('uuid',$uuid)->first();
        if(!$user){
            return 'unavailable';
        }
        $user->delete();
    }
    public function indexuser(){
        $user=User::where('id','!=',Auth::user()->id)->get();
        return $user;
    }




}
?>
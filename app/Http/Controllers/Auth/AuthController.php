<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\student;
use App\Models\trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Exception;
use App\Http\traits\GeneralTrait;

class AuthController extends Controller
{
    use GeneralTrait;
    public function login(Request $request, $role)
    {
        $verification = $request->only('email', 'password'); 
        if ($role === 'trainer') {
                if (!$token = Auth::guard('trainer')->attempt($verification)) {
                    return $this->unAuthorizeResponse();
                }
            }
           elseif ($role === 'student') {
                if (!$token = Auth::guard('student')->attempt($verification)) {
                    return $this->unAuthorizeResponse();
                }
            }
            elseif ($role === 'api') {
                if (!$token = Auth::guard('api')->attempt($verification)) {
                    return $this->unAuthorizeResponse();
                }
            }
             else {
                return $this->requiredField('Invalid role');
            }

        return $this->apiResponse($token);
    }

    public function logout(Request $request, $role)
    {
         if ($role === 'trainer') {
             Auth::guard('trainer')->logout();
            } elseif ($role === 'student') {
                Auth::guard('student')->logout();
            } elseif ($role === 'api') {
                Auth::guard('api')->logout();
            }
             else {
                return $this->requiredField('Invalid role');
            }

        return $this->apiResponse('Successfully logged out');
    }
} 
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Auth;
use Carbon;

class AuthController extends Controller
{
    
    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['no_thl' => request('no_thl'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('zar')->accessToken;
            return response()->json(
                [
                    'token'     => $success["token"], 
                    // 'user'      => $user,
                    "uid"      => $user->id,
                    "value"    => 1,
                    "name"      => $user->name,
                ]
                , $this->successStatus
            );
        }
        else{
            return response()->json(['error'=>'Unauthorised', "value" => 0], 401);
        }
    }


        // try {
        //     if (!$token = JWTAuth::attempt($credentials)) {
        //         return response()->json(['error' => 'invalid_credentials', "value"    => 0,], 400);
        //     }
        // } catch (JWTException $e) {
        //     return response()->json(['error' => 'could_not_create_token'], 500);
        // }

        // $user = User::where("no_thl", $request->no_thl)->first();

        // return response()->json(
        //     [
        //         "uid"      => $user->id,
        //         "value"    => 1,
        //         "token"     => $token,
        //         "name"      => $user->name,
        //     ]
        // );



    // public function getAuthenticatedUser()
    // {
    //     try {

    //         if (!$user = JWTAuth::parseToken()->authenticate()) {
    //             return response()->json(['user_not_found'], 404);
    //         }
    //     } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

    //         return response()->json(['token_expired'], $e->getStatusCode());
    //     } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

    //         return response()->json(['token_invalid'], $e->getStatusCode());
    //     } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

    //         return response()->json(['token_absent'], $e->getStatusCode());
    //     }

    //     return response()->json(compact('user'));
    // }
}

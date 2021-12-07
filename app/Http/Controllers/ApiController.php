<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ApiController extends Controller
{
    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password'))){
            return response([
                'message'=>'Invalid Credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;
        $cookie =cookie('jwt', $token, 60 * 24);

        return response([
            'Token'=> $token
        ])->withCookie($cookie);
        // return $user;
    }

    public function logout(){
        $cookie = Cookie::forget('jwt');
        return response([
            'message'=> 'success'
        ])->withCookie($cookie);
    }


    public function register(Request $request){
        $rules = array(
            "name"=> "required",
            "email"=> "required",
            "password"=> "required|min:4",
        );
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            
            $errors = $validator->errors();
            return response()->json([
                'status'=>'Registration Failed',
                'details'=>$errors->messages(),
            ], 422);

        }else{
            $user = new User();
            $user->name =$request->input('name');
    
            $user->email =$request->input('email');
            $user->password =bcrypt($request->input('password'));
            
            $user->save();
    
            return new UserResource($user);
        }

        
    }
}

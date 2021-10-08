<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api',['except' => ['login', 'register']]);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|string|email|u nique:users',
            'password' => 'required|string|confirmed|min:6'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
            'message'=>'user successfully added',
            'user' => $user
        ],201);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        if(!$token=auth()->attempt($validator->validated())){
              return response()->json(['error' => 'unauthorized'],401);
        }

        return $this->createNewToken($token);
    }

    public function createNewToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->factory()->getTTL()*60,
            'user'=>auth()->user()
        ]);
    }

    public function getdata(Request $request) {
        return response()->json(auth()->user());
    }

    public function getCityData() {
        // $cityList = City::cursorPaginate(10);
        $cityList = City::paginate(10);
        return response()->json($cityList);
    }

    public function logout(Request $request) {
        auth()->logout();
        return response()->json([ 
            'message' => 'user logged out'
        ]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    public function show(){

        // echo $bearerToken; die;
        return view('city');
        
    }

    public function webLogin(Request $request){
        
        $userData = $request->input();
        $url = "http://apiauth-env.eba-ea2yceyk.ap-south-1.elasticbeanstalk.com/api/auth/login";
        $response = Http::post($url, [
            'email' => $userData["email"],
            'password' => $userData["password"],
        ]);

        if($response->successful()) {   
            $apiResponse = json_decode($response);
            $bearerToken = $apiResponse->access_token;
            
            $request->session()->put("bearerToken", $bearerToken);
            $request->session()->put("email", $userData["email"]);
            return redirect('citylist');
        } else {
            die("User Unauthorized");
        }
    }
}

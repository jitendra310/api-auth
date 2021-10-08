<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    public function show(){
        return view('city');
        
    }
}

<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('weblogin');
});


Route::get('citylist', [CityController::class,'show']);
Route::post('userwelogin', [CityController::class,'webLogin']);
Route::view('weblogin','weblogin');
            //URL,view page name
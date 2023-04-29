<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// messengers
Route::get('messenger', 'App\Http\Controllers\Api\MessengerController@index');
Route::get('messenger/{id}', 'App\Http\Controllers\Api\MessengerController@showBoxMess');
Route::post('messenger', 'App\Http\Controllers\Api\MessengerController@store');
Route::delete('messenger/{id}', 'App\Http\Controllers\Api\MessengerController@destroy');

//Login
Route::get('login', 'App\Http\Controllers\Api\LoginController@index');
Route::post('login', 'App\Http\Controllers\Api\LoginController@store');
Route::post('login/{id}', 'App\Http\Controllers\Api\LoginController@show');
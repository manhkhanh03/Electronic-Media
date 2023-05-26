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
Route::prefix('messenger')->group(function () {
    Route::get('', 'App\Http\Controllers\Api\MessengerController@index');
    Route::get('/{id}', 'App\Http\Controllers\Api\MessengerController@show');
    Route::post('', 'App\Http\Controllers\Api\MessengerController@store');
    Route::delete('/{id}', 'App\Http\Controllers\Api\MessengerController@destroy');
});

//Login
Route::prefix('login')->group(function () {
    Route::get('', 'App\Http\Controllers\Api\LoginController@index');
    Route::get('/{id}', 'App\Http\Controllers\Api\LoginController@show');
    Route::get('/user/id', 'App\Http\Controllers\Api\LoginController@idUser');
    Route::post('/checkLogin', 'App\Http\Controllers\Api\LoginController@login');
    Route::post('', 'App\Http\Controllers\Api\LoginController@store');
});

Route::prefix('user')->group(function () {
    route::get('/{id}', 'App\Http\Controllers\Api\UserController@show');
});

Route::prefix('articles')->group(function () {
    Route::post('', 'App\Http\Controllers\Api\ArticleController@store');
    Route::get('/hot', 'App\Http\Controllers\Api\ArticleController@showPostHot');
    Route::get('/hot_0', 'App\Http\Controllers\Api\ArticleController@showPostHot_0');
    Route::get('/{id}', 'App\Http\Controllers\Api\ArticleController@showArticleById');
    Route::put('/{id}', 'App\Http\Controllers\Api\ArticleController@update');
    Route::delete('/{id}', 'App\Http\Controllers\Api\ArticleController@destroy');
    Route::get('/categories/{id}', 'App\Http\Controllers\Api\ArticleController@showCategories');
});

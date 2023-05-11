<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('home', 'App\Http\Controllers\ElectronicMediaController@showHome');
Route::get('index', 'App\Http\Controllers\ElectronicMediaController@showIndex');
Route::get('login', 'App\Http\Controllers\ElectronicMediaController@showLogin');
Route::get('signup', 'App\Http\Controllers\ElectronicMediaController@showSignup');


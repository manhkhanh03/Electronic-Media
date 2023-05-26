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

Route::get('index/{address}', 'App\Http\Controllers\ElectronicMediaController@show');
Route::get('index/editer/write_article/{id?}', 'App\Http\Controllers\ElectronicMediaController@showWriteArticle');

Route::get('home/{fun}/{id}', 'App\Http\Controllers\ElectronicMediaController@showCategories');

Route::get('index/article/{id}', 'App\Http\Controllers\ElectronicMediaController@showArticle');

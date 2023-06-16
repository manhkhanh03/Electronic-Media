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
    Route::get('/{id}', 'App\Http\Controllers\Api\MessengerController@show'); /////////////
    Route::post('', 'App\Http\Controllers\Api\MessengerController@store');
    Route::delete('/{id}', 'App\Http\Controllers\Api\MessengerController@destroy');
});

//Login
Route::prefix('login')->group(function () {
    Route::get('', 'App\Http\Controllers\Api\LoginController@index');
    Route::get('/{id}', 'App\Http\Controllers\Api\LoginController@show');
    Route::get('/user/id', 'App\Http\Controllers\Api\LoginController@idUser');
    Route::get('/logout/user', 'App\Http\Controllers\Api\LoginController@handleLogout');
    Route::post('/checkLogin', 'App\Http\Controllers\Api\LoginController@login');
    Route::post('', 'App\Http\Controllers\Api\LoginController@store');
    Route::post('/check_pass/{id}', 'App\Http\Controllers\Api\LoginController@checkPassword');
    Route::match(['put', 'patch'], '/{id}', 'App\Http\Controllers\Api\LoginController@update');
});

Route::prefix('user')->group(function () {
    Route::get('/{id}', 'App\Http\Controllers\Api\UserController@show'); /////////////
    Route::match(['put', 'patch'], '/{id}', 'App\Http\Controllers\Api\UserController@update');
});

Route::prefix('articles')->group(function () {
    Route::get('/hot', 'App\Http\Controllers\Api\ArticleController@showPostHot');
    Route::get('/status', 'App\Http\Controllers\Api\ArticleController@showPostByStatus');
    Route::get('/hot_0', 'App\Http\Controllers\Api\ArticleController@showPostHot_0');
    Route::get('/categories', 'App\Http\Controllers\Api\ArticleController@showCategories');
    Route::get('/cate/related_news/', 'App\Http\Controllers\Api\ArticleController@showRelatedNews');
    Route::get('/', 'App\Http\Controllers\Api\ArticleController@showArticleById');
    Route::post('', 'App\Http\Controllers\Api\ArticleController@store'); ////////////
    Route::post('/search/articles', 'App\Http\Controllers\Api\ArticleController@handleSearchArticles');
    Route::put('/{id}', 'App\Http\Controllers\Api\ArticleController@update');
    Route::delete('/{id}', 'App\Http\Controllers\Api\ArticleController@destroy');
});

// Route::middleware('jwt.auth')->group(function () {
//     // Các route cần xác thực ở đây
    
// });
Route::prefix('role')->group(function () {
    Route::get('', 'App\Http\Controllers\Api\RoleController@role');
    Route::get('/get', 'App\Http\Controllers\Api\RoleController@getRole');
});

Route::prefix('img')->group(function () {
   Route::match(['put', 'patch'], '/{id}', 'App\Http\Controllers\Api\ImageController@update'); 
});

Route::prefix('comment')->group(function () {
    Route::get('', 'App\Http\Controllers\Api\CommentController@show');
    Route::get('/parent', 'App\Http\Controllers\Api\CommentController@showParentComment');
    Route::post('', 'App\Http\Controllers\Api\CommentController@store');
});

Route::prefix('like')->group(function () {
    Route::get('/{article_id}/{user_id}', 'App\Http\Controllers\Api\LikeController@show'); /////////////
    Route::post('', 'App\Http\Controllers\Api\LikeController@store');
    Route::delete('', 'App\Http\Controllers\Api\LikeController@destroy');
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TravelControllerAPI;
use App\Http\Controllers\API\TravelPostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[TravelControllerAPI::class,'login']);
Route::post('register',[TravelControllerAPI::class,'register']);

Route::post('reset-password',[TravelControllerAPI::class,'resetPassword']);

//Posts
Route::get('get-all-posts', [TravelPostController::class, 'getAllPosts']);
Route::get('get-post', [TravelPostController::class, 'getPost']);
Route::get('search-post', [TravelPostController::class, 'searchPost']);

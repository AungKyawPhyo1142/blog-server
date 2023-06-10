<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BlogController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/blogs')->group(function () {
    Route::get('/top/rated',[BlogController::class,'getTopRated']);
    Route::get('/recent',[BlogController::class,'getRecent']);
    Route::get('/all',[BlogController::class,'getAll']);
    Route::post('/detail',[BlogController::class,'getDetail']);
    Route::post('/filter',[BlogController::class,'getFilter']);
    Route::post('/search',[BlogController::class,'searchBlog']);
});
<?php

use App\Models\blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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
    $data = blog::all();
    return view('pages.content',compact('data'));
})->name('mainContent');

Route::get('/create',[BlogController::class,'goBlogPage'])->name('createBlogPage');
Route::post('/create-blog',[BlogController::class,'createBlog'])->name('createBlog');
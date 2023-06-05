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
Route::get('/edit/{id}',[BlogController::class,'goEditBlogPage'])->name('editBlogPage');
Route::get('/view/{id}',[BlogController::class,'goViewBlogPage'])->name('viewBlogPage');
Route::get('/delete/{id}',[BlogController::class,'deleteBlog'])->name('deleteBlog');

Route::post('/create-blog',[BlogController::class,'createBlog'])->name('createBlog');
Route::post('/update-blog/{id}',[BlogController::class,'updateBlog'])->name('updateBlog');
Route::post('/search',[BlogController::class,'searchBlog'])->name('searchBlog');

Route::prefix('filter')->group(function () {
    Route::get('/cs',[BlogController::class,'filterByComputerScience'])->name('filter#cs');
    Route::get('/ks',[BlogController::class,'filterByKnowledgeSharing'])->name('filter#ks');
    Route::get('/pr',[BlogController::class,'filterByProgramming'])->name('filter#pr');
    Route::get('/tp',[BlogController::class,'filterByTips'])->name('filter#tp');
});
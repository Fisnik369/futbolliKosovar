<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

// Route::get('posts', [PostsController::class, 'index']);
// Route::get('{{$posts->id}}', [PostsController::class, 'show']);
// Route::get('create', [PostsController::class, 'create']);
// Route::post('store', [PostsController::class, 'store']);
// Route::get('/posts/{id}/edit', [PostsController::class, 'edit']);
Route::resource('posts', 'App\Http\Controllers\PostsController');





// Route::get('/users/{id}', function($id){
//     return 'This is user ' .$id;
// });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('auth/logout', 'Auth\AuthController@logout');
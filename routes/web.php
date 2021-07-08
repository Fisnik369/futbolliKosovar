<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;

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
Auth::routes();

Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::resource('chat', 'App\Http\Controllers\ChatController');
Route::get('conversation/{userId}', 'App\Http\Controllers\MessageController@conversation')->name('message.conversation');
Route::post('send-message', 'App\Http\Controllers\MessageController@sendMessage')->name('message.send-message');
Route::get('ekipi/{team}',[PagesController::class, 'team'])->name('team.getTeamResult');
// Route::get('/chat', function(){
//     return view('chat');
// });



// Route::get('/users/{id}', function($id){
//     return 'This is user ' .$id;
// });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/chat', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat');
Route::get('auth/logout', 'Auth\AuthController@logout');


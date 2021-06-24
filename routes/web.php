<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;

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

Route::get('/', function(){
    return view ('home');
})->name('home');

Route::get ('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get ('/login',[LoginController::class,'index'])->name('login');
Route::post ('/login',[LoginController::class,'login']);

Route::post ('/logout',[LogoutController::class,'logout'])->name('logout');

Route::get ('/register',[RegisterController::class,'index'])->name('register');
Route::post ('/register',[RegisterController::class,'register']);

Route::get ('/posts',[PostController::class,'index'])->name('posts');
Route::post ('/posts',[PostController::class,'post']);
Route::delete ('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::post ('/posts/{post}/likes',[PostLikeController::class,'like'])->name('posts.likes');
Route::delete ('/posts/{post}/likes',[PostLikeController::class,'destroy'])->name('posts.likes');
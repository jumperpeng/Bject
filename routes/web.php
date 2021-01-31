<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auths;

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
Auth::routes();

Route::get("/about", function(){
    return view('pages.about');
});

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('home');


Route::middleware('auth:user')->group(function(){
    Route::get('/checkAuth',function(){
        echo "CheckAuth";
    });

});


Route::namespace('User')->name('user.')->group(function () {
    Route::get("login",[Auths\UserController::class,'login_form'])->name('logins');
    Route::post("login",[Auths\UserController::class,'login'])->name('login');
    Route::get("logout",[Auths\UserController::class,'logout'])->name('logout');
});







//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', 'App\Http\Controllers\PostsController');

Route::resource('account', 'App\Http\Controllers\AMCreateController');

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auths;
use App\Http\Controllers\Admin;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::group(['prefix' => 'admin'], function () {
    Route::resource('posts', PostsController::class);
});
Route::group(['prefix' => '/'], function () {
    Route::resource('posts', PostsController::class);
});



Route::middleware(['auth:user','auth:admin'])->group(function(){
    Route::get('/checkAuth',function(){
        echo "CheckAuth";
    });
});


Route::namespace('User')->name('user.')->group(function () {
    Route::get("login",[Auths\UserController::class,'login_form'])->name('logins');
    Route::post("login",[Auths\UserController::class,'login'])->name('login');
    Route::get("logout",[Auths\UserController::class,'logout'])->name('logout');
});

Route::name('admin.')->group(function () {
    //Authentication
    Route::get("admin/login",[Auths\AdminController::class,'login_form'])->name('logins');
    Route::post("admin/login",[Auths\AdminController::class,'login'])->name('login');
    Route::get("admin/logout",[Auths\AdminController::class,'logout'])->name('logout');

    //Pages
    Route::get("admin/control",[Admin\AdminpagesController::class,'Control'])->name('control');
    Route::get("admin/dashboard",[Admin\AdminpagesController::class,'Dashboard'])->name('dashboard');
    Route::get("admin/blog",[Admin\AdminpagesController::class,'Blog'])->name('blog');
    Route::resource('admin/accountadmin', AdminController::class);
    Route::resource('admin/accountuser', UserController::class);


});










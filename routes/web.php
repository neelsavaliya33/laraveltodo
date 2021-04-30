<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/login',  [UserController::class, 'employlogin'])->name('user.login');
Route::post('/login', [UserController::class, 'employlogin'])->name('user.login');
Route::any('save-user/{employ}',[HomeController::class, 'saveuser'])->name('save-user');

Route::group(['middleware' => ['employ']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('front.home');
    Route::get('/logout', [UserController::class, 'employlogout'])->name('employ.logout');
});


Route::group(['middleware' => ['user']], function () {
    Route::view('admin/login', 'front.login')->name('admin.login');
    Route::post('admin/login', [UserController::class, 'login'])->name('admin.login');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('admin', [HomeController::class, 'adminindex'])->name('admin.home');
    Route::post('admin/invite-user',[HomeController::class, 'inviteUser'])->name('invite-user');
    Route::get('admin/logout', [UserController::class,'logout'])->name('admin.logout');
});

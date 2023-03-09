<?php

use App\Http\Controllers\Administrator\IndexController;
use App\Http\Controllers\Administrator\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',[IndexController::class,'index'])->name('login');

Route::get('/super-admin/dashboard',[IndexController::class,'SuperDashboard'])->name('user.dashboard');

Route::get('/admin/dashboard',[IndexController::class,'AdminDashboard'])->name('admin.dashboard');

Route::get('/logout',[IndexController::class,'logout'])->name('admin.logout');

Route::get('/user-create',[UserController::class,'index'])->name('users');

Route::get('/page',[IndexController::class,'page'])->name('user.page');

Route::post('/post-login',[IndexController::class,'dologin1'])->name('post-login');



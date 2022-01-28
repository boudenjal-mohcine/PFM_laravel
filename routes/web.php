<?php

use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\HebergementController;



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

 
Route::get('/', [MainController::class,'welcome'])->name('welcome');



Route::post('/auth/save',[MainController::class,'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class,'check'])->name('auth.check');


Route::group(['middleware'=>['AuthCheck']],function(){


    Route::get('/auth/login',[MainController::class,'login'])->name('auth.login');
    Route::get('/user/hotelslist',[MainController::class,'hotelslist'])->name('user.hotelslist');
    Route::get('/user/hotelshow/{id}',[MainController::class,'hotelshow'])->name('user.hotelshow');
    Route::get('/user/villashow/{id}',[MainController::class,'villashow'])->name('user.villashow');
    Route::get('/user/profile',[MainController::class,'profile'])->name('user.profile');    
    Route::get('/user/villaslist',[MainController::class,'villaslist'])->name('user.villaslist');
    Route::get('/auth/register',[MainController::class,'register'])->name('auth.register');    
    Route::get('/user/dashboard',[MainController::class,'userdashboard'])->name('user.dashboard');
    Route::get('/admin/dashboard',[MainController::class,'admindashboard'])->name('admin.dashboard');
    Route::get('/auth/logout',[MainController::class,'logout'])->name('logout');
    Route::resource('admin/userslist', UserController::class);
    Route::resource('admin/hotels', HotelController::class);
    Route::resource('admin/villas', VillaController::class);
    Route::resource('admin/hebergements', HebergementController::class);






});
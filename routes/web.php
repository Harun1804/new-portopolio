<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class,'index'])->name('welcome');
Route::get('/{id}', [HomeController::class,'show'])->name('show');

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function(){
    Route::get('/login','loginPage')->name('login');
    Route::post('/proces/login','loginProcess')->name('process');
    Route::post('/logout','logout')->name('logout');
});

Route::prefix('/admin')->middleware('auth')->controller(AdminController::class)->name('admin.')->group(function(){
    Route::get('/dashboard','dashboard')->name('dashboard');
    Route::prefix('/master-data')->name('master.data.')->group(function(){
        Route::get('/job','job')->name('job');
        Route::get('/sosmed','sosmed')->name('sosmed');
    });
    Route::get('/user','user')->name('user');
});

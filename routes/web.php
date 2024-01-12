<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;


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


    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/qr/{uniq_id}', [App\Http\Controllers\HomeController::class, 'qrGenerate'])->name('home.qr');
Route::get('/new-blade', [App\Http\Controllers\HomeController::class, 'newBlade'])->name('new-blade');
Route::get('/all-qr-codes', [App\Http\Controllers\HomeController::class, 'allQrCodes'])->name('home.all-qr');
Route::get('/all-qr-codes', [App\Http\Controllers\HomeController::class, 'allQrCodes'])->name('home.all-qr');

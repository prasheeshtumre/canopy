<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnershipPropertyController;

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


Route::get('/birth-certificate', [BirthController::class, 'index'])->name('home');
Route::post('/insertData', [BirthController::class, 'store'])->name('insertData');
Route::get('/logout', [BirthController::class, 'logout'])->name('logout');
Route::get('/curl_web', [BirthController::class, 'curl_web'])->name('curl_web');
Route::get('/get-birth-certificate', [BirthController::class, 'get_application'])->name('get_application');
Route::post('/getApplicationData', [BirthController::class, 'getApplicationData'])->name('getApplicationData');



Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/checkLogin', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::any('/getOTPNumber', [LoginController::class, 'getOTPNumber'])->name('getOTPNumber');
Route::post('/RegisterUser', [LoginController::class, 'RegisterUser'])->name('RegisterUser');
Route::post('/verifyOTP', [LoginController::class, 'verifyOTP'])->name('verifyOTP');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/health-department', [DashboardController::class, 'health_department'])->name('health-department');


Route::get('/ownership-property', [OwnershipPropertyController::class, 'index'])->name('ownership_property');
// Route::post('/insertData', [BirthController::class, 'store'])->name('insertData');
// Route::get('/logout', [BirthController::class, 'logout'])->name('logout');
// Route::get('/curl_web', [BirthController::class, 'curl_web'])->name('curl_web');




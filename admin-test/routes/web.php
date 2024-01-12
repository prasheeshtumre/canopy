<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GenerateQrCodeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\PlanController;
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
    return redirect(route('login'));
});

Route::get('admin/qr/{id}', [GenerateQrCodeController::class, 'qrGenerate'])->name('qr_code');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/qr-code', [GenerateQrCodeController::class, 'GenerateQrCode'])->name('admin.qr_code');
    Route::get('/ajax/plan', [GenerateQrCodeController::class, 'getPlans'])->name('admin.ajax.plan');
    Route::get('/admn-users', [GenerateQrCodeController::class, 'getUsers'])->name('admin.users');
    Route::get('/admin-users/{id}', [GenerateQrCodeController::class, 'edit'])->name('admin.edit');
    Route::post('/update', [GenerateQrCodeController::class, 'update'])->name('admin.update');

    Route::post('/store-qr-code', [GenerateQrCodeController::class, 'store'])->name('admin.store');
    Route::get('/show-qr-code', [GenerateQrCodeController::class, 'show'])->name('admin.show');

    Route::get('/client-mst', [ClientController::class, 'index'])->name('admin.client_mst');
    Route::get('/plan-mst', [PlanController::class, 'newPlan'])->name('admin.newplan-add');
    Route::get('/all-plans', [PlanController::class, 'index'])->name('admin.plan_mst');
    Route::post('add-plan', [PlanController::class, 'addPlan'])->name('admin.add-plan');
    Route::post('/add-client', [ClientController::class, 'addClient'])->name('admin.add-client');

    Route::get('/download-zip', [GenerateQrCodeController::class, 'downloadZip'])->name('admin.download-zip');


    Route::any('/upload-qr', [ExcelController::class, 'uploadQr'])->name('upload-qr');

    Route::any('/update-qr-blade', [ExcelController::class, 'updateQrBlade'])->name('admin.update-qr-blade');
    Route::any('/update-qr-code', [ExcelController::class, 'updateQrCodes'])->name('admin.update-qr-code');
    // Route::any('/upload-qr', function(){
    //     return 'hi';

    // })->name('upload-qr');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

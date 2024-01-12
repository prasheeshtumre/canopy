<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GenerateQrCodeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\UserController;


/*admin/add-client
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
    Route::get('edit-plan/{id}', [PlanController::class, 'editPlan'])->name('admin.edit-plan');
    Route::any('update-plan/{id}', [PlanController::class, 'updatePlan'])->name('admin.update-plan');
    Route::post('/add-client', [ClientController::class, 'addClient'])->name('admin.add-client');
    Route::get('/search-client/{client_id_search}', [ClientController::class, 'searchClient'])->name('admin.search-client');
    Route::any('/search-plans', [PlanController::class, 'searchPlans'])->name('search-plans');


    Route::get('/download-zip', [GenerateQrCodeController::class, 'downloadZip'])->name('admin.download-zip');
    Route::get('/download-zip-codes', [GenerateQrCodeController::class, 'downloadZipCodes'])->name('admin.download-zip');

    Route::any('/upload', [ExcelController::class, 'upload'])->name('upload');

    Route::any('/update-qr-blade', [ExcelController::class, 'updateQrBlade'])->name('admin.update-qr-blade');
    Route::any('/update-qr-code', [ExcelController::class, 'updateQrCodes'])->name('admin.update-qr-code');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

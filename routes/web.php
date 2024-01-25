<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\authjwt;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */


Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::get('/login', [AuthController::class, 'indexLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('auth.login.process');

Route::middleware(['authjwt'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/confirmation-payment/{id}', [HomeController::class, 'confirmationPayment'])->name('home.confirmation');

    Route::get('/generate/{trx_id}', [HomeController::class, 'generate'])->name('home.generate');
    Route::get('/success/{invoice_id}', [HomeController::class, 'success'])->name('home.success');
    Route::get('/invoice/{invoice_id}', [HomeController::class, 'invoice'])->name('home.invoice');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/service', [AdminController::class, 'service'])->name('dashboard.service');
    Route::get('/dashboard/treatment', [AdminController::class, 'treatment'])->name('dashboard.treatment');
    Route::get('/dashboard/pesanan', [AdminController::class, 'pesanan'])->name('dashboard.pesanan');
    Route::get('/dashboard/invoice', [AdminController::class, 'invoice'])->name('dashboard.invoice');
    Route::get('/dashboard/testimoni', [AdminController::class, 'testimoni'])->name('dashboard.testimoni');
});

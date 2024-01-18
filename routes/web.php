<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::get('/login', [AuthController::class, 'indexLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('auth.login.process');

Route::get('/confirmation-payment/{id}', [HomeController::class, 'confirmationPayment'])->name('home.confirmation');

Route::get('/generate/{trx_id}', [HomeController::class, 'generate'])->name('home.generate');
Route::get('/invoice/{invoice_id}', [HomeController::class, 'invoice'])->name('home.invoice');


// Route::get('/dashboard',[AdminController::class,'index']);
// Route::get('/dashboard/jenispaket',[AdminController::class,'jenispaket']);
// Route::get('/dashboard/pesanan',[AdminController::class,'pesanan']);
// Route::get('/dashboard/invoice',[AdminController::class,'invoice']);
// Route::get('/dashboard/testimoni',[AdminController::class,'testimoni']);

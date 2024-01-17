<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/login', [AuthController::class, 'indexLogin'])->name('auth.login');

Route::get('/confirmation-payment/{id}', [HomeController::class, 'confirmationPayment'])->name('home.confirmation');

Route::get('/generate/{trx_id}', [HomeController::class, 'generate'])->name('home.generate');
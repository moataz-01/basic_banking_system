<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customers/transfer/{id}', [CustomerController::class, 'transfer'])->name('customer.transfer');
Route::post('/customers/transfer/confirm/{id}', [CustomerController::class, 'confirm'])->name('customer.confirm');
Route::get('/history', [CustomerController::class, 'history'])->name('history');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OwnerController;
// use App\Http\Controllers\CarsController;

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

Route::get('/', [PagesController::class,'index']);
Route::get('/main', [PagesController::class,'main'])->name('main');

Route::resource('cars',CarsController::class);
Route::resource('transactions',TransactionController::class);
// Route::get('/cars', [CarsController::class,'index'])->name('cars');
// Route::get('/car-edit/{id}', [CarsController::class,'edit'])->name('car-edit');
// Route::put('/car-update/{id}', [CarsController::class,'update'])->name('car-update');
// Route::delete('/car-delete/{id}', [CarsController::class,'destroy'])->name('car-delete');
// Route::post('/cars', [CarsController::class,'store'])->name('cars');

// Route::get('/transaction', [TransactionController::class,'index'])->name('transaction');
Route::post('/login', [OwnerController::class,'login'])->name('login');
Route::get('/logout', [OwnerController::class,'logout'])->name('logout');

<?php

use App\Http\Controllers\car;
use App\Http\Controllers\carController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [carController::class,'welcome'])->name('welcome');
Route::post('/store', [carController::class,'store'])->name('store');
Route::get('/create', [carController::class,'createCars'])->name('createCars');
Route::get('/edit/{id}' , [carController::class,'editCars'])->name('editCars');
Route::patch('/update/{id}', [carController::class,'updateCar'])->name('updateCar');
Route::delete('/delete/{id}', [carController::class,'deleteCar'])->name('deleteCar');
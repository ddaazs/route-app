<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
});

Route::name('cars.')->group(function (){
    Route::get('cars',[CarController::class,'index'])->name('index');
    Route::get('cars/create', [CarController::class, 'create'])->name('create');
    Route::post('cars',[CarController::class,'store'])->name('store');
    Route::get('cars/{id}/edit',[CarController::class,'edit'])->name('edit');
    Route::get('cars/{id}',[CarController::class,'show'])->name('show');
    Route::put('cars/{id}',[CarController::class,'update'])->name('update');
    Route::delete('cars/{id}',[CarController::class,'destroy'])->name('destroy');
})->middleware('auth');

Route::get('/',[DashboardController::class,'index']);

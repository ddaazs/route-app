<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');
// Route::get('cars', [CarController::class,'countPhoto'])->name('cars.count');


Route::name('cars.')->group(function (){
    Route::get('cars',[CarController::class,'index'])->name('index');
    Route::get('cars/create', [CarController::class, 'create'])->name('create');
    Route::post('cars',[CarController::class,'store'])->name('store');
    Route::get('cars/{id}/edit',[CarController::class,'edit'])->name('edit');
    Route::get('cars/{id}',[CarController::class,'show'])->name('show');
    Route::put('cars/{id}',[CarController::class,'update'])->name('update');
    Route::delete('cars/{id}',[CarController::class,'destroy'])->name('destroy');
})->middleware('auth');

Route::middleware('guest')->group(function (){
    Route::resource('cars.photos', PhotoController::class)->shallow()->names([]);
    // Route::delete('cars.photos', [PhotoController::class, 'deletePhoto'])->name('cars.deletePhoto');
    });


Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth');

// Route::resources(['cars'=>CarController::class,
//                     'photos'=>PhotoController::class,]);

// Route::resource('cars', CarController::class)->middleware('auth');
Route::middleware(['guest'])->group(function () {
    Route::get('login',[LoginController::class,'create'])->name('login');
    Route::post('login',[LoginController::class,'store'])->name('login.log');
    Route::get('register',[RegisterController::class,'index'])->name('register');
});


/* Route group via controller
Route::controller(CarController::class)->group(function (){
    Route::get('cars','index')->name('cars.index');
    Route::get('cars/create','create')->name('cars.create');
});
*/

Route::get('/',[DashboardController::class,'index']);

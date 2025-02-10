<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');});
// Route::get('/', [CarController::class,'countPhoto'])->name('photos.count');

Route::middleware(['auth','verified'])->name('cars.')
    ->group(function () {
        Route::get('cars', [CarController::class, 'index'])->name('index');
        Route::get('cars/create', [CarController::class, 'create'])->name('create');
        Route::post('cars', [CarController::class, 'store'])->name('store');
        Route::get('cars/{id}/edit', [CarController::class, 'edit'])->name('edit');
        Route::get('cars/{id}', [CarController::class, 'show'])->name('show');
        Route::put('cars/{id}', [CarController::class, 'update'])->name('update');
        Route::delete('cars/{id}', [CarController::class, 'destroy'])->name('destroy');
    });

Route::middleware('guest')->group(function () {

    // Route::delete('cars.photos', [PhotoController::class, 'deletePhoto'])->name('cars.deletePhoto');
});

Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth');

// Route::resources(['cars'=>CarController::class,
//                     'photos'=>PhotoController::class,]);

// Route::resource('cars', CarController::class)->middleware('auth');
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.log');
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware(['auth','verified'])->group(function (){
    Route::get('profile/{user}',[UserController::class,'show'])->name('profile');
    Route::resource('cars.photos', PhotoController::class)->shallow()->names([]);
    Route::post('/logout',[LoginController::class,'destroy'])->name('logout');
});

/* Route group via controller
Route::controller(CarController::class)->group(function (){
    Route::get('cars','index')->name('cars.index');
    Route::get('cars/create','create')->name('cars.create');
});
*/

Route::get('response',[ResponseController::class, 'index'])->name('response.index');


Route::get('/', [DashboardController::class, 'index'])->name('welcome');

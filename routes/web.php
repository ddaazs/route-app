<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoCount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as Admin;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\PostController;

function streamedContent(): Generator
{
    yield 'Hello, ';
    yield 'World!';
}

Route::get('/', function () {
    return view('welcome');
});

//Car
Route::middleware(['auth', 'verified'])
    ->name('cars.')
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
    Route::get('/google', [ResponseController::class, 'google'])->name('google');
    // Route::delete('cars.photos', [PhotoController::class, 'deletePhoto'])->name('cars.deletePhoto');
});
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth');

// Route::resources(['cars'=>CarController::class,
//                     'photos'=>PhotoController::class,]);
// Route::resource('cars', CarController::class)->middleware('auth');

//Login
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.log');
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

//Post
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('profile/{user}', [UserController::class, 'show'])->name('profile');
    Route::get('post', [PostController::class, 'index'])->name('posts.index');
    Route::post('post',[PostController::class,'store'])->name('posts.store');
    Route::get('post/{post}',[PostController::class,'show'])->name('post.show');
    Route::delete('post/{post}',[PostController::class,'destroy'])->name('posts.destroy');
    Route::get('post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::put('post/{post}', [PostController::class,'update'])->name('post.update');
});

//Response
Route::middleware(['auth', 'verified', 'auth.session'])
    ->name('response.')
    ->group(function () {
        Route::get('response/gg', [ResponseController::class, 'google'])->name('google');
        Route::get('response/header', [ResponseController::class, 'header'])->name('header');
        Route::get('response/cookie', [ResponseController::class, 'cookie'])->name('cookie');
        Route::get('response', [ResponseController::class, 'index'])->name('index');
        Route::get('response/controller', [ResponseController::class, 'controllerCalled'])->name('controller');
        Route::get('response/download', [ResponseController::class, 'download'])->name('download');
        Route::get('response/readfile', [ResponseController::class, 'readfile'])->name('readfile');
        Route::get('caps', function () {
            return response()->caps('hello world');
        })->name('caps');
        Route::get('response/stream', [ResponseController::class, 'responseStream'])->name('stream');
        Route::get('/stream', function () {
            return response()->stream(
                function (): void {
                    foreach (streamedContent() as $chunk) {
                        echo $chunk;
                        ob_flush();
                        flush();
                        sleep(5); // Simulate delay between chunks...
                    }
                },
                200,
                ['X-Accel-Buffering' => 'no'],
            );
        })->name('resStream');
    });

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [Admin::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
/* Route group via controller
Route::controller(CarController::class)->group(function (){
    Route::get('cars','index')->name('cars.index');
    Route::get('cars/create','create')->name('cars.create');
});
*/

Route::middleware(['auth'])
    ->name('verification.')
    ->group(function () {
        Route::post('email/send', [EmailVerifyController::class, 'send'])
            ->middleware('throttle:6,1')
            ->name('send');
        Route::get('email/verify', [EmailVerifyController::class, 'show'])->name('notice');
        Route::get('email/verify/{id}/{hash}', [EmailVerifyController::class, 'verify'])->name('verify');
        Route::post('email/resend', [EmailVerifyController::class, 'resend'])
            ->middleware('throttle:6,1')
            ->name('resend');
    });

Route::get('/', [DashboardController::class, 'index'])->name('welcome');

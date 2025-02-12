<?php

namespace App\Providers;

use App\Interfaces\PostInterface;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostInterface::class,PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::pattern('id','^[0-9]+');
        Paginator::useBootstrapFive();
        Response::macro('caps', function (string $value){
            return Response::make(strtoupper($value));
        });
    }
}

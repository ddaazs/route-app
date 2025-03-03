<?php

use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\TrustProxies;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Config;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        apiPrefix:'api/admin',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(
            ['127.0.0.1:8000'],
            // Request::HEADER_X_FORWARDED_HOST |
            // Request::HEADER_X_FORWARDED_FOR |
            // Request::HEADER_X_FORWARDED_PREFIX |
            // Request::HEADER_X_FORWARDED_PORT |
            // Request::HEADER_X_FORWARDED_PROTO
        );
        $middleware->redirectGuestsTo('login');
        $middleware->encryptCookies(['ddaass']);
        $middleware->alias([
            'admin'=>EnsureUserIsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

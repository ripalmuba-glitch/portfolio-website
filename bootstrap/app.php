<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\TrustProxies; // 1. Import class

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // 2. Tambahkan baris ini untuk Railway
        $middleware->trustProxies(at: TrustProxies::all());

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

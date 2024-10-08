<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Localization;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        health: '/up',
    )
    
    ->withMiddleware(function (Middleware $middleware) {
        // return [
        //     \App\Http\Middleware\LocalizationMiddleware::class,
        // ];
        $middleware->append(Localization::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

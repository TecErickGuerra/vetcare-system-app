<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\CheckAdmin::class,
            \App\Http\Middleware\CheckStaff::class, 
            \App\Http\Middleware\CheckClient::class,
        ]);

        $middleware->alias([
            'check.admin' => \App\Http\Middleware\CheckAdmin::class,
            'check.staff' => \App\Http\Middleware\CheckStaff::class,
            'check.client' => \App\Http\Middleware\CheckClient::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

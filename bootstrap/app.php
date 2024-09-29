<?php

use App\Http\Middleware\CheckMainChurch;
use App\Http\Middleware\CheckSubChurch;
use App\Http\Middleware\CheckSuperadmin;
use App\Http\Middleware\CheckUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'main-church' => CheckMainChurch::class,
            'sub-church' => CheckSubChurch::class,
            'user' => CheckUser::class,
            'superadmin' => CheckSuperadmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

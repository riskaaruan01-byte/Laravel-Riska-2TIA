<?php

use App\Http\Middleware\CheckIsLogin;
use App\Http\Middleware\CheckRole; // <--- 1. TAMBAHKAN INI
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'checkislogin' => CheckIsLogin::class,
            'checkrole' => CheckRole::class, // <--- 2. TAMBAHKAN INI
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
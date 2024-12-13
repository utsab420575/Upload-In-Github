<?php

use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CountryCheck;
use Illuminate\Foundation\Application;
use App\Http\Middleware\WorkingHourMiddlware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
       /*  //Global MiddleWare
        $middleware->append(WorkingHourMiddlware::class); */

        //Middleware Group
        $middleware->appendToGroup('age-country-check', [
            AgeCheck::class,
            CountryCheck::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            '/*',
        ]);
        $middleware->alias([
            'working.hours' => WorkingHourMiddlware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

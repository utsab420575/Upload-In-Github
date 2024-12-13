<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BladeController;
use App\Http\Middleware\RedirectMiddleWare;
use App\Http\Controllers\ResponseController;
use App\Http\Middleware\WorkingHourMiddlware;
use App\Http\Controllers\MiddleWareController;
use App\Http\Controllers\ConstructorController;
use App\Http\Controllers\SingleActionController;

//Log value
Route::get('/log-show', [ResponseController::class, 'log_show']);

//session data store
Route::post('/session-put/{email}', [ResponseController::class, 'session_put']);

//session data get
// Retrieve session data
Route::get('session-get', [ResponseController::class, 'session_get']);

//Session pull
// Retrieve and remove session value
//Retrive only once
Route::get('session-pull', [ResponseController::class, 'session_pull']);

//Session Forget
// Forget a specific session value
Route::get('session-forget', [ResponseController::class, 'session_forget']);

//Session Flash
// Flush all session data
Route::get('session-flash', [ResponseController::class, 'session_flash']);

//
Route::get('middleware-test', [MiddleWareController::class, 'middleware_test'])
        ->middleware(WorkingHourMiddlware::class);

Route::get('redirect-using-middleware-1/{api_key}', [MiddleWareController::class, 'redirect_using_middleware_1'])
            ->middleware(RedirectMiddleWare::class);

Route::get('redirect-using-middleware-2', [MiddleWareController::class, 'redirect_using_middleware_2']);

Route::middleware(['working.hours'])->group(function () {
    Route::get('/group-test-1', [MiddleWareController::class, 'group_test_1']);
    Route::get('/group-test-2', [MiddleWareController::class, 'group_test_2']);
    Route::get('/group-test-3', [MiddleWareController::class, 'group_test_3']);
});

Route::get('/age-country-test', [MiddleWareController::class, 'age_country_test'])
            ->middleware('age-country-check');

//Apply Group of middleware in group of function
/* Route::middleware(['age-country-check'])->group(function () {
    Route::get('/group-test-1', [MiddleWareController::class, 'group_test_1']);
    Route::get('/group-test-2', [MiddleWareController::class, 'group_test_2']);
    Route::get('/group-test-3', [MiddleWareController::class, 'group_test_3']);
}); */


//Rate Limiting Middleware
//this route can access only 5 times in 1 minute
Route::get('/rate-limiting',[MiddleWareController::class,'rate_limiting'])
            ->middleware('throttle:5,1');


//Single Action Controller
 Route::get('/single-action-controller',SingleActionController::class);

 //Constructor Controller
 Route::get('/controller-constructor-1',[ConstructorController::class,'controller_constructor_1']);
 Route::get('/controller-constructor-2',[ConstructorController::class,'controller_constructor_2']);


 //Blade Show
 Route::get('/sample-blade-show',[BladeController::class,'sample_blade_show']);

//Data Pass To Blade File Example 1
Route::get('/associative-array-pass-1',[BladeController::class,'associative_array_pass_1']);
Route::get('/associative-array-pass-2/{value1}/{value2}',[BladeController::class,'associative_array_pass_2']);

//if elseif else
Route::get('/if-else-in-blade',[BladeController::class,'if_else_in_blade']);
Route::get('/if-else-in-controller',[BladeController::class,'if_else_in_controller']);

//for loop
Route::get('/for-loop',[BladeController::class,'for_loop']);

//for each loop
Route::get('/for-each-loop',[BladeController::class,'for_each_loop']);
Route::get('/for-each-loop-1',[BladeController::class,'for_each_loop_1']);

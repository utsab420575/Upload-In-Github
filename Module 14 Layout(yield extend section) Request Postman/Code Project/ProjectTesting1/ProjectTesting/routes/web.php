<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RequestController;


Route::post('/ip-address',[RequestController::class,'ip_address']);

Route::post('/get-cookies',[RequestController::class,'get_cookies']);

Route::post('/get-response',[RequestController::class,'get_response']);

Route::get('/redirection1',[RequestController::class,'redirection1'])->name('redirection1');

Route::get('/redirection2',[RequestController::class,'redirection2'])->name('redirection2');

Route::post('/cookie-set',[RequestController::class,'cookie_set']);


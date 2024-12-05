<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RequestController;


Route::post('/utsab',[RequestController::class,'store_file']);
Route::post('/utsab/date',[RequestController::class,'store_day_wise_file']);



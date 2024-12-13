<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/",[HomeController::class,'HomePage1']);
Route::get("/2",[HomeController::class,'HomePage2']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/home', function () {
    return view('welcome');
})->name('home');
//Show to form
Route::get('/form-show',[FormController::class,'form_show'])->name('form-show');
//Submit the form
Route::post('/form-submit',[FormController::class,'form_submit'])->name('form-submit');

Route::get('/registration-form-show',[FormController::class,'registration_form_show'])->name('registration-form-show');
Route::post('/registration-form-submit',[FormController::class,'registration_form_submit'])->name('registration-form-submit');

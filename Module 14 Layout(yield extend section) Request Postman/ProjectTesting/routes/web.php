<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('static_pages.home');
})->name('home');

Route::get('/about', function () {
    return view('static_pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('static_pages.contact');
})->name('contact');

Route::get('/login',[FormController::class,'login'])->name('login');
Route::post('/login-submit',[FormController::class,'login_submit'])->name('login-submit');



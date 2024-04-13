<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login')->name('index');

Auth::routes([
    'register' => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('companies', CompanyController::class);
});

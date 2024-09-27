<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LocalizationController;

use App\Http\Middleware\Localization;


Route::middleware(Localization::class)->group(function () {

    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('all.users');
    Route::get('users/data', [App\Http\Controllers\UserController::class, 'getUsersData'])->name('users.data');
    Route::get('localization/{locale}', [LocalizationController::class, 'index'])->name('lang.switch');
    Route::get('localization/{locale}', [LocalizationController::class, 'switchLang'])->name('lang.switch');

});
// route('lang.switch', ['locale' => 'en'])
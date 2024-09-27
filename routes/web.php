<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
// use App\Http\Controllers\LocalizationController;

use App\Http\Middleware\Localization;


Route::middleware(Localization::class)->group(function () {

    Route::get('/', function () {
    return view('auth.login');
});

    Auth::routes();
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('all.users');
    // Route::get('users/data', [App\Http\Controllers\UserController::class, 'getUsersData'])->name('users.data');


    // Route::get('/importers', [App\Http\Controllers\ImporterController::class, 'index'])->name('all.importers');
    // Route::get('importers/data', [App\Http\Controllers\UserController::class, 'getimportersData'])->name('importers.data');
    // Route::get('localization/{locale}', [LocalizationController::class, 'switchLang'])->name('lang.switch');


    
    Route::group(['namespace' => 'App\Http\Controllers'], function () {
        Route::get('/home', ['uses' => 'HomeController@index'])->name('home');
    Route::get('/users', ['uses' => 'UserController@index'])->name('all.users');
    Route::get('users/data',  ['uses' => 'UserController@getUsersData'])->name('users.data');


    Route::delete('importers/delete/{id}', ['uses' => 'ImporterController@destroy'])->name('importers.delete');

    Route::get('importers', ['uses' => 'ImporterController@index'])->name('all.importers');
    Route::get('importers/data', ['uses' => 'ImporterController@getimportersData'])->name('importers.data');

    Route::get('shippingCompanies', ['uses' => 'ShippingCompanyController@index'])->name('all.shippingCompanies');
    Route::get('shippingCompanies/data', ['uses' => 'ShippingCompanyController@getShippingData'])->name('shippingCompanies.data');
    Route::delete('importers/delete/{id}', ['uses' => 'ShippingCompanyController@destroy'])->name('shipping.delete');


    Route::get('localization/{locale}', ['uses' => 'LocalizationController@switchLang'])->name('lang.switch');
    
    });

});
// route('lang.switch', ['locale' => 'en'])
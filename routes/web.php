<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('all.users');
Route::get('users/data', [App\Http\Controllers\UserController::class, 'getUsersData'])->name('users.data');
// Route::get('/users/data', [UserController::class, 'getUsersData'])->name('users.data');



Route::get('localization/{locale}','LocalizationController@index')->name('localization');
Route::get('/locale/{locale}', function (Request $request, $locale) {
    
Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');
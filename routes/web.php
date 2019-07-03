<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes(['verify' => true, 'register' => false]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('management')->group(function () {
        Route::get('/', 'ManagementController@dashboard')->name('dashboard');
        Route::resource('users', 'Management\UserController');
    });
});

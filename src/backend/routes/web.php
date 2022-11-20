<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('App\Http\Controllers')->group(function () {

    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');

    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('pull', function () {
        return view('pull');
    });
});





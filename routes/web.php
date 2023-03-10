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

Route::get('/','App\Http\Controllers\HomeController@front')->name('front');
Route::get('/login', function () {
   return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::resource('/gallery', App\Http\Controllers\GalleryController::class);
    Route::resource('/mosaic', App\Http\Controllers\MosaicController::class);
    Route::resource('/glass', App\Http\Controllers\GlassController::class);
    Route::resource('/settings', App\Http\Controllers\SettingsController::class);
    Route::resource('/slider', App\Http\Controllers\SliderController::class);

});


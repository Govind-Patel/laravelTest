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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('savedata','AdvertisementController@savedata');
Route::get('add_list','AdvertisementController@add_list');
Route::get('edit/{id}','AdvertisementController@edit');
Route::get('delete/{id}','AdvertisementController@delete');
Route::post('updateData/{id}','AdvertisementController@updateData');


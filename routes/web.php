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
//Profile selected
Route::get('/', 'AppController@settings')->middleware(['auth.shop'])->name('home');
//Settings
Route::get('settings', 'AppController@settings')->middleware(['auth.shop'])->name('settings');
//Settings
Route::get('layouts/{id}', 'AppController@layouts')->middleware(['auth.shop'])->name('layouts');
Route::get('possitions', 'AppController@possitions')->middleware(['auth.shop'])->name('possitions');
Route::get('checkdomain/{id}', 'AppController@checkdomain')->name('checkdomain');

Route::get('/profile', 'AppController@profile')->name('profile');
// Profile elderly
Route::get('elderly/{id}', 'AppController@elderly')->name('elderly');


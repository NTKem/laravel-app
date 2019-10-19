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
Route::get('/', 'AppController@index')->middleware(['auth.shop'])->name('home');
// Profile elderly
Route::get('elderly/{id}', 'AppController@elderly')->middleware(['auth.shop'])->name('elderly');
//Setting save
Route::post('settings','AppController@settings')->middleware(['auth.shop'])->name('settings');
//Setting css
Route::get('settings-css','AppController@Settings_Css')->middleware(['auth.shop'])->name('settings-css');

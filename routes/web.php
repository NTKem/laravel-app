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
//Settings
Route::get('settings', 'AppController@settings')->middleware(['auth.shop'])->name('settings');
//Settings
Route::get('layouts/{id}', 'AppController@layouts')->middleware(['auth.shop'])->name('layouts');
Route::get('possitions', 'AppController@possitions')->middleware(['auth.shop'])->name('possitions');
Route::get('checkdomain/{id}', 'AppController@checkdomain')->name('checkdomain');
//Admin profile
Route::get('admin/profile', 'AppController@AdminProfile')->middleware(['auth.shop'])->name('admin/profile');
Route::get('admin/elderly/{id}', 'AppController@AdminElderly')->middleware(['auth.shop'])->name('admin/elderly');
Route::post('admin/settings', 'AppController@AdminSettings')->middleware(['auth.shop'])->name('admin/settings');
Route::get('get-profile/{id}/{url}', 'AppController@GetProfile')->name('get-profile');
//Admin Upload Font
Route::get('admin/upload-font', 'AppController@AdminUploadFont')->middleware(['auth.shop'])->name('admin/upload-font');
Route::post('admin/upload-font', 'AppController@AdminPostUploadFont')->middleware(['auth.shop']);
Route::get('admin/edit-font/{id}', 'AppController@AdminEditFont')->middleware(['auth.shop']);
Route::get('admin/delete-font/{id}', 'AppController@AdminDeleteFont')->middleware(['auth.shop']);
Route::post('admin/edit-font/{id}', 'AppController@AdminPostEditFont')->middleware(['auth.shop']);

Route::get('profile', 'AppController@profile')->name('profile');
// Profile elderly
Route::get('elderly/{id}', 'AppController@elderly')->name('elderly');


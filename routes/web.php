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

Route::get('/home', function () {
    return view('index');
});
Route::get('/', 'Auth\LoginShopifyController@redirectToProvider')->name('login');
Route::get('login/shopify/callback', 'Auth\LoginShopifyController@handleProviderCallback');

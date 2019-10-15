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
});
Route::get('login/shopify', 'Auth\LoginShopifyController@redirectToProvider');
Route::get('login/shopify/callback', 'Auth\LoginShopifyController@handleProviderCallback');
Route::get('/install', 'AppController@install');

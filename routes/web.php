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
    return redirect('master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/master', 'HomeController@master')->name('master');

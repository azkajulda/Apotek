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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Master Data
Route::group(['prefix'=>'konsumen'],function (){
    Route::get('/', 'HomeController@konsumen')->name('konsumen');
    Route::get('/add', 'HomeController@addKonsumen')->name('addKonsumen');
    Route::get('/upload', 'HomeController@uploadKonsumen')->name('uploadKonsumen');
});

Route::group(['prefix' => 'distributor'], function () {
    Route::get('/','DistributorController@index')->name('distributor');
    Route::get('/add', 'DistributorController@add')->name('add-distributor');
    Route::post('/add', 'DistributorController@store')->name('store-distributor');

    Route::get('/edit/{id}', "DistributorController@edit")->name("edit-distributor");
    Route::post('/update/{id}', "DistributorController@update")->name('update-distributor');
});



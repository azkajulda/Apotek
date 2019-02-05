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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'konsumen'], function () {
        Route::get('/', 'KonsumenController@konsumen')->name('konsumen');
        Route::get('/add', 'KonsumenController@addKonsumen')->name('addKonsumen');
        Route::post('/upload', 'KonsumenController@uploadKonsumen')->name('uploadKonsumen');
        Route::get('/delete/{id}', 'KonsumenController@delete')->name('deleteKonsumen');
        Route::get('/edit/{id}', 'KonsumenController@get_data_konsumen')->name('editKonsumen');
        Route::post('/update/{id}', 'KonsumenController@updateKonsumen')->name('updateKonsumen');
    });

    Route::group(['prefix' => 'distributor'], function () {
        Route::get('/', 'DistributorController@index')->name('distributor');
        Route::get('/add', 'DistributorController@add')->name('add-distributor');
        Route::post('/add', 'DistributorController@store')->name('store-distributor');
        Route::get('/edit/{id}', "DistributorController@edit")->name("edit-distributor");
        Route::post('/update/{id}', "DistributorController@update")->name('update-distributor');
        Route::get('/delete/{id}', "DistributorController@delete")->name("delete-distributor");
    });

    Route::group(['prefix' => 'produsen'], function () {
        Route::get('/', "ProdusenController@index")->name("produsen");
        Route::get('/add', "ProdusenController@create")->name("add-produsen");
        Route::post('/add', "ProdusenController@store")->name("store-produsen");
        Route::get('/edit/{id}', "ProdusenController@edit")->name('edit-produsen');
        Route::post('/update/{id}', "ProdusenController@update")->name("update-produsen");
        Route::get('/delete/{id}', "ProdusenController@destroy")->name('delete-produsen');

    });

    Route::group(['prefix' => 'medicine'], function () {
        Route::get('/', "MedicineController@index")->name('medicine');
        Route::get('/add', "MedicineController@create")->name('add-medicine');
        Route::post('/add', "MedicineController@store")->name('store-medicine');
        Route::get('/edit/{id}', "MedicineController@edit")->name('edit-medicine');
        Route::post('/update/{id}', "MedicineController@update")->name('update-medicine');
        Route::get('/delete/{id}', "MedicineController@destroy")->name('delete-medicine');
    });

    Route::group(['prefix' => 'karyawan'], function () {
        Route::get('/', 'KaryawanController@karyawan')->name('karyawan');
        Route::get('/add', 'KaryawanController@addKaryawan')->name('addKaryawan');
        Route::post('/upload', 'KaryawanController@uploadKaryawan')->name('uploadKaryawan');
        Route::get('/delete/{id}', 'KaryawanController@delete')->name('deleteKaryawan');
        Route::get('/edit/{id}', 'KaryawanController@get_data_karywan')->name('editKaryawan');
        Route::post('/update/{id}', 'KaryawanController@updateKaryawan')->name('updateKaryawan');
    });

    Route::group(['prefix' => 'dokter'], function () {
        Route::get('/', 'DokterController@dokter')->name('dokter');
        Route::get('/add', 'DokterController@addDokter')->name('addDokter');
        Route::post('/upload', 'DokterController@uploadDokter')->name('uploadDokter');
        Route::get('/delete/{id}', 'DokterController@delete')->name('deleteDokter');
        Route::get('/edit/{id}', 'DokterController@get_data_dokter')->name('editDokter');
        Route::post('/update/{id}', 'DokterController@updateDokter')->name('updateDokter');
    });

    Route::group(['prefix' => 'purchase'], function () {
        Route::get('/', "PurchaseController@index")->name('purchase');
        Route::get('/add', "PurchaseController@create")->name('add-purchase');
        Route::post('/add', "PurchaseController@store")->name('store-purchase');
        Route::get('/edit/{id}', "PurchaseController@edit")->name('edit-purchase');
        Route::post('/update/{id}', "PurchaseController@update")->name('update-purchase');
        Route::get('/delete/{id}', "PurchaseController@destroy")->name('delete-purchase');
    });

    Route::group(['prefix' => 'sell'], function () {
        Route::get('/', "SellController@index")->name('sell');
        Route::get('/add', "SellController@create")->name('add-sell');
        Route::post('/add', "SellController@store")->name('store-sell');
        Route::get('/edit/{id}', "SellController@edit")->name('edit-sell');
        Route::post('/update/{id}', "SellController@update")->name('update-sell');
        Route::get('/delete/{id}', "SellController@destroy")->name('delete-sell');
    });

    Route::group(['prefix' => 'kas'], function () {
        Route::get('/', 'KasController@kas')->name('kas');
        Route::get('/add', 'KasController@addKas')->name('addKas');
        Route::post('/upload', 'KasController@uploadKas')->name('uploadKas');
        Route::get('/delete/{id}', 'KasController@delete')->name('deleteKas');
        Route::get('/edit/{id}', 'KasController@get_data_kas')->name('editKas');
        Route::post('/update/{id}', 'KasController@updateKas')->name('updateKas');
    });

    Route::group(['prefix' => 'report'],function (){
        Route::group(['prefix' => 'pembelian'],function () {
            Route::get('/', 'ReportController@reportPembelian')->name('reportPembelian');
            Route::get('/select', 'ReportController@selectPembelian')->name('selectPembelian');
        });
    });
});
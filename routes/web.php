<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/','frontendController@index');
Route::get('/mobil','frontendController@car');
Route::get('/detail-mobil/{id}','frontendController@carDetails')->name('detail');

// !!------------------frontend--------------------!!
// Route::fallback(function () {
//     abort(404);
// });
#user

Route::group(['middleware' =>['auth']], function () {
    // User needs to be authenticated to enter here.
    Route::get('/my-transaction','userController@transaksi');
    Route::get('/my-profil','userController@profil');
    Route::get('/my-invoice/{id}','userController@invoice')->name('invoice');
});
Route::group(['middleware' =>['auth','verified']], function () {
    // User needs to be authenticated to enter here.
    Route::post('/stepTwo','transaksiController@stepTwo')->name('stepTwo');
    Route::get('/cek-pesanan','transaksiController@stepTwos')->name('stepTwos');
    Route::get('/batal','transaksiController@cancel')->name('cancel');
    // Route::patch('/change-profil','transaksiController@change')->name('change');
    Route::post('/stepThree','transaksiController@step3')->name('stepThree');
    Route::post('/stepFour','transaksiController@step4')->name('stepFour');
});
// ----------backend---------------------------------
// Auth::routes(['verify' => true]);
Auth::routes();

Route::group(['middleware' =>['auth','verified','role:admin']], function () {
    //
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profil-admin','HomeController@profil');
    //-----------------------------------------------------------------------
    Route::get('/tipe-mobil','tipeController@index');
    Route::get('/tipe-mobil/create','tipeController@create');
    Route::post('/tipe-mobil/store','tipeController@store');
    Route::get('/tipe-mobil/edit/{id}','tipeController@edit');
    Route::patch('/tipe-mobil/update/{id}','tipeController@update');
    Route::delete('/tipe-mobil/destroy/{id}','tipeController@delete');
    // -----------------------------------------------------------------------
    Route::get('/data-mobil','carController@index');
    Route::get('/data-mobil/create','carController@create');
    Route::post('/data-mobil/store','carController@store');
    Route::get('/data-mobil/edit/{id}','carController@edit');
    Route::patch('/data-mobil/update/{id}','carController@update');
    Route::delete('/data-mobil/destroy/{id}','carController@destroy');
    //------------------------------------------------------------------------
    Route::get('/fitur-mobil','fiturMobilController@index');
    Route::get('/fitur-mobil/create','fiturMobilController@create');
    Route::post('/fitur-mobil/store','fiturMobilController@store');
    Route::get('/fitur-mobil/edit/{id}','fiturMobilController@edit');
    Route::patch('/fitur-mobil/update/{id}','fiturMobilController@update');
    Route::delete('/fitur-mobil/destroy/{id}','fiturMobilController@destroy');
    // /----------------------------------------------------------------------
    Route::get('/user-admin','userAdminController@index');
    Route::patch('/user-admin/updatePassword','userAdminController@editPassword');
    Route::patch('/user-admin/updatenama','userAdminController@editNama');
    // ----------------------------------------------------------------------
    Route::get('/user-biasa','userBiasaController@index');
    Route::get('/user-biasa/details/{id}','userBiasaController@details');
    Route::delete('/user-biasa/destroy/{id}','userBiasaController@destroy');
    //----------------------------------------------------------------------
    Route::get('/sosial-media','sosialMediaController@index');
    Route::get('/sosial-media/create','sosialMediaController@create');
    Route::post('/sosial-media/store','sosialMediaController@store');
    Route::get('/sosial-media/edit/{id}','sosialMediaController@edit');
    Route::patch('/sosial-media/update/{id}','sosialMediaController@update');
    Route::delete('/sosial-media/destroy/{id}','sosialMediaController@destroy');
    // -------------------------------------------------------------------------
    Route::get('/setting', 'settingController@index');
    Route::post('/setting/update/','settingController@store')->name('YNTKTS');

    Route::get('/bank-payment','bankController@index');
    Route::get('/bank-payment/create','bankController@create');
    Route::post('/bank-payment/store','bankController@store');
    Route::get('/bank-payment/edit/{id}','bankController@edit');
    Route::patch('/bank-payment/update/{id}','bankController@update');
    Route::delete('/bank-payment/destroy/{id}','bankController@destroy');
    // --------------------------------------------------------------------------
});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','frontendController@index');
Route::get('/mobil','frontendController@car');
Route::get('/detail-mobil','frontendController@carDetails')->name('detail');
Route::get('/stepOne','frontendController@stepOne')->name('stepOne');
Route::get('/stepTwo','frontendController@stepTwo')->name('stepTwo');
Route::get('/stepThree','frontendController@step3')->name('stepThree');

// !!------------------frontend--------------------!!
// ----------backend---------------------------------
Auth::routes(['verify' => true,'register' => false]);

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
    //----------------------------------------------------------------------
    Route::get('/sosial-media','sosialMediaController@index');
    Route::get('/sosial-media/create','sosialMediaController@create');
    Route::post('/sosial-media/store','sosialMediaController@store');
    Route::get('/sosial-media/edit/{id}','sosialMediaController@edit');
    Route::patch('/sosial-media/update/{id}','sosialMediaController@update');
    Route::delete('/sosial-media/destroy/{id}','sosialMediaController@destroy');
    // -------------------------------------------------------------------------
    Route::get('/bank-payment','bankController@index');
    Route::get('/bank-payment/create','bankController@create');
    Route::post('/bank-payment/store','bankController@store');
    Route::get('/bank-payment/edit/{id}','bankController@edit');
    Route::patch('/bank-payment/update/{id}','bankController@update');
    Route::delete('/bank-payment/destroy/{id}','bankControleer@destroy');
    // --------------------------------------------------------------------------
    Route::get('/setting', 'settingController@index');
    Route::patch('/setting/update/','settingController@edit');
});

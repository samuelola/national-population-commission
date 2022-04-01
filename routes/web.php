<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addcitizen', 'CitizenController@AddCitizen')->name('addcitizen');

Route::get('get-lgas', 'CitizenController@getLgas')->name('getLgas');

Route::get('get-wards', 'CitizenController@getWards')->name('getWards');

Route::post('mycitizen', 'CitizenController@mycitizen')->name('mycitizen');
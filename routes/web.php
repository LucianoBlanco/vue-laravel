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
     return view('welcome');
});

Auth::routes();

Route::resource('/producto', 'ProductController')->middleware('auth');
Route::resource('/provider', 'ProviderController')->middleware('auth');
Route::resource('/client', 'ClientController')->middleware('auth');
Route::resource('/sale', 'SaleController')->middleware('auth');
Route::resource('/stock', 'StockController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
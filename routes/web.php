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

Route::get('/', 'App\Http\Controllers\MenuController@home')->name('home');
Route::get('/browsing', 'App\Http\Controllers\MenuController@browsing')->name('browsing');
Route::get('/searching', 'App\Http\Controllers\MenuController@searching')->name('searching');


Route::get('/merekskincare', 'App\Http\Controllers\MerekController@total')->name('totalmerek');
Route::get('/merekskincare/{hasilmerek}', 'App\Http\Controllers\MerekController@show')->name('merekshow');

Route::get('/jenisskincare', 'App\Http\Controllers\JenisController@total')->name('totaljenis');
Route::get('/jenisskincare/{hasiljenis}', 'App\Http\Controllers\JenisController@show')->name('jenisshow');

Route::get('/tipekulit', 'App\Http\Controllers\TKController@total')->name('totaltipekulit');
Route::get('/tipekulit/{hasiltipekulit}', 'App\Http\Controllers\TKController@show')->name('tipekulitshow');

Route::get('/waktupenggunaan', 'App\Http\Controllers\WPController@total')->name('totalwp');
Route::get('/waktupenggunaan/{hasilwaktupenggunaan}', 'App\Http\Controllers\WPController@show')->name('wpshow');

Route::get('/masalahkulit', 'App\Http\Controllers\MKController@total')->name('totalmk');
Route::get('/masalahkulit/{hasilmasalahkulit}', 'App\Http\Controllers\MKController@show')->name('mkshow');

Route::get('/usia', 'App\Http\Controllers\UsiaController@total')->name('totalusia');
Route::get('/usia/{hasilusia}', 'App\Http\Controllers\UsiaController@show')->name('usiashow');

Route::get('/produk', 'App\Http\Controllers\SkincareController@show')->name('produkshow');
Route::get('/produk/{idskincare}', 'App\Http\Controllers\SkincareController@detail')->name('detailproduk');

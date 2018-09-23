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

use Illuminate\Http\Request;

Route::get('/', 'MainController@show');
Route::get('/add', 'MainController@showCategory');
Route::post('/add', 'MainController@add');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

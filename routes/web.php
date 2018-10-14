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

//Cliens side
Route::get('/', 'MainController@show');
Route::get('/add', 'MainController@showCategory');
Route::post('/add', 'MainController@addQuestion');

//Admins side
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Add admin
Route::get('/addadmin', 'HomeController@newAdmin');
Route::post('/addadmin', 'HomeController@addAdmin');

//Change password

Route::post('/home', 'HomeController@changePassword');


//todo как сделать роут на на другой метод контроллера при том же URL
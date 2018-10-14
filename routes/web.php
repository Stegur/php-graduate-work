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

//Home
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admins
Route::get('/admins/', 'AdminsController@index');

Route::get('/addadmin', 'HomeController@newAdmin');
Route::post('/addadmin', 'HomeController@addAdmin');/////////////////////////////

Route::post('/home', 'HomeController@changePassword');///////////////////////////

//Questions
Route::get('/questions/', 'QuestionsController@index');


//Subjects
Route::get('/subjects/', 'SubjectsController@index');

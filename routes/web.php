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

// Cliens side
Route::get('/', 'MainController@show');
Route::get('/add', 'MainController@showCategory');
Route::post('/add', 'MainController@addQuestion');

// Home
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admins
Route::get('/admins', 'AdminsController@index');

Route::get('/admins/addadmin', 'AdminsController@newAdmin')->name('addadmin');
Route::post('/addadmin', 'AdminsController@addAdmin');

Route::post('/admins/adminchangepass', 'AdminsController@adminChangePass')->name('adminChangePass');

Route::get('/admins/deladmin', 'AdminsController@delAdmin')->name('delAdmin');

// Questions
Route::get('/questions', 'QuestionsController@index');

Route::get('/questions/isVisible', 'QuestionsController@isVisible')->name('isVisible');
Route::get('/questions/delQuestion', 'QuestionsController@delQuestion')->name('delQuestion');

Route::get('/questions/editquestion', 'QuestionsController@editQuestion')->name('editquestion');
Route::post('/questions/updatequestion', 'QuestionsController@updatequestion')->name('updatequestion');

Route::get('/questions/withoutanswers', 'QuestionsController@withOutAnswers')->name('withOutAnswers');

// Subjects
Route::get('/subjects', 'SubjectsController@index')->name('subjects');

Route::get('/subjects/addsubject', 'SubjectsController@newSubject')->name('addSubject');
Route::post('/subjects/addsubject', 'SubjectsController@addSubject');

Route::get('/subjects/delsubject', 'SubjectsController@delSubject')->name('delSubject');

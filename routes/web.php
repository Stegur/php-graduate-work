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

//Route::get('/', function () {
//   $questions = App\Question::all();
//   $answers = App\Answer::all();
//   $subjects = App\Subject::all();
//   return view('index', compact('subjects', compact('questions')));
//});

Route::get('/', 'MainController@show');
//Route::get('/', 'QuestionsController@show');
//Route::get('/', 'AnswersController@show');
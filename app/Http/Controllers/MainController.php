<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Question;
use App\Answer;

class MainController extends Controller
{
    public function show() {
        $subjects = Subject::all();
        $questions = Question::all();
        $answers = Answer::all();
        return view('index')->with('questions', $questions)->with('answers', $answers)->with('subjects', $subjects);
    }
}

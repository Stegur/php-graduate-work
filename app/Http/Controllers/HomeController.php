<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all();
        $subjects = Subject::all();
        $questions = Question::all();
        return view('home', [
            'admins' => $admins,
            'subjects' => $subjects,
            'questions' => $questions
        ]);
    }
    
//    public static function seeAdmins() {
//        $admins = User::all();
//        return $admins;
////        return view('/home')->with('admins', $admins);
//    }
}

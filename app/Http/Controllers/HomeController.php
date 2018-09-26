<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Question;
use Validator;

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
    
    public function newAdmin() {
    
        return view('/addadmin');
    }
    
    public function addAdmin(Request $request) {
    
        $validatior = Validator::make($request->all(), [
           'login' => 'required|max:50',
           'email' => 'required',
           'password' => 'required|min:6'
        ]);
        
        if ($validatior->fails()) {
            return redirect('addadmin')
                ->withInput()
                ->withErrors($validatior);
        }
//        todo как отлавливать ошибки при создании нового администратора, email существует
        
        $admin = new User();
        $admin->name = $request->login;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

//       todo $newAdminSuccess = 'Вы успешно добавили нового администратора';
        
        return redirect('/home');
    }
}

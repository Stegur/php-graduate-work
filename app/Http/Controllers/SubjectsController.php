<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('/subjects/index', [
            'subjects' => $subjects
        ]);
    }
    
    public function newSubject() // Страница добавления нового адинистратора
    {
        
        return view('/subjects/addSubject');
    }
    
    public function addSubject(Request $request) // Добавление нового администратора
    {
        
        $subject = new Subject();
        $subject->body = $request->body;
        $subject->save();

//       todo $newSubjectSuccess = 'Вы успешно добавили новую тему';
        
        return redirect('/subjects');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Question;
use Validator;

class MainController extends Controller
{
    public function show()
    {
        //  Запрос всех тем из БД для меню тем

        $subjects = Subject::all();

        // Выборка всех вопросов с ответами и видимостью

        $questions = Question::select('q.subject_id', 'q.question', 'q.answer', 's.body as subject')
            ->from('questions as q')
            ->join('subjects as s', 'q.subject_id', '=', 's.id')
            ->where('q.answer', '<>', 'null')
            ->where('q.is_visible', '=', 1)
            ->get();

        $questionArray = [];
        foreach ($questions as $question) {
            $questionArray[$question->subject]['id'] = $question->subject_id;
            $questionArray[$question->subject]['question'][] = $question;
        }
        return view('index')->with('questions', $questionArray)->with('subjects', $subjects);
    }

//    Выборка всх тем для отображения при добалении нового вопроса

    public function showCategory()
    {
        $subjects = Subject::all();
        return view('/add')->with('subjects', $subjects);
    }

//    Добавление нового вопроса

    public function addQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|max:50',
            'email' => 'required',
            'question' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('add')
                ->withInput()
                ->withErrors($validator);
        }

        $question = new Question();
        $question->login = $request->login;
        $question->email = $request->email;
        $question->subject_id = $request->subject_id;
        $question->question = $request->question;
        $question->save();

        return redirect('/');
    }
}

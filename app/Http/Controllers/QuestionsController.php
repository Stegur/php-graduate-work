<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = DB::table('questions as q')
            ->join('subjects as s', 's.id', '=', 'q.subject_id')
            ->select('q.question as question', 's.body as body', 'q.is_visible as is_visible', 'q.answer as answer','q.created_at as date', 'q.id as id')
            ->orderBy('q.subject_id')
            ->get();

        return view('/questions/index', ['questions' => $questions]);
    }

    // делаем вопрос видимым
    public function isVisible(Request $request)
    {
        $isVisible = $request->is_visible ? 0 : 1;
        DB::table('questions')
            ->where('id', $request->id)
            ->update(['is_visible' => $isVisible]);

        return redirect('/questions');
    }

    // удаляем вопрос
    public function delQuestion(Request $request)
    {
        DB::table('questions')
            ->where('id', $request->id)
            ->delete();

        return redirect('/questions');
    }

    // вопросы для редактирования
    public function editQuestion(Request $request)
    {
        $questions = DB::table('questions as q')
            ->join('subjects as s', 's.id', '=', 'q.subject_id')
            ->select('q.question as question', 's.body as body', 'q.is_visible as is_visible', 'q.answer as answer', 'q.login as login', 'q.created_at as date', 'q.id as id')
            ->where('q.id',  $request->id)
            ->get();

        $subjects = DB::table('subjects as s')
            ->select('s.id', 's.body as body')
            ->get();

        return view('/questions/editquestion', ['questions' => $questions, 'subjects' => $subjects]);
    }

    // редактируем вопросы
    public function updatequestion(Request $request)
    {
        $question = $request->input('question');
        $subject = $request->input('subject');
        $answer = $request->input('answer');
        $is_visible = $request->input('is_visible') ? 1 : 0;
        $login = $request->input('login');
        $id = $request->input('id');

        DB::table('questions')
            ->where('id', $id)
            ->update(
                [
                    'question' => $question,
                    'subject_id' => $subject,
                    'answer' => $answer,
                    'is_visible' => $is_visible,
                    'login' => $login
                ]);

        return redirect('/questions');
    }

    // делаем подборку вопросов без ответов
    public function withOutAnswers()
    {
        $questions = DB::table('questions as q')
            ->join('subjects as s', 's.id', '=', 'q.subject_id')
            ->select('*', 'q.created_at as date', 'q.id as id')
            ->whereNull('q.answer')
            ->orderBy('q.created_at')
            ->get();

        $subjects = DB::table('subjects as s')
            ->select('s.id', 's.body as body')
            ->get();

        return view('/questions/withoutanswers', ['questions' => $questions, 'subjects' => $subjects]);
    }

}

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
            ->select('*', 'q.created_at as date', 'q.id as id')
            ->orderBy('q.subject_id')
            ->get();

        return view('/questions/index', ['questions' => $questions]);
    }

    public function isVisible(Request $request)
    {
        $isVisible = $request->is_visible ? 0 : 1;
        DB::table('questions')
            ->where('id', '=', $request->id)
            ->update(['is_visible' => $isVisible]);

        return redirect('/questions');
    }

    public function delQuestion(Request $request)
    {
        DB::table('questions')
            ->where('id', '=', $request->id)
            ->delete();

        return redirect('/questions');
    }

    public function editQuestion(Request $request)
    {
        $questions = DB::table('questions as q')
            ->join('subjects as s', 's.id', '=', 'q.subject_id')
            ->select('*', 'q.created_at as date', 'q.id as id')
            ->where('q.id', '=', $request->id)
            ->get();

        $subjects = DB::table('subjects as s')
            ->select('s.id', 's.body as body')
            ->get();

        return view('/questions/editquestion', ['questions' => $questions, 'subjects' => $subjects]);
    }

    public function updatequestion(Request $request)
    {

        dd($request);
    }

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

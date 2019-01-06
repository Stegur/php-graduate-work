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
        //dd($questions);
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use Illuminate\Support\Facades\DB;


class SubjectsController extends Controller
{
    public function index()
    {
        $subjectsAll = DB::table('subjects as s')
            ->join('questions as q', 'q.subject_id', '=', 's.id')
            ->select('s.body', DB::raw('count(*) as count'))
            ->groupBy('s.body')
            ->get();

        $subjectsWithoutHidden = DB::table('subjects as s')
            ->join('questions as q', 'q.subject_id', '=', 's.id')
            ->select('s.body', DB::raw('count(*) as count'))
            ->where('q.is_visible', '=', '1')
            ->groupBy('s.body')
            ->get();

        $subjectsWithoutAnswer = DB::table('subjects as s')
            ->join('questions as q', 'q.subject_id', '=', 's.id')
            ->select('s.body', DB::raw('count(*) as count'))
            ->whereNull('q.answer')
            ->groupBy('s.body')
            ->get();

        $subjectsIds = DB::table('subjects as s')
            ->select('s.id', 's.body')
            ->get();


        $subjects = [];

        foreach ($subjectsIds as $key => $item) {
            $subjects[$item->body]['id'] = $item->id;
            $subjects[$item->body]['all'] = 0;
            $subjects[$item->body]['allWithoutHidden'] = 0;
            $subjects[$item->body]['allWithoutAnswer'] = 0;
        }

        foreach ($subjectsAll as $key => $item) {
            $subjects[$item->body]['all'] = $item->count;
        }

        foreach ($subjectsWithoutHidden as $key => $item) {
            $subjects[$item->body]['allWithoutHidden'] = $item->count;
        }

        foreach ($subjectsWithoutAnswer as $key => $item) {
            $subjects[$item->body]['allWithoutAnswer'] = $item->count;
        }

        return view('/subjects/index', [
            'subjects' => $subjects
        ]);
    }

    // Страница добавления новой темы
    public function newSubject()
    {

        return view('/subjects/addsubject');
    }

    // Добавление новой темы
    public function addSubject(Request $request)
    {

        $subject = new Subject();
        $subject->body = $request->body;
        $subject->save();

        return redirect('/subjects');
    }

    // Удаление темы с вопросами
    public function delSubject(Request $request)
    {
        DB::table('subjects')
            ->where('id', $request->id)
            ->delete();

        DB::table('questions')
            ->where('subject_id', $request->id)
            ->delete();

        return redirect('/subjects/');

    }
}

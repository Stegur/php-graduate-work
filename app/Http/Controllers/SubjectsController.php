<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use Illuminate\Support\Facades\DB;


class SubjectsController extends Controller
{
    public function index()
    {
        //$subjects = Subject::all();

        //$subjects = Subject::select()->count();

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

        $subjects = [];
        foreach ($subjectsAll as $key => $item){
            $subjects[$item->body]['all'] = $item->count;
        }

        foreach ($subjectsWithoutHidden as $key => $item){
            $subjects[$item->body]['allWithoutHidden'] = $item->count;
        }

        foreach ($subjectsWithoutAnswer as $key => $item){
            $subjects[$item->body]['allWithoutAnswer'] = $item->count;
        }




     //   dd($subjects);

        return view('/subjects/index', [
            'subjects' => $subjects
        ]);
    }

    public function newSubject() // Страница добавления новой темы
    {

        return view('/subjects/addSubject');
    }

    public function addSubject(Request $request) // Добавление новой темы
    {

        $subject = new Subject();
        $subject->body = $request->body;
        $subject->save();

//       todo $newSubjectSuccess = 'Вы успешно добавили новую тему';

        return redirect('/subjects');
    }
}

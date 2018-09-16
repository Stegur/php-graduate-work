@extends('layout')

@section('title')
    <title>Вопросы и ответы</title>
@endsection


@section('content')
    <div class="header">
        <h1 class="text-center m-3 text-primary">Questions & Answers</h1>
        <a href="{{ url('add') }}" class="nav-link bg-primary text-white float-right mb-3">Задать вопрос</a>
    </div>
    {{--todo Сделать сообщение после добавлнеия нового вопроса--}}
    {{--@if($done)--}}

    {{--<div class="alert-primary">--}}
    {{--{{ $done }}--}}
    {{--</div>--}}

    {{--@endif--}}

    <table class="table">
        <tr class="row">
            <td class="col-3">
                <ul class="list-group position-fixed">

                    <li class="list-group-item d-flex justify-content-between align-items-center bg-primary text-white">
                        Категории:
                    </li>
                    @foreach($subjects as $subject)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="#{{ $subject->id }}">{{ $subject->body }}</a>
                            <span class="ml-2 badge badge-primary badge-pill">{{ $subject->id }}</span>
                        </li>
                    @endforeach
                </ul>
            </td>

            <td class="col-9">
                @foreach($questions as $subject => $rows)

                    <div class="card-header text-center" id="">{{ $subject }}</div>

                    @foreach($rows as $question => $answer)
                        <details class="list-group-item bg-primary text-white text-justify">
                            <summary>{{ $question }}</summary>
                            <p class="bg-light text-dark p-3">{{ $answer }}</p>
                        </details>
                    @endforeach
                    <div class="m-5"></div>
                @endforeach
            </td>
        </tr>
    </table>
@endsection
@extends('layout')

@section('title')
    <title>Вопросы и ответы</title>
@endsection


@section('content')
    <div class="header">
        <h1 class="text-center m-3 text-primary">Questions & Answers</h1>
        <a href="{{ url('add') }}" class="nav-link bg-primary text-white float-right mb-3">Задать вопрос</a>
    </div>


    <table class="table">
        <tr class="row">
            <td class="col-3">
                <ul class="list-group position-fixed">

                    <li class="list-group-item d-flex justify-content-between align-items-center bg-primary text-white">
                        Категории:
                    </li>
                    @foreach($questions as $subject => $value)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="#{{ $value['id'] }}">{{ $subject }}</a>
                            {{--<span class="ml-2 badge badge-primary badge-pill">{{ $value['id'] }}</span>--}}
                        </li>
                    @endforeach
                </ul>
            </td>

            <td class="col-9">

                @foreach($questions as $subject => $value)
                    <div class="card-header text-center" id="{{ $value['id'] }}">{{ $subject }}</div>
                    @foreach($value['question'] as $question)
                        <details class="list-group-item bg-primary text-white text-justify">
                            <summary>{{ $question->question }}</summary>
                            <p class="bg-light text-dark p-3">{{ $question->answer }}</p>
                        </details>
                    @endforeach
                    <div class="m-5"></div>
                @endforeach
            </td>
        </tr>
    </table>
@endsection
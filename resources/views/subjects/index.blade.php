@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-
    -center">
            <div class="col-md-10">


                <div class="card mt-5">
                    <div class="card-header clearfix">Темы <a class="float-right" href="{{ url('/addSubject') }}">Добавить
                            тему</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr class="row text-center">
                                <td class="col">Тема</td>
                                <td class="col">Всего вопросов</td>
                                <td class="col">Опубликованно вопросов</td>
                                <td class="col">Вопросов без ответа</td>
                            </tr>
                            @foreach($subjects as $subject)
                                <tr class="row">
                                    <td class="col">{{ $subject->body }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

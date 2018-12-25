@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-center">
            <div class="col-md-10">


                <div class="card mt-5">
                    <div class="card-header clearfix">Темы <a class="float-right" href="{{ url('/addSubject') }}">Добавить тему</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr class="row text-center">
                                <td class="col">Тема</td>
                                <td class="col">Всего вопросов</td>
                                <td class="col">Опубликованно вопросов</td>
                                <td class="col">Вопросов без ответа</td>
                            </tr>
                            @foreach($subjects as $name => $count)
                                <tr class="row text-center">
                                    <td class="col">{{ $name }}</td>
                                    <td class="col">{{ $count['all']}}</td>
                                    <td class="col">{{ $count['allWithoutHidden'] }}</td>
                                    @if(isset($count['allWithoutAnswer'])) {
                                    <td class="col">{{ $count['allWithoutAnswer'] }}</td>
                                    } @else {
                                    <td class="col">0</td>
                                    }
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

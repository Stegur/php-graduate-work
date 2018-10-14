@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-
    -center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header clearfix">Администраторы
                        <a class="float-right" href="{{ url('/addadmin') }}">Добавить администратора</a>
                    </div>

                    <div class="card-body">
                        <table class="table">


                            <tr class="row">
                                <td class="col-4">Логин</td>
                                <td class="col-4">email</td>
                                <td class="col-4">Пароль</td>
                            </tr>
                            @foreach($admins as $admin)
                                <tr class="row">
                                    <td class="col-4">{{ $admin->name }}</td>
                                    <td class="col-4">{{ $admin->email }}</td>
                                    <td class="col-4">
                                        <form action="{{ url('/home', ['id' => $admin->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="password" class="" name="newAdminPass">
                                            <button class="btn btn-secondary mt-1">Обновить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header clearfix">Темы <a class="float-right" href="{{ url('/addsubject') }}">Добавить
                            тему</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr class="row">
                                <td class="col">Тема</td>
                            </tr>
                            @foreach($subjects as $subject)
                                <tr class="row">
                                    <td class="col">{{ $subject->body }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card mt-5">
                    {{--todo сделать подсчет вопросов без ответа--}}
                    <div class="card-header clearfix">Вопросы <a class="float-right" href="{{ url('/answers') }}">Вопросы
                            без ответа</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr class="row">
                                <td class="col-5">Вопрос</td>
                                <td class="col">Ответ</td>
                                <td class="col">Видимый</td>
                                <td class="col">Автор</td>
                            </tr>
                            @foreach($questions as $question)
                                <tr class="row">
                                    <td class="col-5">{{ $question->question }}</td>
                                    <td class="col">{{ $question->answer }}</td>
                                    <td class="col">{{ ($question->is_visible > 0) ? 'Да' : 'Нет' }}</td>
                                    <td class="col">{{ $question->login }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

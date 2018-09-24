@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-
    -center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Администраторы</div>

                    <div class="card-body">
                        <table class="table">
                            <tr class="row">
                                <td class="col-2">Логин</td>
                                <td class="col-5">email</td>
                                <td class="col-3">Пароль</td>
                                <td class="col-2">Функции</td>
                            </tr>
                            @foreach($admins as $admin)
                                <tr class="row">
                                    <td class="col-2">{{ $admin->name }}</td>
                                    <td class="col-5">{{ $admin->email }}</td>
                                    <td class="col-3"></td>
                                    <td class="col-2"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">Темы</div>

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
                    <div class="card-header">Вопросы</div>

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

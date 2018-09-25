@extends('layout')

@section('title')
    <title>Задать вопрос</title>
@endsection


@section('content')
    <div class="card-body">
        @include('errors')
    </div>
    <div class="clearfix">
        <a class="nav-link bg-primary text-white float-right" href="{{ url('/') }}">Вернуться к вопросам</a>
    </div>

    <form action="{{ url('add') }}" method="post" class="mt-5">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="login">Введите логин</label>
            <input name="login" type="text" class="form-control" id="login">
        </div>

        <div class="form-group">
            <label for="email">Введите e-mail</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
            <small>Мы не будем делать рассылку</small>
        </div>

        <div class="form-group">
            <label for="subject">Выберите категорию</label>
            <select name="subject_id" class="form-control" id="subject">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->body }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="textarea">Введите вовпрос</label>
            <textarea name="question" class="form-control" id="textarea" cols="30" rows="5"></textarea>
        </div>
        <button class="btn btn-primary">Задать</button>

    </form>
@endsection
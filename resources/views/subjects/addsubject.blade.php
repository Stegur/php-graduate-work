@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="clearfix">
            <a class="nav-link bg-secondary text-white float-right" href="{{ route('subjects') }}">Вернуться к темам</a>
        </div>

        <form action="{{ route('addSubject') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="login">Введите название новой темы</label>
                <input type="text" name="body" class="form-control" id="login">
            </div>

            <button class="btn bg-secondary text-white">Создать тему</button>


        </form>
    </div>
@endsection
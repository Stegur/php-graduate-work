@extends('layouts.app')

@section('content')
    <div class="card-body">
        @include('errors')
    </div>

    <div class="container">
        <div class="clearfix">
            <a class="nav-link bg-secondary text-white float-right" href="{{ url('/home') }}">Вернуться на главную</a>
        </div>

        @if(isset($newAdminSuccess))
            <div class="bg-success text-white text-center m-5">{{ $newAdminSuccess }}</div>
        @endif


        <form action="{{ url('addadmin') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="login">Введите Логин</label>
                <input type="text" name="login" class="form-control" id="login">
            </div>

            <div class="form-group">
                <label for="login">Введите email</label>
                <input type="email" name="email" class="form-control" id="login">
            </div>

            <div class="form-group">
                <label for="login">Введите Пароль</label>
                <input type="password" name="password" class="form-control" id="login">
            </div>

            <button class="btn bg-secondary text-white">Создать</button>


        </form>
    </div>
@endsection
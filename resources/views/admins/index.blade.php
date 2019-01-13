@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header clearfix">Администраторы
                        <a class="float-right" href="{{ route('addadmin') }}">Добавить администратора</a>
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
                                    <td class="col-4">{{ $admin->name }} <sup><a href="{{ route('delAdmin', ['id' => $admin->id]) }}">удалить</a></sup></td>
                                    <td class="col-4">{{ $admin->email }}</td>
                                    <td class="col-4">
                                        <form action="{{ route('adminChangePass', ['id' => $admin->id]) }}"
                                              method="post">
                                            {{ csrf_field() }}
                                            <input type="password" class="form-control" name="newAdminPass">
                                            <button class="btn btn-secondary mt-1">Обновить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-
    -center">
            <div class="col-md-10  d-flex">


                <div class="card mt-5 ">
                    <div class="card-header ">
                        <p>Управление администраторами</p>
                    </div>
                    <div class="card-body">
                        <a class="btn" href="{{ url('/admins/') }}">Перейти</a>
                    </div>
                </div>

                <div class="card mt-5 ml-5 mr-5">
                    <div class="card-header ">
                        <p>Управление Темами</p>
                    </div>
                    <div class="card-body">
                        <a class="btn" href="{{ url('/subjects/') }}">Перейти</a>
                    </div>
                </div>

                <div class="card mt-5 ">
                    <div class="card-header ">
                        <p>Управление Вопросами</p>
                    </div>
                    <div class="card-body">
                        <a class="btn" href="{{ url('/questions/') }}">Перейти</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

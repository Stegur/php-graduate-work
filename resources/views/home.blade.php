@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 d-flex m-auto justify-content-center">


            <div class="card mt-5 text-center">
                <div class="card-header">
                    <p>
                        Управление
                        администраторами</p>
                </div>
                <div class="card-body">
                    <a class="btn btn-secondary"
                       href="{{ url('/admins/') }}">Перейти</a>
                </div>
            </div>

            <div class="card mt-5 ml-5 mr-5 text-center">
                <div class="card-header">
                    <p>
                        Управление
                        темами</p>
                </div>
                <div class="card-body">
                    <a class="btn btn-secondary"
                       href="{{ url('/subjects/') }}">Перейти</a>
                </div>
            </div>

            <div class="card mt-5 text-center">
                <div class="card-header">
                    <p>
                        Управление
                        вопросами</p>
                </div>
                <div class="card-body">
                    <a class="btn btn-secondary"
                       href="{{ url('/questions/') }}">Перейти</a>
                </div>
            </div>

        </div>
    </div>
@endsection

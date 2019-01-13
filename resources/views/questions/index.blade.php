@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-center">
            <div class="col-md-12">


                <div class="card mt-5">
                    <div class="card-header clearfix">
                        Вопросы
                        <a class="float-right"
                           href="{{ route('withOutAnswers') }}">Вопросы
                            без
                            ответа</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr class="row">
                                <td class="col-5">
                                    Вопрос
                                </td>
                                <td class="col">
                                    Тема
                                </td>
                                <td class="col">
                                    Статус
                                </td>
                                <td class="col">
                                    Дата
                                </td>
                                <td class="col">

                                </td>
                            </tr>
                            @foreach($questions as $question)
                                <tr class="row">
                                    <td class="col-5">{{ $question->question }}
                                        <sup><a href="{{ route('delQuestion', ['id' => $question->id]) }}">удалить</a></sup>
                                    </td>
                                    <td class="col">{{ $question->body }}
                                    </td>
                                    @if($question->is_visible < 1)
                                        <td class="col bg-light">
                                            скрыт
                                            <sup><a href="{{ route('isVisible', [ 'id' => $question->id, 'is_visible' => $question->is_visible]) }}">показать</a></sup>
                                        </td>
                                    @elseif(is_null($question->answer))
                                        <td class="col bg-warning">
                                            ожидает
                                            ответа
                                            <sup><a href="{{ route('editquestion', ['id' => $question->id]) }}">
                                                    ответить</a></sup>
                                        </td>
                                    @else
                                        <td class="col">
                                            опубликован
                                            <sup><a href="{{ route('isVisible', [ 'id' => $question->id, 'is_visible' => $question->is_visible]) }}">скрыть</a></sup>
                                        </td>
                                    @endif
                                    <td class="col">{{ $question->date }}</td>
                                    <td class="col small">
                                        <a href="{{ route('editquestion', ['id' => $question->id]) }}">Редактировать
                                            вопрос</a>
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
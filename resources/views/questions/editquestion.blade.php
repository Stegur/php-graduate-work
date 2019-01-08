@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-center">
            <div class="col-md-12">


                <div class="card mt-5">
                    {{--todo сделать подсчет вопросов без ответа--}}
                    <div class="card-header clearfix">
                        Вопросы
                        <a class="float-right"
                           href="{{ url('/questions') }}">Вернуться
                            ко
                            всем
                            вопросам</a>
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
                                    Ответ
                                </td>
                                <td class="col">
                                    Видимость
                                </td>
                                <td class="col">
                                    Автор
                                </td>
                                <td class="col">
                                    Дата
                                </td>
                            </tr>
                            @foreach($questions as $question)
                                <tr class="row">
                                    <td class="col-5">{{ $question->question }}
                                    </td>
                                    <td class="col">{{ $question->body }}
                                    </td>
                                    <td class="col">{{ $question->answer }}
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
                                            <sup><a href="#">ответить</a></sup>
                                        </td>
                                    @else
                                        <td class="col">
                                            опубликован
                                        </td>
                                    @endif
                                    <td class="col">{{ $question->login }}</td>
                                    <td class="col">{{ $question->date}}</td>
                                </tr>

                                <form action="#"
                                      method="post"
                                      class="form-inline">
                                    {{ csrf_field() }}
                                    <tr class="row">
                                        <td class="col-5"><textarea
                                                    class="form-control"
                                                    rows="3"
                                                    cols="55"
                                                    name="question">{{ $question->question }}</textarea>
                                        </td>

                                        <td class="col">
                                            <select class="form-control"
                                                    name="subject">
                                                @foreach($subjects as $subject)
                                                    @if($subject->body == $question->body )
                                                        <option selected>{{ $subject->body }}</option>
                                                    @endif
                                                    <option>{{ $subject->body }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="col">
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $question->answer }}"
                                                   name="answer">
                                        </td>
                                        <td class="col">
                                            <input type="checkbox"
                                                   class="form-control"
                                                   name="visible">
                                        </td>
                                        <td class="col">
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $question->login }}"
                                                   name="login">
                                        </td>
                                        <td class="col">
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $question->date}}"
                                                   name="date">
                                        </td>
                                    </tr>
                                    <tr class="row">
                                        <td class="col">
                                            <button type="submit"
                                                    class="btn btn-secondary">
                                                Изменить
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
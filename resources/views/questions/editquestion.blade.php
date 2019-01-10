@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-center">
            <div class="col-md-12">


                <div class="card mt-5">
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
                                        </td>
                                    @else
                                        <td class="col">
                                            опубликован
                                        </td>
                                    @endif
                                    <td class="col">{{ $question->login }}</td>
                                    <td class="col">{{ $question->date}}</td>
                                </tr>
                        </table>

                        <form action="{{ route('updatequestion', ['id' => $question-> id]) }}"
                              method="post"
                              class="form-inline">
                            {{ csrf_field() }}
                            <textarea
                                    class="form-control mr-3"
                                    rows="3"
                                    cols="50"
                                    name="question">{{ $question->question }}</textarea>

                            <select class="form-control mr-3"
                                    name="subject">
                                @foreach($subjects as $subject)
                                    @if($subject->body == $question->body )
                                        <option value="{{ $subject->id }}" selected>{{ $subject->body }}</option>
                                    @endif
                                    <option value="{{ $subject->id }}">{{ $subject->body }}</option>
                                @endforeach
                            </select>
                            <input type="text"
                                   class="form-control mr-3"
                                   value="{{ $question->answer }}"
                                   name="answer">
                            <input type="checkbox"
                                   class="form-control mr-3"
                                   name="is_visible">
                            <input type="text"
                                   class="form-control mr-3"
                                   value="{{ $question->login }}"
                                   name="login">
                            <button type="submit"
                                    class="btn btn-secondary">
                                Изменить
                            </button>
                        </form>

                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
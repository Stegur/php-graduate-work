<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <ul class="list-group">

        <li class="list-group-item d-flex justify-content-between align-items-center">Категории:</li>
        @foreach($subjects as $subject)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $subject->body }}
                <span class="badge badge-primary badge-pill">0</span>
            </li>
        @endforeach

    </ul>

    <ul>
        @foreach($questions as $question)
            <li>{{ $question->body }}</li>
        @endforeach
    </ul>



    <ol>
        @foreach($answers as $answer)
            <li>{{ $answer->body }}</li>
        @endforeach
    </ol>


</div>
</body>
</html>
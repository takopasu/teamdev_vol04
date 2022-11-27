<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>イベント詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $event->event_name }}
        </h1>
        <div class="content">
            <div class="date">
                <h3>日時</h3>
                <p>{{$event->start_date}}</p>
            </div>
            <div class="time">
                <h3>時刻</h3>
                <p>{{ $event->start_time }} ～ {{$event->end_time}}</p>
            </div>
            <div class="target">
                <h3>対象者</h3>
                <p>{{ $event->enter_month}}</p>
            </div>
            <div class="book_link">
                <h3><a href="{{ $event->book_link}}">予約はこちら</a></h3>
            </div>
            <div class="handout_link">
                <h3><a href="{{ $event->handout_link}}">資料はこちら</a></h3>
            </div>
        </div>
        <div class="edit"><a href="/events/{{ $event->id }}/edit">edit</a></div>
        <form action="/events/{{ $event->id }}/delete" id="form_{{ $event->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $event->id }})">delete</button>
        </form>
        <div class="footer">
            <a href="/mentor_calendar">戻る</a>
        </div>
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
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
                @if({{ $event->start_date }} == {{$event->end_date}})
                    <p>{{{{$event->start_date}}}}</p>
                @else
                    <p>{{ $event->start_date }} ～ {{$event->end_date}}</p>    
                @endif
            </div>
            <div class="time">
                <h3>時刻</h3>
                <p>{{ $event->start_time }} ～ {{$event->end_time}}</p>    
            </div>
            <div class="target">
                <h3>対象者</h3>
                <p>{{ $event->enter_month}}</p>    
            </div>
            @if({{$event -> book_link}} != null)
            <div class="book_link">
                <h3><a href="{{ $event->book_link}}">予約はこちら</a></h3>
            </div>
            @endif
            @if({{ $event->handout_link}} != null)
            <div class="handout_link">
                <h3><a href="{{ $event->handout_link}}">資料はこちら</a></h3>
            </div>
            @endif
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
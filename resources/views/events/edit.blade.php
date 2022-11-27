!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>イベント詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/events/{{ $event->id }}" method="event">
                    @csrf
                    @method('PUT')
                    <div class='content__title'>
                        <h2>イベント名</h2>
                        <input type='text' name='event[event_name]' value="{{ $event->event_name }}">
                    </div>
                    <div class='content__body'>
                        <h2>開始時刻</h2>
                        <input type='text' name='event[start_time]' value="{{ $event->start_time}}">
                    </div>
                    <div class='content__body'>
                        <h2>終了時刻</h2>
                        <input type='text' name='event[end_time]' value="{{ $event->end_time}}">
                    </div>
                    <div class='content__body'>
                        <h2>対象者</h2>
                        <input type='text' name='event[enter_month]' value="{{ $event->enter_month}}">
                    </div>
                    <div class='content__body'>
                        <h2>予約フォームのリンク</h2>
                        <input type='text' name='event[book_link]' value="{{ $event->book_link}}">
                    </div>
                    <div class='content__body'>
                        <h2>資料のリンク</h2>
                        <input type='text' name='event[handout_link]' value="{{ $event->handout_link}}">
                    </div>
                    <input type="submit" value="保存">
                </form>
            </div>
        <div class="footer">
            <a href="/mentor_calendar">戻る</a>
        </div>
    </body>
</html>
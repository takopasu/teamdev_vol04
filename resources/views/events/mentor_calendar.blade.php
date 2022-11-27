<html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js']);
    </head>
    <body>
        <div class="container">
            <h1>トップページ</h1>
            @if (session('login_msg'))
                <div class="alert alert-success">
                    {{ session('login_msg') }}
                </div>
            @endif
            @if (Auth::guard('students')->check())
                <div>ユーザーID {{ Auth::guard('students')->user()->userid }}でログイン中</div>
            @else
                <div>ログインしていません</div>
            @endif
            <ul>
                <li>ログイン状態: {{ Auth::check() }}</li>
                <li>管理者（Mentor）ログイン状態: {{ Auth::guard('mentors')->check() }}</li>
                <li>会員（students） ログイン状態: {{ Auth::guard('students')->check() }}</li>
            </ul>
            <div>
                <a href="/admin/logout">ログアウト</a>
            </div>
            <div id='mentor_calendar'></div>
        </div>
    </body>
</html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>生徒ログイン</h1>
    @error('login')
    <div class="alert alert-danger">
        &#x26A0; {{ $message }}
    </div>
    @enderror
    <form method="POST" action="/student_calendar">
      @csrf
      <label class="mt-3">メールアドレス</label>
      <input type="text" name="email" class="form-control" placeholder="levcale2022@gmail.com">
      <label class="mt-3">パスワード</label>
      <input class="form-control" type="password" name="password" placeholder="パスワードを入力">
      <button class="btn btn-primary mt-5" type="submit">ログイン</button>
      <a href="/register">登録がまだの方はこちら</a>
      <a href="/admin_index">メンターの方はこちら</a>
    </form>
  </div>
</body>
</html>
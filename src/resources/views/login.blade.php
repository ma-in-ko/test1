<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users-login | FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/index.css') }}">
</head>
<body>
    <!--ヘッダー-->
    <header class="header">
        <h1 class="header__title">Fashionably Late</h1>
        <a href="/login" class="header-register">register</a>
    </header>

    <!--メイン-->
    <main class="main">
        <h2 class="main__title">Login</h2>

        <div class="form_wrapper">
            <form action="/login" method="post">
                @csrf
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value= "{{old('email')}}" placeholder="例:test@example.com">
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
                <label for="password">パスワード</label>
                <input type="text" id="password" name="password" value=" {{old('password')}}" placeholder="coachtech1106">
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn">ログイン</button>
            </form>
        </div>
    </main>

</body>
</html>
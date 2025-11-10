<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>users | FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/users/index.css') }}">
</head>
<body>
  <!-- ヘッダー -->
  <header class="header">
    <h1 class="header__title">FashionablyLate</h1>
    <a href="/" class="header__login">login</a>
  </header>

  <!-- メイン -->
  <main class="main">
    <h2 class="main__title">Register</h2>

    <div class="form__wrapper">
      <form method="POST" action="/register">
        @csrf

        <label for="name">お名前</label>
        <input
          type="text"
          id="name"
          name="name"
          value="{{ old('name') }}"
          placeholder="例：山田 太郎"
        >
        @error('name')
          <p class="error">{{ $message }}</p>
        @enderror

        <label for="email">メールアドレス</label>
        <input
          type="email"
          id="email"
          name="email"
          value="{{ old('email') }}"
          placeholder="例：test@example.com"
        >
        @error('email')
          <p class="error">{{ $message }}</p>
        @enderror

        <label for="password">パスワード</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="例：coachtech1106"
        >
        @error('password')
          <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn">登録</button>
      </form>
    </div>
  </main>
</body>
</html>

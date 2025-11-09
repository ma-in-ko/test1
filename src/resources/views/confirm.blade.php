<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirm - FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">FashionablyLate</a>
    </div>
  </header>

  <main>
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>Confirm</h2>
      </div>

      <form class="form" action="/thanks" method="post">
        @csrf
        <table class="confirm-table">
          <tr>
            <th>お名前</th>
            <td>
              {{ $contact['name'] }}
              <input type="hidden" name="name" value="{{ $contact['name'] }}" >
            </td>
          </tr>
          <tr>
            <th>性別</th>
            <td>
              @switch($contact['gender'])
                @case('male')
                  男性
                  @break
                @case('female')
                  女性
                  @break
                @case('other')
                  その他
                  @break
                @default
                  未選択
              @endswitch
              <input type="hidden" name="gender" value="{{ $contact['gender'] }}" >
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>
               {{ $contact['email'] }}
              <input type="hidden" name="email" value="{{ $contact['email'] }}" >
            </td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td>
              {{ $contact['tel'] }}
              <input type="hidden" name="tel" value="{{ $contact['tel'] }}" >
            </td>
          </tr>
          <tr>
            <th>住所</th>
            <td>
              {{ $contact['address'] }}
              <input type="hidden" name="address" value="{{ $contact['address'] }}" >
            </td>
          </tr>
          <tr>
            <th>建物名</th>
            <td>
              {{ $contact['building'] }}
              <input type="hidden" name="address" value="{{ $contact['building'] }}" >
            </td>
          </tr>
          @php
            use App\Models\Category;
            $category = Category::find($contact['category_id']);
          @endphp
          <tr>
            <th>お問い合わせの種類</th>
            <td>
              {{ $category ? $category->content : '' }}
              <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" >
            </td>
          </tr>
          <tr>
            <th>お問い合わせ内容</th>
            <td>
              {{ $contact['detail'] }}
              <input type="hidden" name="content" value="{{ $contact['detail'] }}" >
            </td>
          </tr>
        </table>

        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
          <button class="form__button-edit" type="button" onclick="history.back()">修正</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>


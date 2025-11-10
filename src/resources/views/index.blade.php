<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact-FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">FashionablyLate</a>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <p>Contact</p>
            </div>

            <form class="form" action="/confirm" method="POST">
            @csrf

                <!-- お名前 -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text name-inputs">
                            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例：山田">
                            @error('last_name')
                                <p class="form__error">{{ $message }}</p>
                            @enderror
                            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例：太郎">
                            @error('first_name')
                                <p class="form__error">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- 性別 -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--radio">
                            <label><input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> 男性</label>
                            <label><input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> 女性</label>
                            <label><input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}> その他</label>
                        </div>
                        @error('gender')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- メールアドレス -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="test@example.com">
                        </div>
                        @error('email')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- 電話番号 -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text tel-inputs">
                            <input type="text" name="tel1" value="{{ old('tel1') }}" maxlength="4" placeholder="080"> -
                            <input type="text" name="tel2" value="{{ old('tel2') }}" maxlength="4" placeholder="1234"> -
                            <input type="text" name="tel3" value="{{ old('tel3') }}" maxlength="4" placeholder="5678">
                        </div>
                        <div class="form__error">
                        @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                            <p class="form__error">電話番号を正しく入力してください。</p>
                        @endif
</div>
                    </div>
                </div>

                <!-- 住所 -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" value="{{ old('address') }}" placeholder="東京都渋谷区千駄ヶ谷1-2-3">
                        </div>
                        @error('address')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- 建物名 -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building" value="{{ old('building') }}" placeholder="千駄ヶ谷マンション101">
                        </div>
                    </div>
                </div>

                <!-- お問い合わせの種類 -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--select">
                            <select name="category_id">
                                <option value="">選択してください</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('select')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- お問い合わせ内容 -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
                        </div>
                        @error('detail')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- 送信ボタン -->
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>

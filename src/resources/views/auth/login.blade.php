<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/login.css')}}"/>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                <h2>FashionablyLate</h2>
            </div>
            <div class="header__nav">
                <button>
                    <a href="/register">register</a>
                </button>
            </div>
        </div>
    </header>
</body>
<main>
    <div class ="login-form__content">
        <div class="login-form__heading">
            <h2>Login</h2>
        </div>
        <form class="form" action="/login" method="POST">
        @csrf
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" value=""/>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--title">
                    <span class="form__group--item">パスワード</span>
                </div>
                <div class="form__group--content">
                    <div class="form__group--text">
                        <input type="password" name="password" value="" />
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="login__button-submit" type="submit">login</button>
            </div>
        </form>
    </div>
</main>
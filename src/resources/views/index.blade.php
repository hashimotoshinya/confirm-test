@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}"/>
@endsection

@section('content')
<main class="contact-form__content">
    <div class="contact-form__heading">
        Contact
    </div>
    <form class="form" action="/contacts/confirm" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例:　山田" value="{{ old('last_name')}}">
                    @error('last_name')
                    {{$message}}
                    @enderror
                    <input type="text" name="first_name" placeholder="例:　太郎" value="{{ old('first_name')}}">
                    @error('first_name')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別※</span>
            </div>
            <div class="form__group-content">
                <input type="radio" name="gender" value="男性" checked>男性</input>
                <input type="radio" name="gender" value="女性">女性</input>
                <input type="radio" name="gender" value="その他">その他</input>
                @error('gender')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス※</span>
            </div>
            <div class="form__group-content">
                <input type="email" name="email" placeholder="例:　test@exsmple.com" value="{{ old('email')}}">
                @error('email')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form--groupe-title">
                <span class="form__label--item">電話番号※</span>
            </div>
            <div class="form__group-content">
                <input type="text" name="tel" placeholder="080" maxlength="4">-</input>
                <input type="text" name="tel" placeholder="1234" maxlength="4">-</input>
                <input type="text" name="tel" placeholder="5678" maxlength="4"></input>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__groupe--item">住所※</span>
            </div>
            <div class="form__group-content">
                <input type="text" name="address" placeholder="例:　東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address')}}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__groupe--item">建物名</span>
            </div>
            <div class="form__group-content">
                <input type="text" name="building" placeholder="例:　千駄ヶ谷マンション101" value="{{ old('building')}}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__group--item">お問い合わせの種類※</span>
            </div>
            <div class="form__group-content">
                <select name="category">
                    <option>選択してください</option>
                    <option>商品のお届けについて</option>
                    <option>商品の交換について</option>
                    <option>商品トラブル</option>
                    <option>ショップへのお問い合わせ</option>
                    <option>そのほか</option>
                </select>
            </div>
        </div>
        <div class="form__group">
            <div class="form__input--text">
                <span class="form__group--item">お問合せ内容</span>
            </div>
            <div class="form__group-content">
                <textarea type="text" name="inquiry" placeholder="お問合せ内容をご記入ください" value="{{ old('inquiry')}}"></textarea>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</main>
@endsection
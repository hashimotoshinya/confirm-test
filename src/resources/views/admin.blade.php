<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        @if (Auth::check())
        <div class="header__inner">
            <div class="header__logo">
                <h2>FashionablyLate</h2>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">logout</button>
            </form>
        </div>
        @endif
    </header>

    <main class="main">
        <h1 class="admin-title">Admin</h1>

        <form id="searchForm" class="search-form" action="{{route('find')}}" method="GET">
            <input type="text" name="keyword" value="{{ old('keyword', $inputs['keyword'] ?? '')}}" placeholder="名前やメールアドレスを入力してください">
            <select name="gender">
                <option value="">性別</option>
                <option value="all" {{ ($inputs['gender'] ?? '') === 'all' ? 'selected' : '' }}>全て</option>
                <option value="male" {{ ($inputs['gender'] ?? '') === 'male' ? 'selected' : '' }}>男性</option>
                <option value="female" {{ ($inputs['gender'] ?? '') === 'female' ? 'selected' : '' }}>女性</option>
                <option value="other" {{ ($inputs['gender'] ?? '') === 'other' ? 'selected' : '' }}>その他</option>
            </select>
            <select name="category">
                <option value="">お問い合わせの種類</option>
                <option value="order">商品のお届けについて</option>
                <option value="exchange">商品の交換について</option>
                <option value="trouble">商品トラブル</option>
                <option value="shop">ショップへのお問い合わせ</option>
                <option value="other">その他</option>
            </select>
            <input type="date" name="date">
            <button type="submit" class="search-button">検索</button>
            <a href="{{ route('admin') }}" class="reset-button">リセット
            </a>
        </form>

        <button class="export-button">エクスポート</button>

        <table class="contact-table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                        <td>
                            @if ($contact->gender === 'male') 男性
                            @elseif ($contact->gender === 'female') 女性
                            @elseif ($contact->gender === 'other') その他
                            @else 未設定
                            @endif
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category }}</td>
                        <td>
                            <a href="#" class="detail-link" data-id="{{ $contact->id }}">詳細</a>
                            <div class="modal" id="modal-{{ $contact->id }}" style="display: none;">
                                <div class="modal-content">
                                    <span class="close" data-id="{{ $contact->id }}">&times;</span>
                                    <h2>詳細情報</h2>
                                    <p><strong>名前：</strong>{{ $contact->last_name }} {{ $contact->first_name }}</p>
                                    <p><strong>性別：</strong>{{ $contact->gender }}</p>
                                    <p><strong>メール：</strong>{{ $contact->email }}</p>
                                    <p><strong>内容：</strong>{{ $contact->category }}</p>
                                    <form method="POST" action="{{ route('admin.delete', ['id' => $contact->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $contacts->links()}}
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.detail-link').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const id = this.dataset.id;
                    document.getElementById(`modal-${id}`).style.display = 'flex';
                });
            });

            document.querySelectorAll('.close').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.dataset.id;
                    document.getElementById(`modal-${id}`).style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>

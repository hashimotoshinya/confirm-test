@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/find.css')}}"/>
@endsection

@section('content')
<main class="main">
    <h1 class="admin-title">検索結果</h1>
    <div class="back-button-wrap">
        <a href="{{ route('admin') }}" class="reset-button">戻る</a>
    </div>

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
            @forelse ($contacts as $contact)
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
                </tr>
            @empty
                <tr><td colspan="5">該当するデータがありません。</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $contacts->links() }}
    </div>
</main>
@endsection
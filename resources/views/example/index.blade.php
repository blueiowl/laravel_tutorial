@extends('layouts.master')

@section('title', '作業一覧')

@section('header')
    作業一覧
@endsection

@if(Auth::check())
    @section('subheader')
        <p><a href="/create/{{ $user->id }}">新規作業作成</a></p>

    <p>
        <form method="GET" action="/search">
            <label>作業内容検索</label>
            <input type="text" name="content">
            <input type="submit" value="検索">
        </form>
    </p>
    @endsection
@endif

@section('content')
    @if(Auth::check())
        <p>
            USER: {{ $user->name . '(' . $user->email .')' }}|
            <a href="/home">home(ここからログアウトできます)</a>
        </p>
        @foreach ($examples as $example)
            <p>
                <a href="/show/{{ $example->id }}">{{ $example->workName }}</a>
                [{{ $example->status }}][{{ $example->updated_at }}] 
                <a href="/edit/{{ $example->id }}/{{ $user->id }}"> [編集]</a>
                <a href="/delete/{{ $example->id }}"> [削除]</a>
            </p>
        @endforeach
    @else
        <p>
            *ログインしていません。(<a href="/login">ログイン</a>)|
            <a href="/register">登録</a>
        </p>
    @endif
@endsection
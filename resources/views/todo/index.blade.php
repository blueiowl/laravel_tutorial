@extends('layouts.master')

@section('title', '作業一覧')

@section('header')
    作業一覧
@endsection

@section('subheader')
    @if(Auth::check())
        <p><a href="{{ action('TodoController@create') }}">新規作業作成</a></p>
        <p>
            <form method="GET" action="{{ action('TodoController@search') }}">
                <label>作業内容検索</label>
                <input type="text" name="content">
                <input type="submit" value="検索">
            </form>
        </p>
    @endif
@endsection

@section('content')

    @if(Auth::check())
        <p>
            USER: {{ Auth::user()->name }}|
            <a href="{{ action('HomeController@index') }}">home(ここからログアウトできます)</a>
        </p>
        @foreach ($todos as $todo)
            <p>
                <a href="{{ action('TodoController@show', $todo->id) }}">{{ $todo->work_name }}</a>
                [{{ $todo->status }}]
                [{{ $todo->updated_at }}] 
                <a href="{{ action('TodoController@edit', $todo->id) }}"> [編集]</a>
                <form method="POST" action="{{ action('TodoController@delete', $todo->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button>削除</button>
                </form>
            </p>
        @endforeach
    @else
        <p>
            *ログインしていません。ログイン時のみ作業が表示されます。<a href="/login">ログイン</a>|
            <a href="/register">登録</a>
        </p>
    @endif
@endsection

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
        <p>
            USER: {{ Auth::user()->name }}|
            <a href="{{ action('HomeController@index') }}">home(ここからログアウトできます)</a>
        </p>
    @else
        <p>
            *ログインしていません。ログイン時のみ作業が表示されます。<a href="/login">ログイン</a>|
            <a href="/register">登録</a>
        </p>
    @endif
@endsection

@section('content')
    @if(Auth::check())
        <div class="container">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>作業名</th><th>状況</th><th>更新日時</th><th>操作</th>
                </tr>
                @foreach ($todos as $todo)                  
                    <tr>
                        <td>{{ $todo->work_name }}</td>
                        <td>{{ $todo->status }}</td>
                        <td>{{ $todo->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ action('TodoController@show', $todo->id) }}"><button class="btn btn-info">照会</button></a>
                                <a href="{{ action('TodoController@edit', $todo->id) }}"><button class="btn btn-primary">編集</button></a>
                                <form method="POST" action="{{ action('TodoController@destroy', $todo->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button class="btn btn-danger">削除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
@endsection

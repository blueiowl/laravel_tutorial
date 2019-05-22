@extends('layouts.master')

@section('title', '検索結果')

@section('header')
    検索結果
@endsection

@section('subheader')
<a href="/">作業一覧に戻る</a>
@endsection

@section('content')
    @foreach ($todos as $todo)
        <p>
            <a href="{{ action('TodoController@show', $todo->id) }}">{{ $todo->work_name }}</a>
            [{{ $todo->status }}][{{ $todo->updated_at }}] 
            <a href="{{ action('TodoController@edit', $todo->id) }}"> [編集]</a>
            <form method="POST" action="{{ action('TodoController@delete', $todo->id) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE')}}
                <button>削除</button>
            </form>

        </p>
    @endforeach
@endsection

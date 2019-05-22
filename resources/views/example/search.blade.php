@extends('layouts.master')

@section('title', '検索結果')

@section('header')
    検索結果
@endsection

@section('subheader')
<a href="/">作業一覧に戻る</a>
@endsection

@section('content')
    @foreach ($examples as $example)
        <p>
            <a href="{{ action('ExampleController@show', $example->id) }}">{{ $example->work_name }}</a>
            [{{ $example->status }}][{{ $example->updated_at }}] 
            <a href="{{ action('ExampleController@edit', $example->id) }}"> [編集]</a>
            <form method="POST" action="{{ action('ExampleController@delete', $example->id) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE')}}
                <button>削除</button>
            </form>

        </p>
    @endforeach
@endsection
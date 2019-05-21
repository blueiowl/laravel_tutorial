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
            <a href="/show/{{ $example->id }}">{{ $example->workName }}</a> 
            <a href="/edit/{{ $example->id }}"> [編集]</a>
            <form method="POST" action="/delete/{{ $example->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button>削除</button>
            </form>
        </p>
    @endforeach
@endsection
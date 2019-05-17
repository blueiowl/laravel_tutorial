@extends('layouts.master')

@section('title', '作業一覧')

@section('header')
    作業一覧
@endsection

@section('subheader')
<p><a href="/create">新規作業作成</a></p>
<p>
    <form method="GET" action="/search">
        <label>作業内容検索</label>
        <input type="text" name="content">
        <input type="submit" value="検索">
    </form>
</p>
@endsection

@section('content')
        @foreach ($examples as $example)
            <p>
                <a href="/show/{{ $example->id }}">{{ $example->workName }}</a> 
                <a href="/edit/{{ $example->id }}"> [編集]</a>
                <a href="/delete/{{ $example->id }}"> [削除]</a>
            </p>
        @endforeach
@endsection
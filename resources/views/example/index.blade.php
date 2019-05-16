@extends('layouts.master')

@section('title', '作業一覧')

@section('header')
    作業一覧
@endsection

@section('subheader')
<a href="/create">新規作業作成</a>
@endsection

@section('content')
        @foreach ($examples as $example)
            <p><a href="/show/{{ $example->id }}">{{ $example->workName }}</a></p>
        @endforeach
@endsection
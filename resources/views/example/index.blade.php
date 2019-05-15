@extends('layouts.master')

@section('title', '記事一覧')

@section('header')
    一覧表示
@endsection

@section('content')
        @foreach ($examples as $example)
            <p>{{ $example->title }}</p>
        @endforeach
@endsection
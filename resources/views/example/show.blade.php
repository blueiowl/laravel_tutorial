@extends('layouts.master')

@section('title', '作業詳細')

@section('header')
    作業詳細
@endsection

@section('subheader')
    <a href="/edit/{{ $example->id }}">作業編集</a>
@endsection

@section('content')
    <p>ID: {{ $example->id }}</p>    
    <p>作業名: {{ $example->workName }}</p>
    <p>状態: {{ $example->status }}</p>
    <p>作業内容: {{ $example->content }}</p>
    <p>作成日時: {{ $example->created_at }}</p>
    <p>更新日時: {{ $example->updated_at }}</p>
@endsection
@extends('layouts.master')

@section('title', '作業詳細')

@section('header')
    作業詳細
@endsection

@section('content')
    <p>ID: {{ $example->id }}</p>    
    <p>作業名: {{ $example->workName }}</p>
    <p>状態: {{ $example->status }}</p>
    <p>作業内容: {{ $example->content }}</p>
    <p>作成者id: {{ $example->created_id }}</p>
    <p>作成者名: {{ $example->created_name }}</p>
    <p>作成日時: {{ $example->created_at }}</p>
    <p>更新者id: {{ $example->updated_id }}</p>
    <p>更新者名: {{ $example->updated_name }}</p>
    <p>更新日時: {{ $example->updated_at }}</p>
@endsection
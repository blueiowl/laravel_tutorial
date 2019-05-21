@extends('layouts.master')

@section('title', '作業詳細')

@section('header')
    作業詳細
@endsection

@section('content')
    <p>ID: {{ $example->id }}</p>    
    <p>作業名: {{ $example->work_name }}</p>
    <p>状態: 
        @if($example->status === 1) 
            未着手
        @elseif($example->status === 2)
            作業中
        @else
            完了
        @endif
    </p>
    <p>作業内容: {{ $example->content }}</p>
    <p>ユーザーid: {{ $example->user_id }}</p>
    <p>作成日時: {{ $example->created_at }}</p>
    <p>更新日時: {{ $example->updated_at }}</p>
@endsection
@extends('layouts.master')

@section('title', '作業詳細')

@section('header')
    作業詳細
@endsection

@section('content')
    <p>ID: {{ $todo->id }}</p>    
    <p>作業名: {{ $todo->work_name }}</p>
    <p>状態: 
        @if($todo->status === 1) 
            未着手
        @elseif($todo->status === 2)
            作業中
        @else
            完了
        @endif
    </p>
    <p>作業内容: {{ $todo->content }}</p>
    <p>ユーザーid: {{ $todo->user_id }}</p>
    <p>作成日時: {{ $todo->created_at }}</p>
    <p>更新日時: {{ $todo->updated_at }}</p>
@endsection
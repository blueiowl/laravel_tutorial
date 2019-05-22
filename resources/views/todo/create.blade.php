@extends('layouts.master')

@section('title', '新規作業作成')

@section('header')
    新規作業作成
@endsection

@section('content')
<form method="POST" action="{{ action('TodoController@store') }}">
    {{ csrf_field() }}
    <p>
        <label>新規作業名</label>
        <input type="text" name="work_name">
    </p>
    <p>
        <label>作業状態</label>
        <select name="status">
            <option value=1>未着手</option>
            <option value=2>作業中</option>
            <option value=3>完了</option>
        </select>
    </p>
    <p>
        <label>作業内容</label>
        <textarea name="content" rows="5" cols="30"></textarea>
    </p>

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    
    <input type="submit" value="送信">
</form>
@endsection

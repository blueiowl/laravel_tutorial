@extends('layouts.master')

@section('title', '新規作業作成')

@section('header')
    新規作業作成
@endsection

@section('content')
<form method="POST" action="/store">
    {{ csrf_field() }}
    <p>
        <label>新規作業名</label>
        <input type="text" name="workName">
    </p>
    <p>
        <label>作業状態</label>
        <select name="status">
            <option value="未着手">未着手</option>
            <option value="作業中">作業中</option>
            <option value="完了">完了</option>
        </select>
    </p>
    <p>
        <label>作業内容</label>
        <textarea name="content" rows="5" cols="30"></textarea>
    </p>
    {{-- 作成者id --}}
    <input type="hidden" name="created_id" value="{{ $user->id }}">
    {{-- 作成者名 --}}
    <input type="hidden" name="created_name" value="{{ $user->name }}">
    <input type="submit" value="送信">
</form>
@endsection
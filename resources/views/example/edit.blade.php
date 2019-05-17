@extends('layouts.master')

@section('title', '作業編集')

@section('header')
    作業編集
@endsection

@section('content')
<form method="POST" action="/update/{{ $example->id }}">
    {{ csrf_field() }}
    <p>
        <label>新規作業名</label>
        <input type="text" name="workName" value="{{ $example->workName }}">
    </p>
    <p>
        <label>作業状態</label>
        <select name="status">
            <option value="未着手" @if($example->status === "未着手") selected @endif>未着手</option>
            <option value="作業中" @if($example->status === "作業中") selected @endif>作業中</option>
            <option value="完了"  @if($example->status === "完了") selected @endif>完了</option>
        </select>
    </p>
    <p>
        <label>作業内容</label>
        <textarea name="content" rows="5" cols="30" >{{ $example->content }}</textarea>
    </p>
    <input type="submit" value="送信">
</form>
@endsection
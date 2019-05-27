@extends('layouts.master')

@section('title', '作業編集')

@section('header')
    作業編集
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{ action('TodoController@update', $todo->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}
        <div class="form-group">
            <label>新規作業名</label>
            <input type="text" name="work_name" value="{{ $todo->work_name }}" class="form-control">
            @if($errors->has('work_name'))
                <div class="alert alert-danger">
                    @foreach($errors->get('work_name') as $error)
                        {{ $error }}
                    @endforeach   
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>作業状態</label>
            <select name="status" class="form-control">
                <option value="{{ Config::get('const.undone') }}"           @if($todo->status === Config::get('const.undone') )           selected @endif>未着手</option>
                <option value="{{ Config::get('const.work_in_progress') }}" @if($todo->status === Config::get('const.work_in_progress') ) selected @endif>作業中</option>
                <option value="{{ Config::get('const.done') }}"             @if($todo->status === Config::get('const.done') )             selected @endif>完了</option>
            </select>
        </div>
        <div class="form-group">
            <label>作業内容</label>
            <textarea name="content" rows="5" cols="30" class="form-control">{{ $todo->content }}</textarea>
            @if($errors->has('content'))
                <div class="alert alert-danger">
                    @foreach($errors->get('content') as $error)
                    {{ $error }}
                    @endforeach   
                </div>
            @endif
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="submit" value="送信">
    </form>
</div>
@endsection

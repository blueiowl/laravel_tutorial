@extends('layouts.master')

@section('title', '作業詳細')

@section('header')
    作業詳細
@endsection

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <tr>
             <th>ID</th><td>{{ $todo->id }}</td>
        </tr>
        <tr>
            <th>作業名</th><td>{{ $todo->work_name }}</td>
        </tr>
        <tr>
            <th>状態</th><td>{{ $todo->status }}</td>
        </tr>
        <tr>
            <th>作業内容</th><td>{{ $todo->content }}</td>
        </tr>
        <tr>
            <th>ユーザーid</th><td>{{ $todo->user_id }}</td>
        </tr>
        <tr>
            <th>作成日時</th><td>{{ $todo->created_at }}</td>
        </tr>
        <tr>
            <th>更新日時</th><td>{{ $todo->updated_at }}</td>
        </tr>
    </table>
</div>
@endsection

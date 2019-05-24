@extends('layouts.master')

@section('title', '検索結果')

@section('header')
    検索結果
@endsection

@section('subheader')
    <a href="{{ action('TodoController@index') }}">作業一覧に戻る</a>
@endsection

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
            <tr>
                <th>作業名</th><th>状況</th><th>更新日時</th><th>操作</th>
            </tr>
            @foreach ($todos as $todo)                  
                <tr>
                    <td>{{ $todo->work_name }}</td>
                    <td>{{ $todo->status }}</td>
                    <td>{{ $todo->updated_at }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ action('TodoController@show', $todo->id) }}"><button class="btn btn-info">照会</button></a>
                            <a href="{{ action('TodoController@edit', $todo->id) }}"><button class="btn btn-primary">編集</button></a>
                            <form method="POST" action="{{ action('TodoController@destroy', $todo->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
                                <button class="btn btn-danger">削除</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

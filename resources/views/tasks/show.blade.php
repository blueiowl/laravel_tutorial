@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h1 class="row py-xl-4">{{ $title }}</h1>
            <div class="row card">
                <div class="card-header text-center">
                    <h3>{{ $task->title }}</h3>
                </div>

                <div class="list-group">
                    <div class="list-group-item">
                        <span class="row">
                            <span class="col">ID</span>
                            <span class="col">{{ $task->id }}</span>
                        </span>
                    </div>
                    <div class="list-group-item">
                        <span class="row">
                            <span class="col">内容</span>
                            <span class="col">{{ $task->content }}</span>
                        </span>
                    </div>
                    <div class="list-group-item">
                        <span class="row">
                            <span class="col">ステータス</span>
                            <span class="col">
                                @if($task->done_flag)
                                    完了
                                @else
                                    未了
                                @endif
                            </span>
                        </span>
                    </div>
                    <div class="list-group-item">
                        <span class="row">
                            <span class="col">作成日</span>
                            <span class="col">{{ $task->created_at }}</span>
                        </span>
                    </div>
                    <div class="list-group-item">
                        <span class="row">
                            <span class="col">更新日</span>
                            <span class="col">{{ $task->updated_at }}</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row py-xl-4 justify-content-center">
                <div class="col">
                    <div class="py-xl-2 d-flex justify-content-center">
                        <a href="{{ route('tasks.index') }}" class="btn btn-dark w-50">一覧に戻る</a>
                    </div>
                    <div class="py-xl-2 d-flex justify-content-center">
                        <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="btn btn-dark w-50">編集</a>
                    </div>
                    <div class="py-xl-2 d-flex justify-content-center">
                        <form action="{{ route('tasks.delete', ['id' => $task->id]) }}" method="post" class="col d-flex justify-content-center">
                            @csrf
                            <input type="submit" value="削除" class="btn btn-danger w-50">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

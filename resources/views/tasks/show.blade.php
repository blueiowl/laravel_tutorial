@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h1 class="row py-xl-4">{{ $title }}</h1>
            <div class="row py-xl-1 card">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

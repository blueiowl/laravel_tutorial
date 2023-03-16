@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h1 class="row py-xl-4">{{ $title }}</h1>
            <form action="{{ route('tasks.index') }}" method="post" class="py-xl-4">
                @csrf
                <div class="row py-xl-1">
                    @for($i = 0; $i < 3; $i ++)
                        <label class="col-4"><input type="radio" name="radio" value="{{ $i - 1 }}" @if($i - 1 == $radio) checked @endif>{{ $radios[$i] }}</label>
                    @endfor
                </div>
                <div class="row">
                    <label for="keyword" class="col-3">キーワード</label>
                    <input type="text" name="keyword" placeholder="キーワードを入力してください" value="{{ $keyword }}" class="col-6">
                </div>
                <div class="row py-xl-3">
                    <input type="image" src="{{ asset('./images/search.png') }}" width="60" height="30">
                    <a type="image" href="{{ route('tasks.clear') }}" width="60" height="30" class="col-1"><img src="{{ asset('./images/clear.png') }}" width="60" height="30"></a>
                </div>
            </form>
            @if(count($tasks) > 0)
                <div class="row card">
                    <div class="card-header text-center">
                        <h3>{{ __('タスク') }}</h3>
                    </div>

                    <div class="list-group">
                        @foreach($tasks as $task)
                            <div class="list-group-item">
                                <span class="row">
                                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="col nav-link text-dark">{{ $task->title }}</a>
                                    <div class="col">
                                        @if($task->done_flag)
                                            完了
                                        @else
                                            未了
                                        @endif
                                    </div>
                                    <form action="{{ route('tasks.done', ['id' => $task->id]) }}" method="post">
                                        @csrf
                                        <div class="col">
                                            <input type="submit" value="完了にする" class="btn btn-dark">
                                        </div>
                                    </form>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row py-xl-4 justify-content-center">
                    {{ $tasks->currentPage() }} / {{ $tasks->lastPage() }}ページ
                </div>
                <div class="row justify-content-center">
                    {{ $tasks->links() }}
                </div>
            @else
                <div class="row py-xl-1">
                    <h3 class="text-dark">タスクはありません</h3>
                </div>
            @endif
            <div class="row py-xl-4 justify-content-center">
                <div class="col">
                    <div class="py-xl-2 d-flex justify-content-center">
                        <a href="{{ route('tasks.create') }}" class="btn btn-dark w-50">新規タスク作成</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

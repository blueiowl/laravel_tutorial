@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-3">
            <h1 class="row py-xl-4">{{ $title }}</h1>
            @if(count($tasks) > 0)
                <div class="row py-xl-1 card">
                    <div class="card-header text-center">
                        <h3>{{ __('タスク') }}</h3>
                    </div>

                    <div class="list-group">
                        @foreach($tasks as $task)
                            <div class="list-group-item">
                                <span class="row">
                                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="col nav-link">{{ $task->title }}</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row py-xl-4 justify-content-center">
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

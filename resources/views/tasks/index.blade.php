@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-3">
            <h1 class="row py-xl-5">{{ $title }}</h1>
            @if(count($tasks) > 0)
                <div class="row py-xl-1 card">
                    <div class="card-header text-center">
                        <h3>{{ __('タスク') }}</h3>
                    </div>

                    <div class="list-group">
                        @foreach($tasks as $task)
                            <div class="list-group-item">
                                <span class="row">
                                    <span class="col">{{ $task->title }}</span>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row py-xl-5 justify-content-center">
                    {{ $tasks->links() }}
                </div>
            @else
                <div class="row py-xl-1">
                    <h3 class="text-dark">タスクはありません</h3>
                </div>
            @endif
            <div class="row py-xl-5 justify-content-center">
                <div class="col">
                    <div class="py-xl-2 d-flex justify-content-center">
                        <a href="{{ route('tasks.index') }}" class="btn btn-dark w-50">タスク一覧</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-3">
            @foreach($tasks as $task)
                <div class="card">
                    <div class="card-header">{{ __('タスク') }}</div>

                    <div class="card-body">
                        {{ $task->name }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    <a href="{{ route('home') }}">ダッシュボードに戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

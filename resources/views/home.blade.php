@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">ダッシュボード</div>

                <div class="card-body">
                    <a href="{{ route('tasks.index') }}">タスク一覧</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

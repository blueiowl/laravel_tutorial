@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h1 class="row py-xl-5 text-danger">{{ $title }}</h1>
            <h3 class="row py-xl-1">予期せぬエラーが発生しました</h3>
            <p class="row py-xl-1">以下のリンクからアクセスし直してください</p>
            <a href="{{ route('tasks.index') }}" class="row py-xl-1">タスク一覧</a>
        </div>
    </div>
</div>
@endsection

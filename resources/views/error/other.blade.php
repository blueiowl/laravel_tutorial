@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="d-flex justify-content-center py-xl-5 text-danger">{{ $title }}</h1>
    <h3 class="d-flex justify-content-center py-xl-1">予期せぬエラーが発生しました</h3>
    <p class="d-flex justify-content-center py-xl-1">以下のリンクからアクセスし直してください</p>
    @auth
        <a href="{{ route('tasks.index') }}" class="d-flex justify-content-center py-xl-1">タスク一覧</a>
    @else
        <a href="{{ url('/') }}" class="d-flex justify-content-center py-xl-1">トップページ</a>
    @endauth
</div>
@endsection

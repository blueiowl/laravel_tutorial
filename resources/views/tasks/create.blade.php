@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h1 class="row py-xl-4">{{ $title }}</h1>
            <form action="{{ route('tasks.store') }}" method="post" class="row py-xl-4">
                @csrf
                <div class="row d-block">
                    <label for="title">タイトル</label>
                    <input type="text" name="title" placeholder="タイトルを入力してください">
                </div>
                <div class="row d-block">
                    <label for="content">内容</label>
                    <textarea name="content" cols="30" rows="10" placeholder="内容を入力してください"></textarea>
                </div>
                <div class="row d-block">
                    <input type="submit" value="作成" class="btn btn-dark">
                </div>
            </form>
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

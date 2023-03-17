@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h1 class="row py-xl-4">{{ $title }}</h1>
            <div class="row py-xl-1 card">
                <div class="card-header text-center">
                    <h3>タスク情報入力</h3>
                </div>

                <div class="list-group">
                    <form action="{{ route('tasks.store') }}" method="post">
                        @csrf
                        <div class="list-group-item">
                            <span class="row">
                                <label for="title" class="col">タイトル</label>
                                <input type="text" name="title" placeholder="タイトルを入力してください" class="col" value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                        <div class="list-group-item">
                            <span class="row">
                                <label for="content" class="col">内容</label>
                                <textarea name="content" cols="30" rows="10" placeholder="内容を入力してください" class="col">{{ old('content') }}</textarea>
                                @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                        <div class="list-group-item">
                            <div class="col">
                                <input type="submit" value="作成" class="btn btn-dark">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row py-xl-4 justify-content-center">
                <div class="col-md-8">
                    <div class="py-xl-2 d-flex justify-content-center">
                        <a href="{{ route('tasks.index') }}" class="btn btn-dark w-50">一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

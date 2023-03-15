<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 全タスク取得
    // タスク一覧画面表示
    public function index()
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $tasks = Task::where([
            ['user_id', $user->id],
            ['delete_flag', false],
        ])->paginate(10);

        return view('tasks.index', ['title' => 'タスク一覧', 'tasks' => $tasks]);
    }

    // 最新タスク取得
    // 最新タスク画面表示
    public function new()
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = Task::where([
            ['user_id', $user->id],
            ['done_flag', false],
            ['delete_flag', false],
        ])->orderBy('updated_at', 'desc')->first();

        return view('tasks.new', ['title' => '最新タスク', 'task' => $task]);
    }

    // タスク作成画面表示
    public function create()
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');
        
        return view('tasks.create', ['title' => 'タスク作成']);
    }

    // 新規タスク作成
    // タスク詳細画面にリダイレクト
    public function store(Request $request)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = new Task;
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        $task->done_flag = false;
        $task->delete_flag = false;
        $task->user_id = $user->id;
        $task->save();

        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    // 特定タスク取得
    // タスク詳細画面表示
    public function show($id)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = Task::find($id);
        if(!$task || $user->id != $task->user_id) return response()->view('error.other', ['title' => '予期せぬエラー'], 404);

        return view('tasks.show', ['title' => 'タスク詳細', 'task' => $task]);
    }

    // 特定タスク取得
    // タスク編集画面表示
    public function edit(Task $task)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = Task::find($id);
        if(!$task || $user->id != $task->user_id) return response()->view('error.other', ['title' => '予期せぬエラー'], 404);

        return view('tasks.edit', ['title' => 'タスク編集', 'task' => $task]);
    }

    // タスク更新
    // タスク詳細画面にリダイレクト
    public function update(Request $request, Task $task)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = Task::find($id);
        if(!$task || $user->id != $task->user_id) return response()->view('error.other', ['title' => '予期せぬエラー'], 404);

        $task->title = $request->input('title');
        $task->content = $request->input('content');
        $task->save();

        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    // タスク完了
    // タスク詳細画面にリダイレクト
    public function done(Request $request, Task $task)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = Task::find($id);
        if(!$task || $user->id != $task->user_id) return response()->view('error.other', ['title' => '予期せぬエラー'], 404);

        $task->done_flag = true;
        $task->save();

        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    // タスク削除（ソフトデリート）
    // タスク一覧画面にリダイレクト
    public function delete(Task $task)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = Task::find($id);
        if(!$task || $user->id != $task->user_id) return response()->view('error.other', ['title' => '予期せぬエラー'], 404);

        $task->delete_flag = true;
        $task->save();

        return redirect()->route('tasks.index');
    }
}

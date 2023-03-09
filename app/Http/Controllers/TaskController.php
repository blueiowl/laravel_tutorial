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
        if(!$user) return redirect('/login');

        $tasks = Task::where([
            ['user_id', $user->id],
            ['delete_flag', false],
        ])->get();

        return view('index', ['title' => 'タスク一覧', 'tasks' => $tasks]);
    }

    // 最新タスク取得
    // 最新タスク画面表示
    public function new()
    {
        $user = \Auth::user();
        if(!$user) return redirect('/login');

        $task = Task::where([
            'user_id', $user->id,
            'delete_flag', false,
        ])->first();

        return view('new', ['title' => '最新タスク', 'task' => $task]);
    }

    // タスク作成画面表示
    public function create()
    {
        $user = \Auth::user();
        if(!$user) return redirect('/login');
        
        return view('create', ['title' => 'タスク作成']);
    }

    // 新規タスク作成
    // タスク詳細画面にリダイレクト
    public function store(Request $request)
    {
        $user = \Auth::user();
        if(!$user) return redirect('/login');

        $task = new Task;
        $task->name = $request->input('name');
        $task->done_flag = false;
        $task->delete_flag = false;
        $task->user_id = $request->input('user_id');
        $task->save();

        return redirect()->route('show', ['id' => $task->id]);
    }

    // 特定タスク取得
    // タスク詳細画面表示
    public function show($id)
    {
        $user = \Auth::user();
        if(!$user) return redirect('/login');

        $task = Task::find($id);

        return view('show', ['title' => 'タスク詳細', 'task' => $task]);
    }

    // 特定タスク取得
    // タスク編集画面表示
    public function edit(Task $task)
    {
        $user = \Auth::user();
        if(!$user) return redirect('/login');

        $task = Task::find($id);

        return view('edit', ['title' => 'タスク編集', 'task' => $task]);
    }

    // タスク更新
    // タスク詳細画面にリダイレクト
    public function update(Request $request, Task $task)
    {
        $user = \Auth::user();
        if(!$user) return redirect('/login');

        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->save();

        return redirect()->route('show', ['id' => $task->id]);
    }

    // タスク完了
    // タスク詳細画面にリダイレクト
    public function done(Request $request, Task $task)
    {
        $user = \Auth::user();
        if(!$user) return redirect('/login');

        $task = Task::find($id);
        $task->done_flag = true;
        $task->save();

        return redirect()->route('show', ['id' => $task->id]);
    }

    // タスク削除（ソフトデリート）
    // タスク一覧画面にリダイレクト
    public function delete(Task $task)
    {
        $user = \Auth::user();
        if(!$user) return redirect('/login');

        $task = Task::find($id);
        $task->delete_flag = true;
        $task->save();

        return redirect()->route('index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    // 全タスク取得
    // タスク検索
    // タスク一覧画面表示
    public function index(Request $request)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $tasks = [];
        $method = $request->method();
        $search = $request->session()->get('search');
        $radios = ['全ステータス', '未了', '完了'];

        if($method == 'POST') {
            $keyword = $request->input('keyword');
            $radio = $request->input('radio');
        } elseif($method == 'GET') {
            $keyword = $search['keyword'];
            $radio = $search['radio'];
        }

        $request->session()->forget('search');

        if(isset($radio)) {
            if($radio < 0) {
                if($keyword != '') {
                    $tasks = Task::where([
                        ['user_id', $user->id],
                        ['delete_flag', false],
                        ['title', 'like', "%{$keyword}%"],
                    ])->orWhere([
                        ['user_id', $user->id],
                        ['delete_flag', false],
                        ['content', 'like', "%{$keyword}%"],
                    ])->paginate(5);
                } else {
                    $tasks = Task::where([
                        ['user_id', $user->id],
                        ['delete_flag', false],
                    ])->paginate(5);
                }
            } else {
                if($keyword != '') {
                    $tasks = Task::where([
                        ['user_id', $user->id],
                        ['done_flag', $radio],
                        ['delete_flag', false],
                        ['title', 'like', "%{$keyword}%"],
                    ])->orWhere([
                        ['user_id', $user->id],
                        ['done_flag', $radio],
                        ['delete_flag', false],
                        ['content', 'like', "%{$keyword}%"],
                    ])->paginate(5);
                } else {
                    $tasks = Task::where([
                        ['user_id', $user->id],
                        ['done_flag', $radio],
                        ['delete_flag', false],
                    ])->paginate(5);
                }
            }
        } else {
            $radio = -1;
            $tasks = Task::where([
                ['user_id', $user->id],
                ['delete_flag', false],
            ])->paginate(5);
        }

        $request->session()->put('search', [
            'keyword' => $keyword,
            'radio' => $radio,
        ]);

        return view('tasks.index', [
            'title' => 'タスク一覧',
            'tasks' => $tasks,
            'keyword' => $keyword,
            'radio' => $radio,
            'radios' => $radios,
        ]);
    }

    // タスク検索条件クリア
    // タスク一覧画面にリダイレクト
    public function clear(Request $request)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $request->session()->forget('search');

        return redirect()->route('tasks.index');
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
    public function store(TaskRequest $request)
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
    public function edit($id)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = Task::find($id);
        if(!$task || $user->id != $task->user_id) return response()->view('error.other', ['title' => '予期せぬエラー'], 404);

        return view('tasks.edit', ['title' => 'タスク編集', 'task' => $task]);
    }

    // タスク更新
    // タスク詳細画面にリダイレクト
    public function update(TaskRequest $request, $id)
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
    // タスク一覧画面にリダイレクト
    public function done($id)
    {
        $user = \Auth::user();
        if(!$user) return redirect()->route('error.auth');

        $task = Task::find($id);
        if(!$task || $user->id != $task->user_id) return response()->view('error.other', ['title' => '予期せぬエラー'], 404);

        $task->done_flag = true;
        $task->save();

        return redirect()->route('tasks.index');
    }

    // タスク削除（ソフトデリート）
    // タスク一覧画面にリダイレクト
    public function delete($id)
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

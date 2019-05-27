<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Config;

class TodoController extends Controller
{
    //一覧表示
    public function index(Request $request){
        //ログインユーザのデータのみ表示する
        if(Auth::check()){
            $todos_undone           = Auth::user()->todos->where('status', Config::get('const.undone') )->sortByDesc('updated_at');
            $todos_work_in_progress = Auth::user()->todos->where('status', Config::get('const.work_in_progress') )->sortByDesc('updated_at');
            $todos_done             = Auth::user()->todos->where('status', Config::get('const.done') )->sortByDesc('updated_at');
            $todos = collect($todos_undone)->concat($todos_work_in_progress)->concat($todos_done);
            return view('todo.index', ['todos' => $todos]);
        }else{
            return view('todo.index');
        }
    }

    //新規作成
    public function create(){
        return view('todo.create');
    }

    //保存
    public function store(TodoRequest $request){
        $todo = new Todo;
        $todo->fill($request->all())->save();
        return redirect()->route('todo.index');
    }

    //詳細表示    
    public function show($id){
        $todo = Todo::find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    //編集
    public function edit($id){
        $todo = Todo::find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    //更新
    public function update(TodoRequest $request, $id){
        $todo = Todo::find($id);
        $todo->fill($request->all())->save();
        return redirect()->route('todo.index');
    }

    //削除
    public function destroy($id){
        Todo::find($id)->delete();
        return redirect()->route('todo.index');
    } 

    //検索
    public function search(Request $request){
        $todos_searched         = Todo::where('user_id', Auth::user()->id)->where('content', 'LIKE', '%'.$request->content.'%')->get();
        $todos_undone           = $todos_searched->where('status', Config::get('const.undone') )->sortByDesc('updated_at');
        $todos_work_in_progress = $todos_searched->where('status', Config::get('const.work_in_progress') )->sortByDesc('updated_at');
        $todos_done             = $todos_searched->where('status', Config::get('const.done') )->sortByDesc('updated_at');
        $todos = collect($todos_undone)->concat($todos_work_in_progress)->concat($todos_done);
        return view('todo.search', ['todos' => $todos]);
    }
}

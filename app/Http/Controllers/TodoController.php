<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    //一覧表示
    public function index(REQUEST $request){
        //ログインユーザのデータのみ表示する
        if(Auth::check()){
            $todos_undone        = Todo::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('updated_at', 'desc')->get();
            $todos_workInProcess = Todo::where('user_id', Auth::user()->id)->where('status', 2)->orderBy('updated_at', 'desc')->get();
            $todos_done          = Todo::where('user_id', Auth::user()->id)->where('status', 3)->orderBy('updated_at', 'desc')->get();
            $todos = collect($todos_undone)->concat($todos_workInProcess)->concat($todos_done);        
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
    public function store(Request $request){
        $todo = new Todo;
        $todo->fill($request->all())->save();
        return redirect('/');
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
    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->fill($request->all())->save();
        return redirect('/');
    }

    //削除
    public function delete($id){
        Todo::find($id)->delete();
        return redirect('/');
    } 

    //検索
    public function search(REQUEST $request){
        $todos = Todo::where('content', $request->content)->get();
        return view('todo.search', ['todos' => $todos]);
    }
}

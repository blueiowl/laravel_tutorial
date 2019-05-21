<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
use App\User;
use Illuminate\Support\Facades\Auth;

class ExampleController extends Controller
{
    //一覧表示
    public function index(REQUEST $request){
        $user = Auth::user();

        //ログインユーザのデータのみ表示する
        if(Auth::check()){
            $examples_undone        = Example::where('created_id', $user->id)->where('status', '未着手')->orderBy('updated_at', 'desc')->get();
            $examples_workInProcess = Example::where('created_id', $user->id)->where('status', '作業中')->orderBy('updated_at', 'desc')->get();
            $examples_done          = Example::where('created_id', $user->id)->where('status', '完了')->orderBy('updated_at', 'desc')->get();
            $examples = collect($examples_undone)->concat($examples_workInProcess)->concat($examples_done);        
            return view('example.index', ['examples' => $examples, 'user' => $user ]);
        }else{
            return view('example.index');
        }
    }

    //新規作成
    public function create($id){
        $user    = User::find($id);
        return view('example.create', ['user' => $user]);
    }

    //保存
    public function store(Request $request){
        $example = new Example;
        $example->fill($request->all())->save();
        return redirect('/');
    }

    //詳細表示    
    public function show($id){
        $example = Example::find($id);
        return view('example.show', ['example' => $example]);
    }

    //編集
    public function edit($id, $uid){
        $example = Example::find($id);
        $user    = User::find($uid);
        return view('example.edit', ['example' => $example, 'user' => $user]);
    }

    //更新
    public function update(Request $request, $id){
        $example = Example::find($id);
        $example->fill($request->all())->save();
        return redirect('/');
    }

    //削除
    public function delete($id){
        Example::find($id)->delete();
        return redirect('/');
    } 

    //検索
    public function search(REQUEST $request){
        $examples = Example::where('content', $request->content)->get();
        return view('example.search', ['examples' => $examples]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
// use App\User;
use Illuminate\Support\Facades\Auth;

class ExampleController extends Controller
{
    //一覧表示
    public function index(REQUEST $request){
        //ログインユーザのデータのみ表示する
        if(Auth::check()){
            $examples_undone        = Example::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('updated_at', 'desc')->get();
            $examples_workInProcess = Example::where('user_id', Auth::user()->id)->where('status', 2)->orderBy('updated_at', 'desc')->get();
            $examples_done          = Example::where('user_id', Auth::user()->id)->where('status', 3)->orderBy('updated_at', 'desc')->get();
            $examples = collect($examples_undone)->concat($examples_workInProcess)->concat($examples_done);        
            return view('example.index', ['examples' => $examples]);
        }else{
            return view('example.index');
        }
    }

    //新規作成
    public function create(){
        return view('example.create');
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
    public function edit($id){
        $example = Example::find($id);
        return view('example.edit', ['example' => $example]);
    }

    //更新
    public function update(Request $request, $id){
        $example = Example::find($id);
        $example->fill($request->all())->save();
        return redirect('/');
    }

    //削除
    public function destroy($id){
        Example::find($id)->delete();
        return redirect('/');
    } 

    //検索
    public function search(REQUEST $request){
        $examples = Example::where('content', $request->content)->get();
        return view('example.search', ['examples' => $examples]);
    }
}
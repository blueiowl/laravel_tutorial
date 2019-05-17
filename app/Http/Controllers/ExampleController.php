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
        $examples = Example::all();
        $user = Auth::user();
        // $sort = $request->sort;
        // $items = Users::orderBy($sort, 'asc')->simplePaginate(5);
        // $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
        // $param = ['sort' => $sort, 'user' => $user];
        return view('example.index', ['examples' => $examples, 'user' => $user ]);
    }

    //新規作成
    public function create(){
        return view('example.create');
    }

    //保存
    public function store(REQUEST $request){
        $example = new Example;
        $example->workName = $request->workName;
        $example->status   = $request->status;
        $example->content  = $request->content;
        $example->save();
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
    public function update(REQUEST $request, $id){
        $example = Example::find($id);
        $example->workName = $request->workName;
        $example->status   = $request->status;
        $example->content  = $request->content;
        $example->save();
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

    //ログアウト
    // public function logout(){
    //     Auth::logout();
    //     return redirect('/');
    // }
}
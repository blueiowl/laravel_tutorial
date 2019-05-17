<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;

class ExampleController extends Controller
{
    //一覧表示
    public function index(){
        $examples = Example::all();
        return view('example.index', ['examples' => $examples]);
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
}

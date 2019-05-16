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
        $example->status = $request->status;
        $example->content = $request->content;
        $example->save();
        $examples = Example::all();
        return view('example.index', ['examples' => $examples]);
    }

}

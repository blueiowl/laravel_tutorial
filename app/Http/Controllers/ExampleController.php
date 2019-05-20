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
        // $examples = Example::all();
        $user = Auth::user();

        //ログイン時は、ログインユーザのデータのみ表示する
        if(Auth::check()){
            $examples_undone        = Example::where('created_id', $user->id)->where('status', '未着手')->orderBy('updated_at', 'desc')->get();
            $examples_workInProcess = Example::where('created_id', $user->id)->where('status', '作業中')->orderBy('updated_at', 'desc')->get();
            $examples_done          = Example::where('created_id', $user->id)->where('status', '完了')->orderBy('updated_at', 'desc')->get();
        }else{
            $examples_undone        = Example::where('status', '未着手')->orderBy('updated_at', 'desc')->get();
            $examples_workInProcess = Example::where('status', '作業中')->orderBy('updated_at', 'desc')->get();
            $examples_done          = Example::where('status', '完了')->orderBy('updated_at', 'desc')->get();
        }

        // $examples = collect($examples_undone)->merge($examples_workInProcess)->merge($examples_done);
        $examples = collect($examples_undone)->concat($examples_workInProcess)->concat($examples_done);

        
        // $sort = $request->sort;
        // $items = Users::orderBy($sort, 'asc')->simplePaginate(5);
        // $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
        // $param = ['sort' => $sort, 'user' => $user];
        // return view('example.index', ['examples' => $examples_undone, 'user' => $user ]);
        return view('example.index', ['examples' => $examples, 'user' => $user ]);
    }

    //新規作成
    public function create($id){
        $user    = User::find($id);
        return view('example.create', ['user' => $user]);
    }

    //保存
    public function store(REQUEST $request){
        $example               = new Example;
        $example->workName     = $request->workName;
        $example->status       = $request->status;
        $example->content      = $request->content;
        $example->created_id   = $request->created_id;
        $example->created_name = $request->created_name;
        $example->updated_id   = $request->created_id;
        $example->updated_name = $request->created_name;
        $example->save();
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
    public function update(REQUEST $request, $id){
        $example               = Example::find($id);
        $example->workName     = $request->workName;
        $example->status       = $request->status;
        $example->content      = $request->content;
        $example->updated_id   = $request->updated_id;
        $example->updated_name = $request->updated_name;
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
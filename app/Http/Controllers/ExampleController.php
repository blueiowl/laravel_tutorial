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
}

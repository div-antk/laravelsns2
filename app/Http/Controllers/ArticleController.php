<?php

namespace App\Http\Controllers;

// モデルを使う
use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index()
    {
        // allメソッドはモデルが持つクラスメソッド
        $articles = Article::all()->sortByDesc('created_at');

        // viewメソッド
        // 第一引数はビューファイルの指定
        // 第二引数はビューファイルに渡す変数の名称と、その変数の値を連想配列で指定
        // return view('articles.index', ['articles' => $articles]);
        
        // コレでもイケる
        return view('articles.index')->with(['articles' => $articles]);

        // コレでもイケる。compact関数
        // return view('articles.index', compact('articles'));
    }
}

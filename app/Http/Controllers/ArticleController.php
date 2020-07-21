<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = [
            // 型キャスト。配列の手前に(object)と記述することで、配列がオブジェクト型に変換されるß
            (object) [
                'id' => 1,
                'title' => 'タイトル1',
                'body' => '孫文',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'たくや',
                ],
            ],
        ];
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

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
        return view('articles.index', ['articles' => $articles]);
    }
}

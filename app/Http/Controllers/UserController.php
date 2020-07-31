<?php

namespace App\Http\Controllers;
use App\Repositories\Article\ArticleRepositoryInterface;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    protected $article;

    public function __construct(ArticleRepositoryInterface $ArticleRepository)
    {
        // リポジトリパターン
        $this->Article = $ArticleRepository;
        
    }
    public function show(string $name)
    {
        // whereメソッドで$nameと一致する名前を持つユーザーモデルをコレクションで取得する
        // ただし取得したのはユーザーモデル1件が入ったコレクション（配列）なので、そのままではモデルとして取り扱うことができない
        // なのでfirstメソッドを使って最初の1件だけを取得して変数に代入している
        $user = User::where('name', $name)->first();

        $articles = $this->Article->userGetArticle($name);

        dd($articles);

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}

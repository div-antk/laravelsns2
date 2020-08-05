<?php

namespace App\Http\Controllers;
// use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    protected $user;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        // リポジトリパターン
        $this->userRepository = $userRepository;
        
        // ポリシーの適用
        // $this->authorizeResource(Article::class, 'article');
    }

    public function show(String $name)
    {
        // whereメソッドで$nameと一致する名前を持つユーザーモデルをコレクションで取得する
        // ただし取得したのはユーザーモデル1件が入ったコレクション（配列）なので、そのままではモデルとして取り扱うことができない
        // なのでfirstメソッドを使って最初の1件だけを取得して変数に代入している
        $user = $this->userRepository->getUser($name);

        $articles = $user->articles->sortByDesc('create_at');

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}

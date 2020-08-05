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
        $user = $this->userRepository->getUser($name);

        $articles = $user->articles->sortByDesc('create_at');

        return view('users.show', [
            // 'user_id' => $user_id,
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}

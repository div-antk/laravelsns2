<?php

namespace App\Repositories\Article;

use App\Models\Article;
// use App\Models\User;


class ArticleRepository Implements ArticleRepositoryInterface
{
  protected $article;

    /**
    * @param object $article
    */

  public function __construct(Article $article)
  {
    $this->article = $article;
  }

    /**
    * 1レコードを取得
    *
    * @var $title
    * @return object
    */

  public function getAll()
  {
    return Article::all()->sortByDesc('created_at');
  }

  public function userGetArticle($user_id)
  {
    return Article::find('user_id', $user_id)->sortByDesc('created_at');
  }
}
<?php

namespace App\Repositories\Article;

use App\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface
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
}
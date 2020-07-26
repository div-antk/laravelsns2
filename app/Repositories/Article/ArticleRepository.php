<?php

namespace App\Repositories\Article;

use App\Models\Article;

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

  public function getFirstRecordByTitle($title)
  {
    return $this->article->where('title', '=', $title)->first();
  }
}
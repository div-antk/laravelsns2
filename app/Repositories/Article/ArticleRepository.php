<?php

namespace App\Repositories\Article;

use App\Models\Article;
use Illuminate\Http\Request;


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

  public function createArticle($request, $article)
  {
    $article->fill($request->all());
    $article->user_id = $request->user()->id;
    return $article->save();
  }
}
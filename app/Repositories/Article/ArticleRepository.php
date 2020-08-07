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

  public function sessionArticle($request)
  {
      // 入力値の取得
      $articles = new Article($request->all());

      // セッションに保存
      return $request->session()->put('articles', '$articles');
  }

  public function createArticle($request, $article)
  {
    $article->fill($request->all());
    $article->user_id = $request->user()->id;
    return $article->save();
  }

  public function updateArticle($request, $article)
  {
    return $article->fill($request->all())->save();
  }

  public function deleteArticle($article)
  {
    return Article::find($article->id)->delete();
  }
}
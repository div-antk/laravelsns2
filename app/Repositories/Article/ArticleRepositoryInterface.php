<?php

namespace App\Repositories\Article;

interface ArticleRepositoryInterface
{
      /**
     * titleで1レコードを取得
     *
     * @var string $title
     * @return object
     */
    
    public function getAll();

    public function createArticle($request, $article);

    public function updateArticle($request, $article);

    public function deleteArticle($article);
}
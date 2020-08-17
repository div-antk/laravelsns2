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

    public function sessionArticle($request);

    public function createArticle($request);

    public function updateArticle($request, $artie);

    public function deleteArticle($article);
}
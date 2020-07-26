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
    public function getFirstRecordByTitle($title);
}
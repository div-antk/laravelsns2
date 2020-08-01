<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
      /**
     * titleで1レコードを取得
     *
     * @var string $title
     * @return object
     */
    public function getUser($user);
}
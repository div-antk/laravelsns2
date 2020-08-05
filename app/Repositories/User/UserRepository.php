<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  protected $user;

    /**
    * @param object $user
    */

  public function __construct(User $user)
  {
      $this->user = $user;
  }

  public function getUser($name)
  {
      // whereメソッドで$nameと一致する名前を持つユーザーモデルをコレクションで取得する
      // ただし取得したのはユーザーモデル1件が入ったコレクション（配列）なので、そのままではモデルとして取り扱うことができない
      // なのでfirstメソッドを使って最初の1件だけを取得して変数に代入している
      return $this->user->where('name', $name)->first();
  }
}
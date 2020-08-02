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
    // return User::where('name', '$name')->first();
    return $this->user->where('name', '=', $name)->first();

  }
}
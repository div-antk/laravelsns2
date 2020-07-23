<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    public function user(): BelongsTo
    {
        // $thisはArticleクラスのインスタンス自身を指している
        return $this->belongsTo('App\Models\User');
    }
}

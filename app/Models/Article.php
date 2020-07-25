<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];
    
    public function user(): BelongsTo
    {
        // $thisはArticleクラスのインスタンス自身を指している
        return $this->belongsTo('App\Models\User');
    }
}

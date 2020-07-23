<?php

// ユーザー
Auth::routes();

// 引数2つ。URLとどのコントローラでなんのメソッドを実行するか
Route::get('/', 'ArticleController@index');

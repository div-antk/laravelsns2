<?php

// ユーザー
Auth::routes();

// 引数2つ。URLとどのコントローラでなんのメソッドを実行するか
Route::get('/', 'ArticleController@index')->name('articles.index');

// 登録画面表示
Route::get('articles/create', 'ArticleController@create')->name('articles.create');

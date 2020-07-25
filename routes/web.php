<?php

// ユーザー
Auth::routes();

// 引数2つ。URLとどのコントローラでなんのメソッドを実行するか
Route::get('/', 'ArticleController@index')->name('articles.index');

// 登録画面表示
Route::get('articles/create', 'ArticleController@create')
    ->name('articles.create')
    // 未ログイン状態で直接URLアクセスした場合ログイン画面に飛ぶ
    ->middleware('auth');

// 確認画面
Route::post('articles/confirm', 'ArticleController@confirm')->name('articles.confirm');

Route::post('articles/store', 'ArticleController@store')->name('articles.store');
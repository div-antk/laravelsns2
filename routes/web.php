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

// 完了画面
Route::post('articles/complete', 'ArticleController@store')->name('articles.store');

// 編集
Route::get('articles/{article}/edit', 'ArticleController@edit')->name('articles.edit');

// 更新
Route::patch('articles/{article}', 'ArticleController@update')->name('articles.update');

Route::show('articles/{article}', 'ArticleController@show')->name('articles.show');

// 削除
Route::delete('articles/{article}', 'ArticleController@destroy')->name('articles.destroy');


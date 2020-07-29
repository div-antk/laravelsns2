<?php

// ユーザー
Auth::routes();

// 引数2つ。URLとどのコントローラでなんのメソッドを実行するか
Route::get('/', 'ArticleController@index')->name('articles.index');

Route::prefix('articles')->name('articles.')->group(function() {
    Route::get('/create', 'ArticleController@create')
    ->name('create')
    // 未ログイン状態で直接URLアクセスした場合ログイン画面に飛ぶ
    ->middleware('auth');
    Route::post('/confirm', 'ArticleController@confirm')->name('confirm');
    Route::post('/complete', 'ArticleController@store')->name('store');
    Route::get('/{article}/edit', 'ArticleController@edit')->name('edit');
    Route::patch('/{article}', 'ArticleController@update')->name('update');
    Route::get('/{article}', 'ArticleController@show')->name('show');
    Route::delete('/{article}', 'ArticleController@destroy')->name('destroy');
});

Route::prefix('users')->name('users.')->group(function() {
    Route::get('/{name}', 'UserController@show')->name('show');
});
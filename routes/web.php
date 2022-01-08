<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function(){

    // TOPページを表示
    Route::get('/', 'TalkController@index');
    
    // 人気のトーク（今月）一覧画面を表示
    Route::get('/talks_popular_month', 'TalkController@index_popular_month');

    // 人気のトーク（今週）一覧画面を表示
    Route::get('/talks_popular_week', 'TalkController@index_popular_week');
    
    // 人気のトーク（今日）一覧画面を表示
    Route::get('/talks_popular_today', 'TalkController@index_popular_today');

    // 最新のトーク 一覧画面を表示
    Route::get('/talks_latest', 'TalkController@index_latest');

    // 人気,最新のトーク 詳細画面を表示
    Route::get('/talks/{talk}', 'TalkController@show');

    // ユーザーが新規投稿を作成
    Route::post('/posts', 'PostController@store');
    
    // ユーザーが投稿を削除
    Route::delete('/posts/{post}', 'PostController@destroy');

    // ユーザーがトークを作成
    Route::post('/talks', 'TalkController@store');
    
    // ユーザーがトークを削除
    Route::delete('/talks/{talk}', 'TalkController@destroy');

    // 球団トーク 一覧画面を表示
    Route::get('/teams', 'TeamController@index');

    // 球団トーク 詳細画面を表示
    Route::get('/teams/{team}', 'TeamController@show');

    // 球場情報 一覧画面を表示
    Route::get('/stadiums', 'StadiumController@index');

    // 球場情報 詳細画面を表示
    Route::get('/stadiums/{stadium}', 'StadiumController@show');
    
    // マイページを表示
    Route::get('/mypage/{user}', 'UserController@index');
    
    // マイページにて、プロフィール画像をアップロード
    Route::post('/mypage/{user}', 'UserController@create');
    
    // マイページにて、プロフィール画像を削除
    Route::delete('/mypage/{user}', 'UserController@delete');
    
    // マイページ 編集画面を表示
    Route::get('/mypage/{user}/edit', 'UserController@edit');
    
    // マイページを編集（ユーザー情報を更新）
    Route::put('/mypage/{user}', 'UserController@update');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

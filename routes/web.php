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

    // TOPページにリクエストが来た際、人気と最新のトークを5件表示する処理
    Route::get('/', 'TalkController@index');

    // 人気のトーク一覧画面「/talks_popular」にリクエストが来た場合
    Route::get('/talks_popular', 'TalkController@index_popular');

    // 最新のトーク一覧画面「/talks_latest」にリクエストが来た場合
    Route::get('/talks_latest', 'TalkController@index_latest');

    // 人気と最新のトーク一覧画面から、各トークの詳細画面（各トークページ）にリクエストが来た場合
    Route::get('/talks/{talk}', 'TalkController@show');

    // ユーザーが新規投稿を作成
    Route::post('/posts', 'PostController@store');
    
    // ユーザーが投稿を削除
    Route::delete('/posts/{post}', 'PostController@destroy');

    // ユーザーがトークテーマを作成
    Route::post('/talks', 'TalkController@store');
    
    // ユーザーがトークを削除
    Route::delete('/talks/{talk}', 'TalkController@destroy');

    // TOPページにて、球団トークを選択
    Route::get('/teams', 'TeamController@index');

    // 球団のトーク一覧画面から、詳細画面へ
    Route::get('/teams/{team}', 'TeamController@show');

    // TOPページにて、球場情報を選択
    Route::get('/stadiums', 'StadiumController@index');

    // 球場情報の一覧画面から、詳細画面へ
    Route::get('/stadiums/{stadium}', 'StadiumController@show');
    
    // マイページへアクセス
    Route::get('/mypage/{user}', 'UserController@index');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

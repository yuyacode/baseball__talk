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


// TOPページ「/」にリクエストが来たとき、TOPページのviewファイル（index.blade.php）を返す。
Route::get('/', function () {
    return view('index');
});

// TOPページにリクエストが来た際、最新のトークを5件表示するためのルーティング
Route::get('/', 'TalkController@index_latest_top');

// 最新のトーク一覧画面「/talks_latest」にリクエストが来た場合
Route::get('/talks_latest', 'TalkController@index_latest');

// 最新のトーク一覧画面から、各トークの詳細画面（各トークページ）にリクエストが来た場合
Route::get('talks_latest/{talk}', 'TalkController@show_latest');

// ユーザーが新規投稿を作成
Route::post("/posts", 'PostController@store');
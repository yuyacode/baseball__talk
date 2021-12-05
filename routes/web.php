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


// TOPページにリクエストが来た際、人気と最新のトークを5件表示する処理
Route::get('/', 'TalkController@top');

// 人気のトーク一覧画面「/talks_popular」にリクエストが来た場合
Route::get('/talks_popular', 'TalkController@index_popular');

// 最新のトーク一覧画面「/talks_latest」にリクエストが来た場合
Route::get('/talks_latest', 'TalkController@index_latest');

// 人気と最新のトーク一覧画面から、各トークの詳細画面（各トークページ）にリクエストが来た場合
Route::get('/talks/{talk}', 'TalkController@show');

// ユーザーが新規投稿を作成
Route::post("/posts", 'PostController@store');

// ユーザーがトークテーマを作成
Route::post('/talks', 'TalkController@store');

// 選手情報一覧・登録ページにリクエストが来た場合
Route::get('/teams_info', 'TeamController@index');

// 選手情報一覧・登録の処理にて、球団が選択されたときの処理
Route::get('/players_info/{team}', 'TeamController@show');

// 選手を登録
Route::post('/players', 'PlayerController@store');

// 選手を削除
Route::delete('/players_info/{player}', 'PlayerController@delete');
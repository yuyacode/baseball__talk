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

// TOPページ「/」にリクエストが来たら、TOPページのviewファイル（index.blade.php）を返す。
Route::get('/', function () {
    return view('index');
});

// 最新のトーク一覧画面「/talks_latest」にリクエストが来た場合
Route::get('/talks_latest', 'TalkController@index_latest');

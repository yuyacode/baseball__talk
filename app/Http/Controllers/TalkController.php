<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;

class TalkController extends Controller
{
    
    // TOPページにリクエストが来た際、最新のトークを5件表示する処理
    public function index_latest_top(Talk $talk)
    {
        return view('index')->with(['talks_latest' => $talk->getTalksByLimit_latest()]);
    }

    // 最新のトーク一覧画面にリクエストが来た場合の処理
    public function index_latest(Talk $talk)
    {
        return view('talks_latest/index')->with(['talks' => $talk->getPaginateByLimit_latest()]);
    }
    
    // 最新のトーク一覧画面から、各トークの詳細画面（トークページ）にリクエストが来た場合の処理
    public function show_latest(Talk $talk)
    {
        return view('talks_latest/show')->with(['own_posts' => $talk->getOwnPostsByLimit(), 'talk' => $talk]);
    }

}

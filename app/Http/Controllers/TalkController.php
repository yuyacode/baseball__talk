<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TalkController extends Controller
{
    
    
    // TOPページにリクエストが来た際、人気と最新のトークを5件表示する処理
    public function top(Talk $talk)
    {
        return view('index')->with([
            'talks_popular' => $talk->getTalksByLimit_popular(),
            'talks_latest' => $talk->getTalksByLimit_latest()
        ]);
    }


    // 人気のトーク一覧画面にリクエストが来た場合の処理
    public function index_popular(Talk $talk)
    {
        return view('talks_popular/index')->with(['talks' => $talk->getPaginateByLimit_popular()]);
    }
    
    
    // 最新のトーク一覧画面にリクエストが来た場合の処理
    public function index_latest(Talk $talk)
    {
        return view('talks_latest/index')->with(['talks' => $talk->getPaginateByLimit_latest()]);
    }
    
    
    // 人気と最新のトーク一覧画面から、各トークの詳細画面（トークページ）にリクエストが来た場合の処理
    public function show(Talk $talk)
    {
        return view('show')->with(['own_posts' => $talk->getOwnPostsByLimit(), 'talk' => $talk]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;

class TalkController extends Controller
{

    public function index_latest(Talk $talk)
    {
        return view('talks_latest/index')->with(['talks' => $talk->getPaginateByLimit_latest()]);
    }
    
    // 最新のトーク一覧画面から、各トークの詳細（トークページ）にアクセスがあったとき
    public function show(Talk $talk)
    {
        return view('talks_latest/show')->with(['own_posts' => $talk->getOwnPostsByLimit()]);
    }

}

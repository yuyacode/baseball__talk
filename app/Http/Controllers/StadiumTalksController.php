<?php

namespace App\Http\Controllers;

use App\StadiumTalk;
use Illuminate\Http\Request;

class StadiumTalksController extends Controller
{
    
    // 球場情報（スタジアムのトーク）一覧画面にて、球場一覧を表示するための処理
    public function index(StadiumTalk $stadium_talk)
    {
        return view('stadium_talks/index')->with(['stadium_talks' => $stadium_talk->get()]);  
    }
    
    // スタジアムのトーク詳細画面を表示するための処理
    public function show(StadiumTalk $stadium_talk)
    {
        return view('stadium_talks/show')->with([
            'own_posts' => $stadium_talk->getOwnPostsByLimit(),
            'stadium_talk' => $stadium_talk
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\TeamTalk;
use Illuminate\Http\Request;

class TeamTalksController extends Controller
{
    // 球団のトーク一覧画面にて、球団一覧（トークテーマ一覧）を表示するための処理
    public function index(TeamTalk $team_talk)
    {
        return view('team_talks/index')->with(['team_talks' => $team_talk->get()]);  
    }
    
    // 球団のトーク詳細画面を表示するための処理
    public function show(TeamTalk $team_talk)
    {
        return view('team_talks/show')->with([
            'own_posts' => $team_talk->getOwnPostsByLimit(),
            'team_talk' => $team_talk
        ]);
    }
}

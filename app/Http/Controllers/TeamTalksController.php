<?php

namespace App\Http\Controllers;

use App\TeamTalk;
use Illuminate\Http\Request;

class TeamTalksController extends Controller
{
    // 球団トーク一覧画面を表示
    public function index(TeamTalk $team_talk)
    {
        return view('team_talks/index')->with(['team_talks' => $team_talk->get()]);  
    }
    
    // 球団トーク詳細画面を表示
    public function show(TeamTalk $team_talk)
    {
        return view('team_talks/show')->with([
            'own_posts' => $team_talk->getOwnPostsByLimit(),
            'team_talk' => $team_talk
        ]);
    }
}

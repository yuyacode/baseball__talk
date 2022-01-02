<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // 球団トーク一覧画面を表示
    public function index(Team $team)
    {
        return view('teams/index')->with(['teams' => $team->get()]);  
    }
    
    // 球団トーク詳細画面を表示
    public function show(Team $team)
    {
        return view('teams/show')->with([
            'posts' => $team->getPosts(),
            'team' => $team
        ]);
    }
}

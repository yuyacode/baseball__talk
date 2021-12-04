<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    
    // 管理者ページ（選手情報一覧・登録）にリクエストが来たら、チームの一覧を表示する処理
    public function index(Team $team)
    {
        return view('players_info/index')->with(['teams' => $team->get()]);  
    }
    
    // 選択されたチームに所属する選手を取得する処理
    public function show(Team $team)
    {
        return view('players_info/show')->with(['players' => $team->getOwnPlayersByLimit(), 'team' => $team]);
    }

}

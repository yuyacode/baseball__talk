<?php

namespace App\Http\Controllers;

use App\Player;
// use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;

class PlayerController extends Controller
{

    // 選手情報を保存
    public function store(PlayerRequest $request, Player $player)
    {
        $input = $request['player'];
        $player->fill($input)->save();
        return redirect('/players_info/'.$player->team_id);
    }
    
    // 選手情報を削除
    public function delete(Player $player)
    {
        $player->delete();
        return redirect('/players_info/'.$player->team_id);
    }

}

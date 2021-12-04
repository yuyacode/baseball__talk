<?php

namespace App\Http\Controllers;

use App\Player;
// use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;

class PlayerController extends Controller
{

    public function store(PlayerRequest $request, Player $player)
    {
        $input = $request['player'];
        $player->fill($input)->save();
        return redirect('/players_info/'.$player->team_id);
    }

}

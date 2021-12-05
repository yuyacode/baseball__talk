<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{

    // Playersに対するリレーション
    //「1対多」の関係なので'players'と複数形に
    public function players()   
    {
        return $this->hasMany('App\Player');
    }

}

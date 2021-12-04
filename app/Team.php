<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    // Playersに対するリレーション
    // 「1対多」の関係なので'players'と複数形に
    public function players()   
    {
        return $this->hasMany('App\Player');  
    }
    
    // チームのIDを取得する処理
    public function id()
    {
        return $this->id;
    }
    
    // 選択されたチームに所属する選手を、20人ずつページネーションで取得する処理
    public function getOwnPlayersByLimit(int $limit_count = 20)
    {
        return $this::with('players')->find(Team::id())->players()->orderBy('number', 'ASC')->paginate($limit_count);
    }

}

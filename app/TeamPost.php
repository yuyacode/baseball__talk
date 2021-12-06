<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamPost extends Model
{
    
    protected $fillable = [
        'team_talk_id',
        'body',
    ];
    
    // TeamTalkに対するリレーション
    //「1対多」の関係なので単数系に
    public function team_talk()
    {
        return $this->belongsTo('App\TeamTalk');
    }
}

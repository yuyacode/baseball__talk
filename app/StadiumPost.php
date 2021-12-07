<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StadiumPost extends Model
{
    
    protected $fillable = [
        'stadium_talk_id',
        'body',
    ];
    
    // StadiumTalkに対するリレーション
    //「1対多」の関係なので単数系に
    public function stadium_talk()
    {
        return $this->belongsTo('App\StadiumTalk');
    }

}

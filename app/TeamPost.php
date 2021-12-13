<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamPost extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'team_talk_id',
        'body',
        'user_id'
    ];
    
    // TeamTalkに対するリレーション
    //「1対多」の関係なので単数系に
    public function team_talk()
    {
        return $this->belongsTo('App\TeamTalk');
    }
    
    // Userに対するリレーション
    //「1対多」の関係なので単数系に
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

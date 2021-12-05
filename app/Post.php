<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'talk_id',
        'body'
    ];

    //Talkに対するリレーション
    //「1対多」の関係なので単数系に
    public function talk()
    {
        return $this->belongsTo('App\Talk');
    }

}

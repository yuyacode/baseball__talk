<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'talk_id',
        'kinds',
        'body',
        'user_id'
    ];
    
    // Userに対するリレーション
    //「1対多」の関係なので単数系に
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Talkに対するリレーション
    //「1対多」の関係なので単数系に
    public function talk()
    {
        return $this->belongsTo('App\Talk');
    }
    
    // Teamに対するリレーション
    //「1対多」の関係なので単数系に
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    
    // Stadiumに対するリレーション
    //「1対多」の関係なので単数系に
    public function stadium()
    {
        return $this->belongsTo('App\Stadium');
    }

}

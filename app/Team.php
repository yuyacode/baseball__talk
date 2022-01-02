<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    
    // Userに対するリレーション
    //「1対多」の関係なので'users'と複数形に
    public function users()   
    {
        return $this->hasMany('App\User');  
    }

    // Postに対するリレーション
    //「1対多」の関係なので'posts'と複数形に
    public function posts()   
    {
        return $this->hasMany('App\Post', 'talk_id');  
    }

    // 球団トークの投稿を取得
    public function getPosts()
    {
        return $this->posts()->where('kinds', 'team')->orderBy('created_at', 'ASC')->get();
    }

}

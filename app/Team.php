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

    // トークの投稿を、作成日時の昇順で500件取得
    public function getPaginateByLimit(int $limit_count = 500)
    {
        return $this->posts()->where('kinds', 'team')->orderBy('created_at', 'ASC')->paginate($limit_count);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $table = 'stadiums';

    // Postに対するリレーション
    public function posts()
    {
        return $this->hasMany('App\Post', 'talk_id');
    }

    // 球場情報の投稿を取得
    public function getPosts()
    {
        return $this->posts()->where('kinds', 'stadium')->orderBy('created_at', 'ASC')->get();
    }

}

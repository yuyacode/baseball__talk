<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $table = 'stadiums';

    // Postに対するリレーション
    //「1対多」の関係なので'posts'と複数形に
    public function posts()
    {
        return $this->hasMany('App\Post', 'talk_id');
    }

    // 球場情報の投稿を取得
    public function getPaginateByLimit(int $limit_count = 500)
    {
        return $this->posts()->where('kinds', 'stadium')->orderBy('created_at', 'ASC')->paginate($limit_count);
    }

}

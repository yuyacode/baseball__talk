<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StadiumTalk extends Model
{
    
    // StadiumPostに対するリレーション
    //「1対多」の関係なので'stadium_posts'と複数形に
    public function stadium_posts()   
    {
        return $this->hasMany('App\StadiumPost');  
    }
    
    
    // そのトークに属する投稿を、作成日時の昇順で500件まで取得する処理
    public function getOwnPostsByLimit(int $limit_count = 500)
    {
        return $this->stadium_posts()->orderBy('created_at', 'ASC')->paginate($limit_count);
    }

}

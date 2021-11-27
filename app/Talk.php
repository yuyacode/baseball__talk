<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{

    // 最新のトークの一覧ページを表示するための処理
    public function getPaginateByLimit_latest(int $limit_count = 10)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    //Postに対するリレーション
    //「1対多」の関係なので'posts'と複数形に
    public function posts()
    {
        return $this->hasMany('App\Post');  
    }
    
    // トークのIDを取得する処理
    public function id()
    {
        return $this->id;
    }
    
    // そのトークに属する投稿を、作成日時の昇順で500件まで取得する処理
    public function getOwnPostsByLimit(int $limit_count = 500)
    {
        return $this::with('posts')->find(Talk::id())->posts()->orderBy('created_at', 'ASC')->paginate($limit_count);;
    }
    

}

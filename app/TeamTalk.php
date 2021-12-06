<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamTalk extends Model
{
    
    // TeamPostに対するリレーション
    //「1対多」の関係なので'team_posts'と複数形に
    public function team_posts()   
    {
        return $this->hasMany('App\TeamPost');  
    }
    
    // トークのIDを取得する処理
    public function id()
    {
        return $this->id;
    }
    
    // そのトークに属する投稿を、作成日時の昇順で500件まで取得する処理
    public function getOwnPostsByLimit(int $limit_count = 500)
    {
        return $this::with('team_posts')->find(TeamTalk::id())->team_posts()->orderBy('created_at', 'ASC')->paginate($limit_count);
    }
}

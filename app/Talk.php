<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Talk extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'user_id'
    ];
    
    
    // Userに対するリレーション
    //「1対多」の関係なので単数系に
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    // Postに対するリレーション
    //「1対多」の関係なので'posts'と複数形に
    public function posts()
    {
        return $this->hasMany('App\Post');  
    }


    // TOPページにて、人気のトークを5件表示
    public function getTalksByLimit_popular(int $limit_count = 5)
    {
        $sevendays = Carbon::today()->subDay(7);
        return $talks_popular = Talk::whereDate('created_at', '>=', $sevendays)->orderBy('posts_number', 'DESC')->limit($limit_count)->get();
    }


    // TOPページにて、最新のトークを5件表示
    public function getTalksByLimit_latest(int $limit_count = 5)
    {
        return $this->orderBy('created_at', 'DESC')->limit($limit_count)->get();
    }


    // 人気のトークの一覧を表示
    public function getPaginateByLimit_popular(int $limit_count = 10)
    {
        $sevendays = Carbon::today()->subDay(7);
        return $talks_popular = Talk::whereDate('created_at', '>=', $sevendays)->orderBy('posts_number', 'DESC')->paginate($limit_count);
    }


    // 最新のトークの一覧を表示
    public function getPaginateByLimit_latest(int $limit_count = 10)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }


    // トークの投稿を、作成日時の昇順で500件取得
    public function getOwnPostsByLimit(int $limit_count = 500)
    {
        return $this->posts()->orderBy('created_at', 'ASC')->paginate($limit_count);
    }


}

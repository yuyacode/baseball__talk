<?php

namespace App;

use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    // Talkに対するリレーション
    //「1対多」の関係なので'talks'と複数形に
    public function talks()   
    {
        return $this->hasMany('App\Talk');  
    }
    
    
    // Postに対するリレーション
    //「1対多」の関係なので'posts'と複数形に
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
    
    // TeamPostに対するリレーション
    //「1対多」の関係なので'team_posts'と複数形に
    public function team_posts()   
    {
        return $this->hasMany('App\TeamPost');  
    }
    
    
    // StadiumPostに対するリレーション
    //「1対多」の関係なので'stadium_posts'と複数形に
    public function stadium_posts()   
    {
        return $this->hasMany('App\StadiumPost');  
    }
    
    
    // マイページにて、ユーザーのトークを取得する処理
    public function getOwnPaginateByLimit(int $limit_count = 20)
    {
        return $this->talks()->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
}

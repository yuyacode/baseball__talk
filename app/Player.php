<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    
    protected $fillable = [
        'team_id',
        'number',
        'name'
    ];
    
    // Teamに対するリレーション
    // 「1対多」の関係なので単数系に
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}

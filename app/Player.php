<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    
    use SoftDeletes;
    
    protected $fillable = [
        'team_id',
        'number',
        'name',
        'position_id',
    ];
    
    // Teamに対するリレーション
    //「1対多」の関係なので単数系に
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    
    // Positionに対するリレーション
    //「1対多」の関係なので単数系に
    public function position()
    {
        return $this->belongsTo('App\Position');
    }

}

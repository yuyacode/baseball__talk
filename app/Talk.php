<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{

    public function getPaginateByLimit_latest(int $limit_count = 10)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }

}

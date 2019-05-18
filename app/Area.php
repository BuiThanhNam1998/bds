<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';

    public function post()
    {
    	return $this->hasMany('App\Post','area_id','id');
    }
}

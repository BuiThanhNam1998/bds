<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $table = 'direction';

    public function post()
    {
    	return $this->hasMany('App\Post','direction_id','id');
    }
}

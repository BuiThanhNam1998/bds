<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';
    public function post()
    {
     	return $this->belongsTo('App\Post','post_id','id');
    }
}

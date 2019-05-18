<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedroom_Number extends Model
{
    protected $table = 'bedroom_number';

    public function post()
    {
    	return $this->hasMany('App\Post','bedroom_number_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = 'county';

    public function guild()
    {
    	return $this->hasMany('App\Guild','county_id','id');
    }
}

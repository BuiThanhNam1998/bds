<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';

    public function unit1()
    {
    	return $this->belongsTo('App\Unit','unit','id');
    }
}

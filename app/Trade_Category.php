<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade_Category extends Model
{
    protected $table = 'trade_category';

    public function category()
    {
    	return $this->hasMany('App\Category','trade_category_id','id');
    }

}

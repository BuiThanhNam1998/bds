<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $table = 'sub_category';

    public function news()
    {
    	return $this->hasMany('App\News','category_id','id');
    }
    public function news_category()
    {
    	return $this->hasMany('App\News_Category','news_category','id');
    }
}

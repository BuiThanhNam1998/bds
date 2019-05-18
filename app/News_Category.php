<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_Category extends Model
{
    protected $table = 'news_category';
 	public function sub_category()
    {
    	return $this->belongsTo('App\Sub_Category','news_category','id');
    }
}

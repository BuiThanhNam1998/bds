<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\collection;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;
    protected $table = 'category';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['category']
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function post()
    {
    	return $this->hasMany('App\Post','category_id','id');
    }
    public function trade()
    {
    	return $this->belongsTo('App\Trade_Category','trade_category_id','id');
    } 
}

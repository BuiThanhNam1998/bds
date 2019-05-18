<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\collection;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class News extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;
    protected $table = 'news';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
    	return $this->belongsTo('App\Sub_Category','category_id','id');
    }
}
 
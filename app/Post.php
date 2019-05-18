<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\collection;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model 
{
    use Sluggable;
    use SluggableScopeHelpers;
    protected $table = 'post';
    
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

    public function bedroom_number()
    {
    	return $this->belongsTo('App\Bedroom_Number','bedroom_number_id','id');
    }
    public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public function guild()
    {
    	return $this->belongsTo('App\Guild','guild_id','id');
    }
    public function direction()
    {
    	return $this->belongsTo('App\Direction','direction_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function photo1()
    {
        return $this->hasMany('App\Photo','post_id','id');
    }
}

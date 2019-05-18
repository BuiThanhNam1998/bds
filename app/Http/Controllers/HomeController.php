<?php

namespace App\Http\Controllers;

use App\Category;
use App\County;
use App\Post;
use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {


        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
        $county = Cache::get('county', function () {
            $c=   County::all();
            Cache::put('county', $c, 30);
            return $c;
        });

        $post = Post::select('id','title','photo','guild_id','price_id','vip','area_id')

            ->orderBy('vip','desc')
            ->paginate(6);

        return view('front_end.home',compact('category','post','county'));
    }

    public function show_list_feature_ads(){
        Post::select('id','title','photo','guild_id','price_id')
            ->where('vip', '=', '1')
            ->get();
        $banner = Banner::all();
        return view('front_end.list_post',['banner']=>$banner);
    }
}

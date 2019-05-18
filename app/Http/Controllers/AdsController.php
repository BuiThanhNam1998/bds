<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Area;
use App\Bedroom_Number;
use App\Trade_Category;
use App\Category;
use App\County;
use App\Guild;
use App\Direction;
use App\Price;
use App\User;
use Illuminate\Support\Facades\Cache;

class AdsController extends Controller
{
    //
    public function show_post_ads(){
        $trade_category = Trade_Category::all();
        $category = Category::all();
        $county = County::all();
        $guild = Guild::all();
        return view('front_end.post_add',['trade_category'=>$trade_category,'category'=>$category,'county'=>$county,'guild'=>$guild]);
    }

    public function show_list_ads($id){
        Post::select('name','surname')
            ->where('category_id', '=', $id)
            ->get();
        return view('front_end.list_post');
    }
}

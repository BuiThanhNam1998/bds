<?php

namespace App\Http\Controllers;

use App\About;
use App\Area;
use App\Bedroom_Number;
use App\Category;

use App\County;
use App\Direction;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AboutFrontEndController extends Controller
{
    public function getAbout($id){
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
        $price = Cache::get('price', function () {
            $c=   Price::all();
            Cache::put('price', $c, 30);
            return $c;
        });
        $area = Cache::get('area', function () {
            $c=   Area::all();
            Cache::put('area', $c, 30);
            return $c;
        });
        $bedroom_number = Cache::get('bedroom_number', function () {
            $c=   Bedroom_Number::all();
            Cache::put('bedroom_number', $c, 30);
            return $c;
        });
        $direction = Cache::get('direction', function () {
            $c=   Direction::all();
            Cache::put('direction', $c, 30);
            return $c;
        });
        $about = About::where('type', '=', $id)

            ->first();


        return view('front_end.about',['category'=>$category,'county'=>$county,'price'=>$price,'area'=>$area,'bedroom_number'=>$bedroom_number,'direction'=>$direction,'about'=> $about]);
    }
}

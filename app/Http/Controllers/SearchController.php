<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Category;
use App\Trade_Category;
use App\County;
use App\Guild;
use App\Price;
use App\Area;
use App\Bedroom_Number;
use App\Direction;
use App\Banners;
use App\Photo;
use App\News;
use App\News_Category;
use App\Sub_Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\collection;

class SearchController extends Controller
{
    private $pagenumber =10;
    public function getListPostByCategory($cateId)
    {
        $ca = Category::find($cateId);
        $post = Post::where('category_id','=',$cateId)
            ->orderBy('vip','desc')
            ->paginate($this->pagenumber);

        $trade_category = Cache::get('trade_category', function () {
            $c=   Trade_Category::orderBy('trade_category')->get();
            Cache::put('trade_category', $c, 30);
            return $c;
        });
        $county = Cache::get('county', function () {
            $c=   County::orderBy('county')->get();
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
            $c=   Bedroom_number::all();
            Cache::put('bedroom_number', $c, 30);
            return $c;
        });
        $direction = Cache::get('direction', function () { 
            $c=   Direction::all();
            Cache::put('direction', $c, 30);
            return $c;
        });

        $photo = Cache::get('photo', function () {
            $c=  Photo::all();
            Cache::put('photo', $c, 30);
            return $c;
        });
        return view('front_end.list_post',['post'=>$post,'trade_category'=>$trade_category,'county'=>$county,'price'=>$price,'area'=>$area,'bedroom_number'=>$bedroom_number,'direction'=>$direction,'photo'=>$photo]);
    }

    public function getListNewsByCategory($cateId)
    {
        $news =   News::where('category_id', '=', $cateId)
            // ->orderBy('vip','desc')
            ->paginate($this->pagenumber);


        $county = Cache::get('county', function () {
            $c=   County::orderBy('county')->get();
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
            $c=   Bedroom_number::all();
            Cache::put('bedroom_number', $c, 30);
            return $c;
        });
        $direction = Cache::get('direction', function () { 
            $c=   Direction::all();
            Cache::put('direction', $c, 30);
            return $c;
        });

        $photo = Cache::get('photo', function () {
            $c=  Photo::all();
            Cache::put('photo', $c, 30);
            return $c;
        });
        return view('front_end.list_news',['news'=>$news,'county'=>$county,'price'=>$price,'area'=>$area,'bedroom_number'=>$bedroom_number,'direction'=>$direction,'photo'=>$photo]);
    }


    public function getSearchAdvanced()
   {
    $post = Post::orderBy('vip','desc')->paginate($this->pagenumber);

    $county = Cache::get('county', function () {
            $c=   County::all();
            Cache::put('county', $c, 30);
            return $c;
        });
    $trade_category = Cache::get('trade_category', function () {
            $c=   Trade_Category::all();
            Cache::put('trade_category', $c, 30);
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
            $c=   Bedroom_number::all();
            Cache::put('bedroom_number', $c, 30);
            return $c;
        });
    $direction = Cache::get('direction', function () {
            $c=   Direction::all();
            Cache::put('direction', $c, 30); 
            return $c;
        });

    $photo = Cache::get('photo', function () {
            $c=  Photo::all();
            Cache::put('photo', $c, 30);
            return $c;
        });
    $news = Cache::get('news', function () {
            $c=  News::take(4)->orderBy('created_at')->get();
            Cache::put('news', $c, 30);
            return $c;
        });
    //tin noi ngoai that
    $news1 = Cache::get('news1', function () {
            $c= News::whereIn('category_id',Sub_Category::select('id')->where('news_category',4))->take(5)->orderBy('created_at')->get();
            Cache::put('news1', $c, 30);
            return $c;
        });
    $news2 = Cache::get('news2', function () {
            $c= News::whereIn('category_id',Sub_Category::select('id')->where('news_category',5))->take(5)->orderBy('created_at')->get();
            Cache::put('news2', $c, 30);
            return $c;
        });
    // tin phong thuy
       return view('front_end.index',['post'=>$post,'trade_category'=>$trade_category,'county'=>$county,'price'=>$price,'area'=>$area,'bedroom_number'=>$bedroom_number,'direction'=>$direction,'photo'=>$photo,'news'=>$news,'news1'=>$news1,'news2'=>$news2]);
   }

   public function postSearchAdvanced(Request $request){

        $trade_category = Cache::get('trade_category', function () {
            $c=   Trade_Category::all();
            Cache::put('trade_category', $c, 30);
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
                $c=   Bedroom_number::all();
                Cache::put('bedroom_number', $c, 30);
                return $c;
            });
        $direction = Cache::get('direction', function () {
                $c=   Direction::all();
                Cache::put('direction', $c, 30);
                return $c;
            });

        $query = '`status` = 0 ';
        if(isset($request->keyword)){
            $query = $query." AND (`title` LIKE '%".$request->keyword."%' OR `content` LIKE '%".$request->keyword."%')";
        }
        if($request->category != 0){
            $query = $query.' AND `category_id` = '.$request->category;
        }
        if($request->county != 0){
            $query = $query.' AND `guild_id` IN (SELECT id FROM `guild` WHERE `county_id`='.$request->county.')';
        }


        if($request->price != 0){
            $query = $query.' AND `price_id` >= (SELECT `min` FROM `price` WHERE `id` = '.$request->price.')'.'*(SELECT `ratio` FROM `unit` WHERE `id` = (SELECT `unit` FROM `price` WHERE `id` = '.$request->price.'))'.
            ' AND `price_id_max` <= (SELECT `max` FROM `price` WHERE `id` = '.$request->price.')'.'*(SELECT `ratio` FROM `unit` WHERE `id` = (SELECT `unit` FROM `price` WHERE `id` = '.$request->price.'))';

           
        }
        if($request->area != 0){
            $query = $query.' AND `area_id` BETWEEN (SELECT `min` FROM `area` WHERE `id` = '.$request->area.') AND (SELECT `max` FROM `area` WHERE `id` ='.$request->area.')';
        }
        if($request->bedroom_number != 0){
            $query = $query.' AND `bedroom_number_id` = '.$request->bedroom_number;
        }
        if($request->direction != 0){
            $query = $query.' AND `direction_id` = '.$request->direction;
        }
        // $post = Post::whereRaw($query)
        //         ->orderBy('vip','desc')
        //         ->paginate($this->pagenumber);

        $post = DB::select("CALL search_procedure('$request->keyword','$request->trade_category','$request->category','$request->county','$request->price','$request->area','$request->bedroom_number','$request->direction')");
        return view('front_end.list_post',['county'=>$county,'price'=>$price,
            'area'=>$area,'bedroom_number'=>$bedroom_number,
            'direction'=>$direction,
            'post'=>$post,
            'trade_category'=>$trade_category,
            'keyword'=>$request->keyword,
            'tradeid'=>$request->trade_category,
            'cateid'=>$request->category,
            'countyid'=>$request->county,
            'priceid'=>$request->price,
            'areaid'=>$request->area,
            'bedroom_number_id'=>$request->bedroom_number,
            'direction_id'=>$request->direction
        ]);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Area;
use App\Bedroom_Number;
use App\Trade_Category;
use App\Category;
use App\County;
use App\Guild;
use App\Direction;
use App\Price;
use App\User; 
use App\Unit; 

class PostController extends Controller
{
    public function getList()
    {
    	$query = '`category_id` IN (SELECT `id` FROM `category` WHERE `trade_category_id` = 1 OR `trade_category_id` = 2 ) ';
        $post = Post::whereRaw($query)
                ->orderBy('vip','desc')
                ->paginate(5);
       
    	return view('admin.tin.danhsach',['post'=>$post]);
    }


    public function getListBuyPost()
    {
        $query = '`category_id` IN (SELECT `id` FROM `category` WHERE `trade_category_id` = 3 OR `trade_category_id` = 4 ) ';
        $post = Post::whereRaw($query)
                ->orderBy('vip','desc')
                ->paginate(5); 
       
        return view('admin.tin.danhsachtincanmua',['post'=>$post]);
    }

    public function getEdit($id)
    { 
        $bedroom_number = Bedroom_number::all();
        $trade_category = Trade_Category::all();
        $category = Category::all();
        $county = County::all();
        $guild = Guild::all();
        $direction = Direction::all();
    	$post = Post::find($id);
        $unit = Unit::select('unit','ratio')->where('type',1)->orWhere('type',2)->get();
    	return view('admin.tin.sua',['post'=>$post,'bedroom_number'=>$bedroom_number,'trade_category'=>$trade_category,'category'=>$category,'county'=>$county,'guild'=>$guild,'direction'=>$direction,'unit'=>$unit]);
    }


    public function getBuyPostEdit($id)
    { 
        $trade_category = Trade_Category::all();
        $category = Category::all();
        $county = County::all();
        $guild = Guild::all();
        $post = Post::find($id);
        $price = Price::all();
        return view('admin.tin.suatincanmua',['post'=>$post,'trade_category'=>$trade_category,'category'=>$category,'county'=>$county,'guild'=>$guild,'price'=>$price]);
    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'content' => 'required',
               
            ],
            [
                'title.required' => 'Bạn chưa điền tiêu đề',
                'content.required' => 'Bạn chưa điền nội dung',
            ]);
    	$post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->guild_id = $request->guild;
        $post->bedroom_number_id = $request->bedroom_number_id;
        $post->direction_id = $request->direction_id;
        $post->vip = $request->vip;
        if($request->status == 1){ 
            $post->status = 1;
        }
        else {
            $post->status = 0;
        }
        $post->start_date = $request->start_date;
        $post->finish_date = $request->finish_date;

        
    	$post->save();
        return redirect('admin/tin/danh-sach')->with('message','Sửa thành công');

    }


    public function postBuyPostEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'content' => 'required',
               
            ],
            [
                'title.required' => 'Bạn chưa điền tiêu đề',
                'content.required' => 'Bạn chưa điền nội dung',
            ]);
        $post = Post::find($id);
        $price = Price::find($request->price);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->guild_id = $request->guild;
        $post->price_id = $price->min*$price->unit;
        $post->price_id_max = $price->max*$price->unit;
        $post->vip = $request->vip;
        if($request->status == 1){ 
            $post->status = 1;
        }
        else {
            $post->status = 0;
        }
        $post->start_date = $request->start_date;
        $post->finish_date = $request->finish_date;

        
        $post->save();
        return redirect('admin/tin/danh-sach-tin-can-mua')->with('message','Sửa thành công');

    }

    public function getDelete($id)
    {
    	$post = Post::find($id);
    	$post->delete();
    	return redirect('admin/tin/danh-sach')->with('message','Xóa thành công');
    }
    public function getSearch(Request $request)
    {
        $keyWord = $request->keyWord;
        $post = Post::where('title','like',"%$keyWord%")->orWhere('content','like',"%$keyWord%")->take(30)->paginate();
        return view('admin.timkiem.tin',['post'=>$post,'keyWord'=>$keyWord]);
    }
    public function getChangeStatus($id)
    {
        $post = Post::find($id);
        if($post->status == 1){
            $post->status = 0;
        }
        else {
            $post->status = 1;
        }
        $post->save();
        return redirect('admin/tin/danh-sach');
    }
    public function getChangeStatusBuyPost($id)
    {
        $post = Post::find($id);
        if($post->status == 1){
            $post->status = 0;
        }
        else {
            $post->status = 1;
        }
        $post->save();
        return redirect('admin/tin/danh-sach-tin-can-mua');
    }
}

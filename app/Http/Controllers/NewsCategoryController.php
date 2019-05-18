<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News_Category;

class NewsCategoryController extends Controller
{
   public function getList(){
        $news_category = News_Category::paginate(5);
        return view("admin.theloaitintuc.danhsach",['news_category'=>$news_category]);
    }
    public function getAdd(){
        return view("admin.theloaitintuc.them");
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'news_category' => 'required',
            ],
            [
                'news_category.required'=>'Bạn chưa điền thể loại !',
            ]);
        $news_category = new News_Category;
        $news_category->news_category = $request->news_category;
        $news_category->save();
        return redirect('admin/the-loai-tin-tuc/them')->with('message','Thêm thành công !');
    }
    public function getEdit($id){
        $news_category = News_Category::find($id);
        return view("admin.theloaitintuc.sua",['news_category'=>$news_category]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'news_category' => 'required',
            ],
            [
                'news_category.required'=>'Bạn chưa điền thể loại !', 
            ]);
        $news_category = News_Category::find($id);
        $news_category->news_category = $request->news_category;
        $news_category->save();
        return redirect('admin/the-loai-tin-tuc/danh-sach')->with('message','Sửa thành công !');
    }
    public function getDelete($id){
        $news_category = News_Category::find($id);
        $news_category->delete();
        return redirect('admin/the-loai-tin-tuc/danh-sach')->with('message','Xóa thành công !');
    }
}

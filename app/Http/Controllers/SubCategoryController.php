<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Category;
use App\News_Category;
use App\Sub_Category;

class SubCategoryController extends Controller
{
    public function getList($id)
    {
        $news_category = News_Category::find($id);
        $category = $news_category->sub_category;
        return view('admin.theloai.danhsach',['category'=>$category,'news_category'=>$news_category]);
    }
    public function getAdd($id)
    {
        $news_category = News_Category::find($id);
        return view('admin.theloai.them',['news_category'=>$news_category]);
    }
    public function postAdd(Request $request,$id)
    {
        $this->validate($request,
            [
                'category' => 'required|unique:category,category',
               
            ],
            [
                'category.required' => 'Bạn chưa điền tên loại',
                'category.unique' => 'Loại đã tồn tại'
            ]);
        $category = new Sub_Category;
        $category->category = $request->category;
        $category->news_category = $id;
        $category->save();
        return redirect('admin/the-loai-tin-tuc/the-loai/them/'.$id)->with('message','Thêm thành công');
    }
    public function getEdit($id,$news_category_id)
    {
        $news_category = News_Category::find($news_category_id);
        $category = Sub_Category::find($id);
        return view('admin.theloai.sua',['category'=>$category,'news_category'=>$news_category]);
    }
    public function postEdit(Request $request,$id,$news_category_id)
    {
         $this->validate($request,
            [
                'category' => 'required|unique:category,category',
            ],
            [
                'category.required' => 'Bạn chưa điền',
                'category.unique' => 'Loại đã tồn tại'
            ]);
        $category = Sub_Category::find($id);
        $category->category = $request->category;
        $category->news_category = $news_category_id;
        $category->save();
        return redirect('admin/the-loai-tin-tuc/the-loai/danh-sach/'.$news_category_id)->with('message','Sửa thành công');
    }
    public function getDelete($id,$news_category_id)
    {
        $category = Sub_Category::find($id);
        $category->delete();
        return redirect('admin/the-loai-tin-tuc/the-loai/danh-sach/'.$news_category_id)->with('message','Xóa thành công');
    }
}

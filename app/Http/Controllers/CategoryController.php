<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Category;
use App\Trade_Category;

class CategoryController extends Controller
{
    public function getList($id)
    {
        $trade_category = Trade_Category::find($id);
    	$category = $trade_category->category;
    	return view('admin.loai.danhsach',['category'=>$category,'trade_category'=>$trade_category]);
    }
    public function getAdd($id)
    {
        $trade_category = Trade_Category::find($id);
    	return view('admin.loai.them',['trade_category'=>$trade_category]);
    }
    public function postAdd(Request $request,$id)
    {
        $this->validate($request,
            [
                'category' => 'required',
               
            ],
            [
                'category.required' => 'Bạn chưa điền tên loại',
            ]);
    	$category = new Category;
    	$category->category = $request->category;
        $category->trade_category_id = $id;
    	$category->save();
    	return redirect('admin/loai-buon-ban/loai/them/'.$id)->with('message','Thêm thành công');
    }
    public function getEdit($id,$trade_category_id)
    {
        $trade_category = Trade_Category::find($trade_category_id);
    	$category = Category::find($id);
    	return view('admin.loai.sua',['category'=>$category,'trade_category'=>$trade_category]);
    }
    public function postEdit(Request $request,$id,$trade_category_id)
    {
         $this->validate($request,
            [
                'category' => 'required',
            ],
            [
                'category.required' => 'Bạn chưa điền',
            ]);
    	$category = Category::find($id);
    	$category->category = $request->category;
    	$category->save();
        return redirect('admin/loai-buon-ban/loai/danh-sach/'.$trade_category_id)->with('message','Sửa thành công');

    }
    public function getDelete($id,$trade_category_id)
    {
    	$category = Category::find($id);
    	$category->delete();
    	return redirect('admin/loai-buon-ban/loai/danh-sach/'.$trade_category_id)->with('message','Xóa thành công');
    }
}

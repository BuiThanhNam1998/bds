<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trade_Category;

class TradeCategoryController extends Controller
{
   public function getList(){
        $trade_category = Trade_Category::paginate(5);
        return view("admin.loaibuonban.danhsach",['trade_category'=>$trade_category]);
    }
    public function getAdd(){
        return view("admin.loaibuonban.them");
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'trade_category' => 'required',
            ],
            [
                'trade_category.required'=>'Bạn chưa điền loại buôn bán !',
            ]);
        $trade_category = new Trade_Category;
        $trade_category->trade_category = $request->trade_category;
        $trade_category->save();
        return redirect('admin/loai-buon-ban/them')->with('message','Thêm thành công !');
    }
    public function getEdit($id){
        $trade_category = Trade_Category::find($id);
        return view("admin.loaibuonban.sua",['trade_category'=>$trade_category]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'trade_category' => 'required',
            ],
            [
                'trade_category.required'=>'Bạn chưa điền loại buôn bán !', 
            ]);
        $trade_category = Trade_Category::find($id);
        $trade_category->trade_category = $request->trade_category;
        $trade_category->save();
        return redirect('admin/loai/loai-buon-ban/danh-sach')->with('message','Sửa thành công !');
    }
    public function getDelete($id){
        $trade_category = Trade_Category::find($id);
        $trade_category->delete();
        return redirect('admin/loai/loai-buon-ban/danh-sach')->with('message','Xóa thành công !');
    }
}

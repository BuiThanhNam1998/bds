<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direction;

class DirectionController extends Controller
{
    public function getList()
    {
    	$direction = Direction::paginate(5);
    	return view('admin.huongnha.danhsach',['direction'=>$direction]);
    }
    public function getAdd()
    {
    	return view('admin.huongnha.them');
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'direction' => 'required|unique:direction,direction',
            ],
            [
                'direction.required'=>'Bạn chưa điền hướng !',
                'direction.unique'=>'Hướng đã tồn tại !'
            ]);
    	$direction = new Direction;
    	$direction->direction = $request->direction;
    	$direction->save();
    	return redirect('admin/huong-nha/them')->with('message','Thêm thành công');
    }
    public function getEdit($id)
    {
    	$direction = Direction::find($id);
    	return view('admin.huongnha.sua',['direction'=>$direction]);
    }
    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                'direction' => 'required'
            ],
            [
                'direction.required'=>'Bạn chưa điền hướng !',
            ]);
    	$direction = Direction::find($id);
    	$direction->direction = $request->direction;
    	$direction->save();
        return redirect('admin/huong-nha/danh-sach')->with('message','Sửa thành công');
    }
    public function getDelete($id)
    {
    	$direction = Direction::find($id);
    	$direction->delete();
    	return redirect('admin/huong-nha/danh-sach')->with('message','Xóa thành công');
    }
}

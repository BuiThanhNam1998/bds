<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bedroom_Number;

class BedroomNumberController extends Controller
{
    public function getList()
    {
    	$bedroom_number = Bedroom_Number::paginate(5);
    	return view('admin.sophongngu.danhsach',['bedroom_number'=>$bedroom_number]); 
    }
    public function getAdd()
    {
    	return view('admin.sophongngu.them');
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'number' => 'required|numeric|unique:bedroom_number,number',
               
            ],
            [
                'number.required' => 'Bạn chưa điền',
                'number.numeric' => 'Bạn phải điền vào số',
                'number.unique' => 'Số phòng ngủ đã tồn tại',
            ]);
    	$bedroom_number = new Bedroom_Number;
    	$bedroom_number->number = $request->number;
    	$bedroom_number->save();
    	return redirect('admin/so-phong-ngu/them')->with('message','Thêm thành công');
    }
    public function getEdit($id)
    {
    	$bedroom_number = Bedroom_Number::find($id);
    	return view('admin.sophongngu.sua',['bedroom_number'=>$bedroom_number]);
    }
    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                'number' => 'required',
                'number' => 'numeric'
               
            ],
            [
                'number.required'=>'Bạn chưa điền',
                'number.numeric'=>'Phải điền vào số'
               
            ]);
    	$bedroom_number = Bedroom_Number::find($id);
    	$bedroom_number->number = $request->number;
    	$bedroom_number->save();
    	return redirect('admin/so-phong-ngu/danh-sach')->with('message','Sửa thành công');
    }
    public function getDelete($id)
    {
        $bedroom_number = Bedroom_Number::find($id);
        $bedroom_number->delete();
        return redirect('admin/so-phong-ngu/danh-sach')->with('message','Xóa thành công');
    }
}

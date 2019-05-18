<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\County;

class CountyController extends Controller
{
    public function getList()
    {
    	$county = County::paginate(5);
    	return view('admin.quan.danhsach',['county'=>$county]);
    }
    public function getAdd()
    {
    	return view('admin.quan.them');
    }
    public function postAdd(Request $request)
    {
         $this->validate($request,
            [
                'county' => 'required|unique:county,county',
               
            ],
            [
                'county.required' => 'Bạn chưa điền',
                'county.unique' => 'Phường đã tồn tại'
            ]);
    	$county = new County;
    	$county->county = $request->county;
    	$county->save();
    	return redirect('admin/quan/them')->with('message','Thêm thành công');
    }
    public function getEdit($id)
    {
    	$county = County::find($id);
    	return view('admin.quan.sua',['county'=>$county]);
    }
    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                'county' => 'required|unique:county,county',
               
            ],
            [
                'county.required' => 'Bạn chưa điền',
                'county.unique' => 'Phường đã tồn tại'
            ]);
    	$county = County::find($id);
    	$county->county = $request->county;
    	$county->save();
        return redirect('admin/quan/danh-sach')->with('message','Sửa thành công');

    }
    public function getDelete($id)
    {
    	$county = County::find($id);
    	$county->delete();
    	return redirect('admin/quan/danh-sach')->with('message','Xóa thành công');
    }
}

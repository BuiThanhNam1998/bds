<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guild;
use App\County;

class GuildController extends Controller
{
    public function getList($id)
    {
        $county = County::find($id);
    	$guild = $county->guild;
    	return view('admin.phuong.danhsach',['guild'=>$guild,'county'=>$county]);
    }
    public function getAdd($id)
    {
        $county = County::find($id);
    	return view('admin.phuong.them',['county'=>$county]);
    }
    public function postAdd(Request $request,$id)
    {
        $this->validate($request,
            [
                'guild' => 'required|unique:guild,guild',
               
            ],
            [
                'guild.required' => 'Bạn chưa điền tên phường',
                'guild.unique' => 'Phường đã tồn tại'
            ]);
    	$guild = new Guild;
    	$guild->guild = $request->guild;
        $guild->county_id = $id;
    	$guild->save();
    	return redirect('admin/quan/phuong/them/'.$id)->with('message','Thêm thành công');
    }
    public function getEdit($id,$county_id)
    {
        $county = County::find($county_id);
    	$guild = Guild::find($id);
    	return view('admin.phuong.sua',['guild'=>$guild,'county'=>$county]);
    }
    public function postEdit(Request $request,$id,$county_id)
    {
        $this->validate($request,
            [
                'guild' => 'required|unique:guild,guild',
               
            ],
            [
                'guild.required' => 'Bạn chưa điền tên phường',
                'guild.unique' => 'Phường đã tồn tại'
            ]);
    	$guild = Guild::find($id);
    	$guild->guild = $request->guild;
    	$guild->save();
    	return redirect('admin/quan/phuong/danh-sach/'.$county_id)->with('message','Sửa thành công');
    }
    public function getDelete($id,$county_id)
    {
    	$guild = Guild::find($id);
    	$guild->delete();
    	return redirect('admin/quan/phuong/danh-sach/'.$county_id)->with('message','Xóa thành công');
    }
}

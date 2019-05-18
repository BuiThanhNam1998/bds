<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    public function getList()
    {
    	$area = Area::paginate(5);
    	return view('admin.dientich.danhsach',['area'=>$area]);
    }
    public function getAdd()
    {
    	return view('admin.dientich.them');
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'min' => 'required|numeric',
                'max' => 'required|numeric',
               
            ],
            [
                'min.required' => 'Bạn chưa điền',
                'min.numeric' => 'Bạn chỉ được phép điền số',
                'max.numeric' => 'Bạn chỉ được phép điền số',
            ]);
        $area = new Area;
        $area->min = $request->min;
        $area->max = $request->max;
        $area->save();
        return redirect('admin/dien-tich/them')->with('message','Thêm thành công');
    }
    public function getEdit($id)
    {
    	$area = Area::find($id);
    	return view('admin.dientich.sua',['area'=>$area]);
    }
    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                'min' => 'required|numeric',
                'max' => 'required|numeric',
               
            ],
            [
                'min.required' => 'Bạn chưa điền',
                'min.numeric' => 'Bạn chỉ được phép điền số',
                'max.numeric' => 'Bạn chỉ được phép điền số',
            ]);
        $area = Area::find($id);
        $area->min = $request->min;
        $area->max = $request->max;
        $area->save();
        return redirect('admin/dien-tich/them')->with('message','Thêm thành công');
    }
    public function getDelete($id)
    {
    	$area = Area::find($id);
    	$area->delete();
    	return redirect('admin/dien-tich/danh-sach')->with('message','Xóa thành công');
    }
}

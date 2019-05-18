<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use App\Unit;

class PriceController extends Controller
{
    public function getList()
    {
    	$price = Price::paginate(5);
    	return view('admin.gia.danhsach',['price'=>$price]);
    }
    public function getAdd()
    {
        $unit = Unit::select('id','unit')->get();
    	return view('admin.gia.them',['unit'=>$unit]);
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
                'min.numeric' => 'Bạn chỉ được điền số',
                'max.required' => 'Bạn chưa điền',
                'max.numeric' => 'Bạn chỉ được điền số',
            ]);
    	$price = new Price;
        $price->min = $request->min;
        $price->max = $request->max;
    	$price->unit = $request->unit;
    	$price->save();
    	return redirect('admin/gia/them')->with('message','Thêm thành công');
    }
    public function getEdit($id)
    {
    	$price = Price::find($id);
        $unit = Unit::select('id','unit')->get();
    	return view('admin.gia.sua',['price'=>$price,'unit'=>$unit]);
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
                'min.numeric' => 'Bạn chỉ được điền số',
                'max.required' => 'Bạn chưa điền',
                'max.numeric' => 'Bạn chỉ được điền số',
            ]);
    	$price = Price::find($id);
    	$price->min = $request->min;
        $price->max = $request->max;
        $price->unit = $request->unit;
    	$price->save();
        return redirect('admin/gia/danh-sach')->with('message','Sửa thành công');

    }
    public function getDelete($id)
    {
    	$price = Price::find($id);
    	$price->delete();
    	return redirect('admin/gia/danh-sach')->with('message','Xóa thành công');
    }
}

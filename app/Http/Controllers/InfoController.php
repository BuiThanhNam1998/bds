<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Contact;

class InfoController extends Controller
{
    public function getAbout()
    {
    	$about = About::all();
    	return view('admin.gioithieu.danhsach',['about'=>$about]);
    }
    public function getAboutEdit($id)
    {
        $about = About::find($id);
    	return view('admin.gioithieu.sua',['about'=>$about]);
    }
    public function postAboutEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                'content' => 'required',
            ],
            [
                'content.required'=>'Bạn chưa điền !',
            ]);
    	$about = About::find($id);
        $about->title = $request->title;
    	$about->content = $request->content;
    	$about->save();
    	return redirect('admin/gioi-thieu/')->with('message','Sửa thành công');
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
    public function getContact()
    {
        $contact = Contact::paginate(5);
        return view('admin.contact',['contact'=>$contact]);
    }
}

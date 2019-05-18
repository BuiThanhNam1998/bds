<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slides;

class SlidesController extends Controller
{
   public function getList(){
        $slides = Slides::paginate(5);
        return view("admin.slides.danhsach",['slides'=>$slides]);
    }
    public function getAdd(){
        return view("admin.slides.them");
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required'=>'Bạn chưa điền tên !',
            ]);
        $slide = new Slides;
        $slide->name = $request->name;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $size = $file->getSize();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
                return redirect('admin/slide/them')->with('message','Chỉ chọn file .jpg .png hoặc .jpeg');
            }
            else if($size >= 200000){
                return redirect('admin/slide/them')->with('message','dung lượng file quá lớn !');
            }
            else{
                $name = $file->getClientOriginalName();
                $photo = str_random(4)."_".$name;
                while(file_exists("upload/news".$photo)){
                    $photo = str_random(4)."_".$name;
                }
                $file->move("upload/slide",$photo);
                $slide->photo = $photo;
            }
        }
        else{
            return redirect('admin/slide/them')->with('message','Bạn chưa chọn ảnh');
        }
        $slide->save();
        return redirect('admin/slide/them')->with('message','Thêm thành công !');
    }
    public function getEdit($id){
        $slide = Slides::find($id);
        return view("admin.slides.sua",['slide'=>$slide]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required'=>'Bạn chưa điền tên !', 
            ]);
        $slide = Slides::find($id);
        $slide->name = $request->name;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
                return redirect('admin/slide/sua/'.$id)->with('message','Chỉ chọn file .jpg .png hoặc.jpeg');
            }
            else{
                $name = $file->getClientOriginalName();
                $photo = str_random(4)."_".$name;
                while(file_exists("upload/news".$photo)){
                    $photo = str_random(4)."_".$name;
                }
                $file->move("upload/slide",$photo);
                $slide->photo = $photo;
            }
        }
        else {
            //$slide->photo = "";
        }
        $slide->save();
        return redirect('admin/slide/danh-sach')->with('message','Sửa thành công !');
    }
    public function getDelete($id){
        $slide = Slides::find($id);
        $slide->delete();
        return redirect('admin/slide/danh-sach')->with('message','Xóa thành công !');
    }
}

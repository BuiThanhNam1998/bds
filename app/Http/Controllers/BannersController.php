<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Photo;
use Illuminate\Support\Facades\URL;


class BannersController extends Controller
{
   public function getList(){
        $banners = Banners::paginate(5);
        return view("admin.banners.danhsach",['banners'=>$banners]);
    }
    public function getAdd(){
        return view("admin.banners.them");
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name' => 'required',
                'link' => 'required',
            ],
            [
                'name.required'=>'Bạn chưa điền tên !',
                'link.required'=>'Bạn chưa điền link !',
            ]);
        $banner = new Banners;
        $banner->name = $request->name;
        $banner->link = $request->link;
        if($request->hasFile('photo')){
            // $file = $request->file('photo');
            // $extension = $file->getClientOriginalExtension();
            // $size = $file->getSize();
            // if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
            //     return redirect('admin/banner/them')->with('message','Chỉ chọn file .jpg .png hoặc .jpeg');
            // }
            // else if($size >= 200000){
            //     return redirect('admin/banner/them')->with('message','dung lượng file quá lớn !');
            // }
            // else{
            //     $name = $file->getClientOriginalName();
            //     $photo = str_random(4)."_".$name;
            //     while(file_exists("upload/banner".$photo)){ 
            //         $photo = str_random(4)."_".$name;
            //     }
            //     $file->move("upload/banner",$photo);
            //     $banner->photo = $photo;
            // }
            //foreach($request->file('image') as $image) {
            $image = $request->file('photo');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
     
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            $image->storeAs('public/upload/banner', $fileNameToStore);
            
            $banner->photo = URL::to('/').'/public/storage/upload/banner/'.$fileNameToStore;
            // $image = new Photo;
            // $image->post_id = $id;
            // $image->link = $fileNameToStore; 
            
            // $image->save();
          //}
        }
        else{
            return redirect('admin/banner/them')->with('message','Bạn chưa chọn ảnh');
        }
        $banner->save();
        return redirect('admin/banner/them')->with('message','Thêm thành công !');
    }
    public function getEdit($id){
        $banner = Banners::find($id);
        return view("admin.banners.sua",['banner'=>$banner]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'name' => 'required',
                'link' => 'required',
            ],
            [
                'name.required'=>'Bạn chưa điền tên !', 
                'link.required'=>'Bạn chưa điền link !', 
            ]);
        $banner = Banners::find($id);
        $banner->name = $request->name;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
                return redirect('admin/banner/sua/'.$id)->with('message','Chỉ chọn file .jpg .png hoặc.jpeg');
            }
            else{
                $name = $file->getClientOriginalName();
                $photo = str_random(4)."_".$name;
                while(file_exists("upload/banner".$photo)){
                    $photo = str_random(4)."_".$name;
                }
                $file->move("upload/banner",$photo);
                $banner->photo = $photo;
            }
        }
        else {
            //$banner->photo = "";
        }
        $banner->save();
        return redirect('admin/banner/danh-sach')->with('message','Sửa thành công !');
    }
    public function getDelete($id){
        $banner = Banners::find($id);
        $banner->delete();
        return redirect('admin/banner/danh-sach')->with('message','Xóa thành công !');
    }
}

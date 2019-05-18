<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\News;
use App\Sub_Category;
use Illuminate\Support\Facades\URL;

class NewsController extends Controller
{
   public function getList(){
        $news = News::paginate(5);
        return view("admin.tintuc.danhsach",['news'=>$news]);
    }
    public function getAdd(){
        $sub_category = Sub_Category::all();
        return view("admin.tintuc.them",['sub_category'=>$sub_category]);
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'title' => 'required',
            ],
            [
                'title.required'=>'Bạn chưa điền tiêu đề !',
            ]);
        $news = new News;
        $news->title = $request->title;
        $news->summary = $request->summary;
        $news->content = $request->content;
        $news->category_id = $request->category;
        if($request->status == 1){ 
            $news->status = 1;
        }
        else {
            $news->status = 0;
        }


         if($request->hasFile('image')) {


          $this->validate($request,
          [
              'image' => 'image',
             
          ],
          [
              'image.image' => 'Bạn chỉ được chọn file ảnh',
             
          ]);


            $image = $request->file('image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
     
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            $image->storeAs('public/upload/news', $fileNameToStore);
     
            $link = URL::to('/').'/public/storage/upload/news/'.$fileNameToStore;
            $news->photo  = $link;
        }   
        else{
          $news->photo = URL::to('/').'/public/img/logo.png';
        }


        $news->save();
        return redirect('admin/tin-tuc/them')->with('message','Thêm thành công !');
    }
    public function getEdit($id){
        $news = News::find($id);
        $sub_category = Sub_Category::all();
        return view("admin.tintuc.sua",['news'=>$news,'sub_category'=>$sub_category]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'category' => 'required',
            ],
            [
                'category.required'=>'Bạn chưa điền thể loại !', 
            ]);
        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->category_id = $request->category;
        if($request->status == 1){ 
            $news->status = 1;
        }
        else {
            $news->status = 0;
        }
        $news->save();
        return redirect('admin/tin-tuc/danh-sach')->with('message','Sửa thành công !');
    }
    public function getDelete($id){
        $news = News::find($id);
        $news->delete();
        return redirect('admin/tin-tuc/danh-sach')->with('message','Xóa thành công !');
    }
}

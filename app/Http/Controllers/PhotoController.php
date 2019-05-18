<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Post;
use Illuminate\Support\Facades\URL;

class PhotoController extends Controller
{
    public function getList($id)
    {
        $post = Post::find($id);
    	$photos = Photo::where('post_id',$id)->get();
    	return view('admin.anh.danhsach',['photos'=>$photos,'post'=>$post]);
    }
    public function getAdd($id)
    {
        $post = Post::find($id);
    	return view('admin.anh.them',['post'=>$post]);
    }
    public function postAdd(Request $request,$id)
    {
        if($request->hasFile('image')) {
          foreach($request->file('image') as $image) {
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
     
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            $image->storeAs('public/upload/post', $fileNameToStore);
     
            $image = new Photo;
            $image->post_id = $id;
            $image->link = URL::to('/').'/public/storage/upload/post/'.$fileNameToStore;
            
            $image->save();
          }
          $post = Post::find($id);
          $post->photo = Photo::where('post_id',$id)->first()->link;
          $post->save();
        }   
        else{
          $fileNameToStore = 'noimage.png';
        }
    	return redirect('admin/tin/anh/danh-sach/'.$id)->with('message','Thêm thành công');
    }

    public function getDelete($id,$post_id)
    {
    	$photo = Photo::find($id);
    	$photo->delete();
    	return redirect('admin/tin/anh/danh-sach/'.$post_id)->with('message','Xóa thành công');
    }
}

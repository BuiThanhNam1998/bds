<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\User;

class NotificationController extends Controller
{
    public function getList($id)
    {
    	$user = User::find($id);
        //$notifications = $user->notification; 
    	$notifications = Notification::where('user_id',$user->id)->paginate(2); 
    	return view('admin.thu.danhsach',['notifications'=>$notifications,'user'=>$user]);
    }
    public function getAdd($id)
    {
    	$user = User::find($id);
    	return view('admin.thu.them',['user'=>$user]);
    }
    public function postAdd(Request $request, $id)
    {
    	$notification = new Notification;
    	$notification->title = $request->title;
    	$notification->content = $request->content;
    	$notification->user_id = $id;
    	$notification->save();
    	return redirect('admin/user/thu/danh-sach/'.$id)->with('message','Gửi thành công');
    }
    public function getDelete($id,$user_id)
    {
    	$notification = Notification::find($id);
    	$notification->delete();
    	return redirect('admin/user/thu/danh-sach/'.$user_id)->with('message','Xóa thành công');
    }
    public function getAddAll()
    {
        return view('admin.thu.themtoanbo');
    }
    public function postAddAll(Request $request)
    {
        $users = User::where('role_id','1')->get();
        foreach ($users as $user) {
            $notification = new Notification;
            $notification->title = $request->title;
            $notification->content = $request->content;
            $notification->user_id = $user->id;
            $notification->save();
        }
        return redirect('admin/user/danh-sach/')->with('message','Gửi thành công');
    }
}

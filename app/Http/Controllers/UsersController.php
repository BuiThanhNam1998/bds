<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Admin;

class UsersController extends Controller
{
    public function getList(){
    	$users = User::where('role_id','1')->paginate(5);
    	return view("admin.users.danhsach",['users'=>$users]);
    }
    public function getAdd(){
    	return view("admin.users.them");
    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'name' => 'required',
    			'password' => 'required',
    			'passwordAgain' => 'required|same:password',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'address' => 'required',
    		],
    		[
    			'name.required'=>'Bạn chưa điền tên',
    			'password.required' => 'Bạn chưa điền mật khẩu',
    			'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
    			'passwordAgain.same' => 'Bạn phải nhập giống mật khẩu',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng email',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.numeric' => 'Bạn chỉ được nhập số',
                'address.required' => 'Bạn chưa nhập địa chỉ'
    		]);
    	$user = new User;
    	$user->name = $request->name; 
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        if($request->block=='on'){
            $user->block = 1;
        }
    	$user->save();
    	return redirect('admin/user/them')->with('message','Thêm thành công');
    }
    public function getEdit($id){
        $role = Role::all();
    	$user = User::find($id);
    	return view("admin.users.sua",['user'=>$user,'role'=>$role]);
    }
    public function postEdit(Request $request,$id){
    	$this->validate($request,
    		[
    			'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'address' => 'required',
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng email',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.numeric' => 'Bạn chỉ được nhập số',
                'address.required' => 'Bạn chưa nhập địa chỉ',
    		]);
    	$user = User::find($id);
    	$user->name = $request->name;
        $user->email = $request->email; 
        // if($request->changePassword == "on"){
            // $this->validate($request,
            // [
            //     'password' => 'required',
            //     'passwordAgain' => 'required|same:password'
            // ],
            // [
            //     'password.required' => 'Bạn chưa điền mật khẩu',
            //     'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            //     'passwordAgain.same' => 'Mật khẩu nhập lại không chính xác'
            // ]);
        //     var_dump($request->password);
        //     $user->password = bcrypt($request->password);
        // }
        $user->phone = $request->phone; 
        $user->address = $request->address;
        // if(isset($request->role_id)){
        //     $user->role_id = $request->role_id;
        // }
        if($request->block=='on'){
            $user->block = 1;
        }
    	$user->save();
    	return redirect('admin/user/danh-sach')->with('message','Sửa thành công');
    }
    

    public function getSearch(Request $request){
        $keyWord = $request->keyWord;
        $users = User::where('name','like',"%$keyWord%")->where('role_id','1')->orWhere('email','like',"%$keyWord%")->where('role_id','1')->orWhere('phone','like',"%$keyWord%")->where('role_id','1')->take(30)->paginate();
        return view('admin.timkiem.user',['users'=>$users,'keyWord'=>$keyWord]);
    }
    public function getAddAdmin(){
        return view("admin.users.them");
    }
    public function postAddAdmin(Request $request){
        $this->validate($request,
            [
                'name' => 'required',
                'password' => 'required',
                'passwordAgain' => 'required|same:password',
                'email' => 'required|email',
                'phone' => 'required|numeric',
            ],
            [
                'name.required'=>'Bạn chưa điền tên',
                'password.required' => 'Bạn chưa điền mật khẩu',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Bạn phải nhập giống mật khẩu',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng email',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.numeric' => 'Bạn chỉ được nhập số',
            ]);
        $admin = new Admin;
        $admin->name = $request->name; 
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->phone = $request->phone;
        $admin->role_id = 2;
        if($request->block=='on'){
            $admin->block = 1;
        }
        $admin->save();
        return redirect('admin/user/them-admin')->with('message','Thêm thành công');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Admin;

class AdminsController extends Controller
{
    
    public function getAdminLogin(){
        return view('admin.login');
    }
    public function postAdminLogin(Request $request){
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required'=>'Bạn chưa điền email',
                'email.email'=>'Email bạn nhập không đúng dạng',
                'password.required' => 'Bạn chưa điền mật khẩu',
            ]);
        if(Auth::guard('admins')->attempt(['email'=>$request->email,'password'=>$request->password,'role_id'=>'2'])){
            return redirect('admin/tin/danh-sach');
        }
        else {
            return redirect('admin/login')->with('message','Đăng nhập không thành công');
        }
    }
    public function getAdminLogout(){
        Auth::guard('admins')->logout();
        return redirect('admin/login');
    }
    public function getAdminProfile(){
        $admin = Auth::guard('admins')->user();
        return view('admin.profile',['admin'=>$admin]);
    }
    public function postAdminEdit(Request $request){
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                // 'password' => 'required',
                // 'passwordAgain' => 'required|same:password',
            ],
            [
                'name.required'=>'Bạn chưa nhập tên',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng email',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.numeric' => 'Bạn chỉ được nhập số',
                // 'password.required' => 'Bạn chưa điền mật khẩu',
                // 'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                // 'passwordAgain.same' => 'Bạn phải nhập giống mật khẩu',
            ]);
       
        $admin = Auth::guard('admins')->user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if($request->changeFassword == "on"){
            $this->validate($request,
            [
                'password' => 'required',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'password.required' => 'Please complete password',
                'passwordAgain.required' => 'Please complete password confirm',
                'passwordAgain.same' => 'Not same password'
            ]);
            $admin->password = bcrypt($request->password);
            
        }


        $admin->save();
        return redirect('admin/profile/ho-so')->with('message','Sửa thành công');
    }

    
    public function getAddAdmin(){
        return view("admin.them_admin");
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
        $admin->save();
        return redirect('admin/user/them-admin')->with('message','Thêm thành công');
    }
}

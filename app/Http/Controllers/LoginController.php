<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Type;
use App\News;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function getLogin(){
        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
    	return view('front_end.login',['category'=>$category]);
    }
    public function postLogin(Request $request){
    	 $this->validate($request,
            [
                'phone' => 'required',
                'password' => 'required',
            ],
            [
                'phone.required'=>'Bạn chưa điền số điện thoại',
                'password.required' => 'Bạn chưa điền mật khẩu ',
            ]);
        if(Auth::attempt(['phone'=>$request->phone,'password'=>$request->password], $request->has('remember')))
        {
            return redirect('/');
        }
        else {
            return redirect('login')->with('message','Đăng nhập không thành công');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('login');
    }
    public function getRegister(){
        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
    	return view("front_end.register",['category'=>$category]);
    }
    public function postRegister(Request $request){
    	$this->validate($request,
    		[
    			'name' => 'required',
                'email' => 'required|email|unique:users,email',
                // 'phone' => 'required|min:9|max:11',
    			'address' => 'required',
    			'password' => 'required|min:6',
    			'passwordAgain' => 'required|same:password'
    		],
    		[
                'name.required'=>'Bạn chưa điền tên',
    			'email.unique'=>'Email đã tồn tại, vui lòng điền email khác',
                'email.required'=>'Bạn chưa điền email',
                'email.email'=>'Email của bạn không chính xác',
                // 'phone.required'=>'Bạn chưa điền số điện thoại',
                // 'phone.numeric'=>'Số điện thoại không chính xác',
                // 'phone.min'=>'Số điện thoại phải có ít nhất 9 chữ số',
                // 'phone.max'=>'Số điện thoại có tối đa 11 chữ số',
    			'address.required'=>'Bạn chưa điền địa chỉ',
                'password.required' => 'Bạn chưa điền mật khẩu',
    			'password.min' => 'Mật khẩu phải dài ít nhất 6 kí tự',
    			'passwordAgain.required' => 'Bạn chưa điền lại mật khẩu',
    			'passwordAgain.same' => 'Mật khẩu bạn nhập lại chưa đúng'
    		]);
        $error_phone = '/^\d{9,11}$/';
        if (!preg_match($error_phone, $request->phone )){
            return redirect('register')->with('error_phone','Số điện thoại gồm 9 đến 11 chữ số');
        }
    	$user = new User;
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
    	$user->address = $request->address;
    	$user->password = bcrypt($request->password);
        $user->role_id = 1;
    	$user->block = 0;
    	$user->save();
    	return redirect('log-in')->with('message','Đăng ký thành công');
    }

    public function getForgotPassword(){
        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
        return view("front_end.forgot_password",['category'=>$category]);
    }
    public function postForgotPassword(Request $request){
        $this->validate($request,
            [

                'email' => 'required|email'

            ],
            [

                'email.required'=>'Bạn chưa điền email',
                'email.email'=>'Email của bạn không chính xác',

            ]);
        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
        $email= $request->email;
        $user = User::where('email', '=',$email )->first();


        if($user!= null && $user->id > 0)
        {
            $new_pass = $this->generalNumber(8);
            Mail::send('front_end.reset_pass', array('name'=>$user->name, 'content'=>$new_pass,'category'=>$category), function($message) use ($user){

                $message->to($user->email, $user->name)
                        ->subject('Khởi tạo mật khẩu.');
                $message->from('ngocbx.vmgmedia@gmail.com','MuabannhadattaiHaNoi.com.vn');
            });
            return redirect('forgot-password')->with('message','Đã gửi mật khẩu thành công. Mời bạn kiểm tra trong email.')->with('category',$category);
        }
        else {
            return redirect('forgot-password')->with('message','Email không tồn tại')->with('category',$category);
        }
    }

    private function generalNumber($number){

        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            .'0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, $number) as $k) $rand .= $seed[$k];
        return $rand;
    }

}

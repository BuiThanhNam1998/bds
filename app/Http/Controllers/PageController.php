<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PageController extends Controller
{
    public function getHome(){
        return view('pages.home');
    }
    public function getType($id){
        $type = Type::find($id);
        $news = News::where('idType',$id)->paginate(5);
        return view('pages.type',['type'=>$type,'news'=>$news]);
    }
    public function getDetail($id){
        $news = News::find($id);
        $hotNews = News::where('hot',1)->take(4)->get();
        $relatedNews = News::where('idType',$news->idType)->take(4)->get();
        return view('pages.detail',['news'=>$news,'hotNews'=>$hotNews,'relatedNews'=>$relatedNews]);
    }
    public function getLogin(){
        return view('front_end.login');
    }
    public function postLogin(Request $request){
         $this->validate($request,
            [
                'phone' => 'required',
                'password' => 'required',
            ],
            [
                'phone.required'=>'Please complete phone',
                'password.required' => 'Please complete password',
            ]);
        if(Auth::attempt(['phone'=>$request->phone,'password'=>$request->password])){
            return redirect('home');
        }
        else {
            return redirect('login/1')->with('message','Login unsuccessful');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('login');
    }
    public function getUser(){
        if(Auth::check()){
            return view('pages.user',['user'=>Auth::user()]);
        }
    }
    public function postUser(Request $request){
        $this->validate($request,
            [
                'name' => 'required'
            ],
            [
                'name.required'=>'Please complete name',
            ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        if($request->changePassword == "on"){
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
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('user')->with('message','succeed');
    }
    public function getRegister(){
        return view("pages.register");
    }
    public function postRegister(Request $request){
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'name.required'=>'Please complete name',
                'email.required'=>'Please complete email',
                'password.required' => 'Please complete password',
                'passwordAgain.required' => 'Please complete password confirm',
                'passwordAgain.same' => 'Not same password'
            ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->permission = 0;
        $user->save();
        return redirect('register')->with('message','succeed');
    }
    public function getSearch(Request $request){
        $keyWord = $request->keyWord;
        $news = News::where('title','like',"%$keyWord%")->orWhere('summary','like',"%$keyWord%")->orWhere('content','like',"%$keyWord%")->take(30)->paginate();
        return view('pages.search',['news'=>$news,'keyWord'=>$keyWord]);
    }
}

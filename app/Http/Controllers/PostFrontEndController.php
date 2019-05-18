<?php

namespace App\Http\Controllers;

use Buzz\LaravelGoogleCaptcha\CaptchaFacade;
use Illuminate\Http\Request;
use App\Post;
use App\Area;
use App\Bedroom_Number;
use App\Trade_Category;
use App\Category;
use App\County;
use App\Guild;
use App\Direction;
use App\Price;
use App\User;
use App\Photo; 
use App\Contact;
use App\Notification; 
use App\Unit;
use App\News;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;

class PostFrontEndController extends Controller
{
   public function getPostDetail($id) 
   {
        $post = Post::findBySlug($id);
        $query = '`guild_id` IN (SELECT id FROM `guild` WHERE `county_id`='.$post->guild->county->id.')';
        $post_related = Post::whereRaw($query)->paginate(3);
        $trade_category = Cache::get('trade_category', function () {
            $c=   Trade_Category::all();
            Cache::put('trade_category', $c, 30);
            return $c;
        });
        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });

       $county = Cache::get('county', function () {
           $c=   County::all();
           Cache::put('county', $c, 30);
           return $c;
       });
       $price = Cache::get('price', function () {
           $c=   Price::all();
           Cache::put('price', $c, 30);
           return $c;
       });
       $area = Cache::get('area', function () {
           $c=   Area::all();
           Cache::put('area', $c, 30);
           return $c;
       });
       $bedroom_number = Cache::get('bedroom_number', function () {
           $c=   Bedroom_number::all();
           Cache::put('bedroom_number', $c, 30);
           return $c;
       });
       $direction = Cache::get('direction', function () {
           $c=   Direction::all();
           Cache::put('direction', $c, 30);
           return $c;
       });
       return view('front_end.post_detail',['post'=>$post,'trade_category'=>$trade_category,'category'=>$category,'post_related'=>$post_related,'county'=>$county,'price'=>$price,'area'=>$area,'bedroom_number'=>$bedroom_number,'direction'=>$direction]);
   }
   public function getNewsDetail($id) 
   {
        $news = News::findBySlug($id);
        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });

       $county = Cache::get('county', function () {
           $c=   County::all();
           Cache::put('county', $c, 30);
           return $c;
       });
       $price = Cache::get('price', function () {
           $c=   Price::all();
           Cache::put('price', $c, 30);
           return $c;
       });
       $area = Cache::get('area', function () {
           $c=   Area::all();
           Cache::put('area', $c, 30);
           return $c;
       });
       $bedroom_number = Cache::get('bedroom_number', function () {
           $c=   Bedroom_number::all();
           Cache::put('bedroom_number', $c, 30);
           return $c;
       });
       $direction = Cache::get('direction', function () {
           $c=   Direction::all();
           Cache::put('direction', $c, 30);
           return $c;
       });
       return view('front_end.news_detail',['news'=>$news,'category'=>$category,'county'=>$county,'price'=>$price,'area'=>$area,'bedroom_number'=>$bedroom_number,'direction'=>$direction]);
   }
   public function getAddPost()
   {
        $trade_category = Trade_Category::where('id',1)->orWhere('id',2)->get();
        $county = County::all();
        $direction = Direction::all();
        return view('front_end.post_add1',['trade_category'=>$trade_category,'county'=>$county,'direction'=>$direction]);
   }
   public function postAddPost(Request $request)
   {
        $this->validate($request,
            [
                'title' => 'required|min:5|max:99',
                'content' => 'required|min:5|max:3000',
                'trade_category' => 'numeric',
                'category' => 'numeric',
                'area' => 'required|numeric',
                'unit' => 'numeric',
            ],
            [
                'title.required' => 'Bạn chưa điền tiêu đề',
                'title.min' => 'Tiêu đề phải gồm ít nhất 5 ký tự',
                'title.max' => 'Tiêu đề tối đa 99 ký tự',
                'content.min' => 'Nội dung phải gồm ít nhất 5 ký tự',
                'content.max' => 'Nội dung tối đa 3000 ký tự',
                'content.required' => 'Bạn chưa điền nội dung',
                'trade_category.numeric' => 'Bạn chưa chọn hình thức',
                'category.numeric' => 'Bạn chưa chọn loại',
                'area.required' => 'Bạn chưa điền diện tích',
                'area.numeric' => 'Diện tích phải là một số',
                'unit.numeric' => 'Bạn chưa chọn đơn vị', 
            ]);

//       // Prevent validation error on captcha
//       CaptchaFacade::shouldReceive('verify')
//           ->andReturn(true);
//
//// Provide hidden input for your 'required' validation
//       CaptchaFacade::shouldReceive('display')
//           ->andReturn('<input type="hidden" name="g-recaptcha-response" value="1" />');
//

        $password = "";
        // $unit = Unit::where('id',$request->unit)->value('ratio');
        $post = new Post;
        $unit = Unit::find($request->unit);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->guild_id = $request->guild;
        $post->area_id = $request->area;
        if($request->unit != 1){
          $post->price_id = $request->price*$unit->ratio;
          $post->price_id_max = $request->price*$unit->ratio;
          $post->unit = $unit->unit;
        }
        else{
          $post->price_id = -1;
          $post->price_id_max = -1;
          $post->unit = "Thoả Thuận";
        }

        $post->bedroom_number_id = $request->bedroom_number;
        $post->direction_id = $request->direction;
        $post->start_date = $request->start_date;
        $post->finish_date = $request->finish_date;
        if(Auth::check()){
          $post->user_id = Auth::user()->id;
        }
        else {
          $this->validate($request,
          [
              'name' => 'required|min:3|max:100',
              'email' => 'required|min:5|max:200|email|unique:users,email',
              'address' => 'required|min:5|max:200',
              'phone' => 'unique:users,phone',
               
          ],
          [
              'name.required' => 'Bạn chưa điền tên',
              'name.min' => 'Tên phải gồm ít nhất 3 ký tự',
              'name.max' => 'Tên tối đa 100 ký tự',
              'email.required' => 'Bạn chưa điền email',
              'email.min' => 'Email phải gồm ít nhất 5 ký tự',
              'email.max' => 'Email tối đa 200 ký tự',
              'email.email' => 'Email chưa chính xác',
              'email.unique' => 'Email đã tồn tại',
              'address.required' => 'Bạn chưa điền địa chỉ',
              'address.min' => 'Địa chỉ phải gồm ít nhất 5 ký tự',
              'address.max' => 'Địa chỉ tối đa 200 ký tự',
              'phone.unique' => 'Số điện thoại đã tồn tại',
          ]);
           $error_phone = '/^\d{9,11}$/';
            if (!preg_match($error_phone, $request->phone )){
            return redirect('dang-tin-can-mua')->with('error_phone','Số điện thoại gồm 9 đến 11 chữ số');
          }
          else{
          $user = new User;
          $user->name = $request->name;
          $user->phone = $request->phone;
          $user->email = $request->email;
          $user->address = $request->address;
          $password = str_random(6);
          $user->password = bcrypt($password);
          $user->save();
          $post->user_id = $user->id;

          Mail::send('front_end.reset_pass', array('name'=>$user->name, 'content'=>$password), function($message) use ($user){

                $message->to($user->email, $user->name)
                        ->subject('Khởi tạo mật khẩu.');
                $message->from('ngocbx.vmgmedia@gmail.com','MuabannhadattaiHaNoi.com.vn');
            });
          }
        }
        $post->save();
        if($request->hasFile('image')) {


          $this->validate($request,
          [
             
          ],
          [
             
          ]);

          if(count($request->file('image'))>8){
            return redirect('dang-bai')->with('error_photo','Bạn chỉ được đăng 8 ảnh');
          }
          else{
            foreach($request->file('image') as $image) {
              $filenameWithExt = $image->getClientOriginalName();
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              $extension = $image->getClientOriginalExtension();
       
              $fileNameToStore = $filename.'_'.time().'.'.$extension;
              
              $image->storeAs('public/upload/post', $fileNameToStore);
       
              $image = new Photo;
              $image->post_id = $post->id;
              $image->link = URL::to('/').'/public/storage/upload/post/'.$fileNameToStore;
              
              $image->save();
            }
            if(count($post->photo1)>0){
              $post->photo = Photo::where('post_id',$post->id)->first()->link;
              $post->save();
            }
          }
        }   
        else{
          $post->photo = URL::to('/').'/public/img/logo.png';
          $post->save();
        }
        return redirect('dang-bai')->with('password',$password)->with('message','Đăng thành công');
   }
   public function getAddBuyPost()
    {
        $trade_category = Trade_Category::where('id',3)->orWhere('id',4)->get();
        $user = Auth::user();
        $county = County::all();
        $direction = Direction::all();
        
        return view('front_end.post_add2',['trade_category'=>$trade_category,'county'=>$county,'direction'=>$direction]);
    }
    public function postAddBuyPost(Request $request)
    {
      $this->validate($request,
          [
              'title' => 'required|min:5|max:99',
              'content' => 'required|min:5|max:3000',
              'trade_category' => 'numeric',
              'category' => 'numeric',
              'area' => 'required|numeric',
               
          ],
          [
              'title.required' => 'Bạn chưa điền tiêu đề',
              'title.min' => 'Tiêu đề phải gồm ít nhất 5 ký tự',
              'title.max' => 'Tiêu đề tối đa 99 ký tự',
              'content.required' => 'Bạn chưa điền nội dung',
              'content.min' => 'Nội dung phải gồm ít nhất 5 ký tự',
              'content.max' => 'Nội dung tối đa 99 ký tự',
              'trade_category.numeric' => 'Bạn chưa chọn hình thức',
              'category.numeric' => 'Bạn chưa chọn loại',
              'area.required' => 'Bạn chưa điền diện tích',
              'area.numeric' => 'Diện tích phải là một số',
          ]);
      $password = "";
      if($request->price == -2){
        $post->price_id = $price->min = -1;
        $post->price_id_max = $price->max = -1;
        $post->unit = "Thỏa Thuận";
      }
      else{
        $price = Price::find($request->price);
      }
      $post = new Post;
      $post->title = $request->title;
      $post->content = $request->content;
      $post->category_id = $request->category;
      $post->guild_id = $request->guild;
      $post->area_id = $request->area;
      $post->price_id = $price->min*$price->unit1->ratio;
      $post->price_id_max = $price->max*$price->unit1->ratio;
      $post->unit = $price->unit1->unit;
      $post->vip = 1;
      $post->start_date = $request->start_date;
      $post->finish_date = $request->finish_date;
      $post->photo = URL::to('/').'/public/img/logo.png';
      if(Auth::check()){
        $post->user_id = Auth::user()->id;
      }
      else {
        $this->validate($request,
          [
              'name' => 'required|min:3|max:100',
              'email' => 'required|min:5|max:200|email',
              'address' => 'required|min:5|max:200',
               
          ],
          [
              'name.required' => 'Bạn chưa điền tên',
              'name.min' => 'Tên phải gồm ít nhất 3 ký tự',
              'name.max' => 'Tên tối đa 100 ký tự',
              'email.required' => 'Bạn chưa điền email',
              'email.min' => 'Email phải gồm ít nhất 5 ký tự',
              'email.max' => 'Email tối đa 200 ký tự',
              'email.email' => 'Email chưa chính xác',
              'phone.required' => 'Bạn chưa điền số điện thoại',
              'phone.min' => 'Số điện thoại phải có ít nhất 9 chữ số',
              'phone.max' => 'Số điện thoại phải có ít hơn 13 chữ số',
              'phone.numeric' => 'Số điện thoại không chính xác',
              'address.required' => 'Bạn chưa điền địa chỉ',
              'address.min' => 'Địa chỉ phải gồm ít nhất 5 ký tự',
              'address.max' => 'Địa chỉ tối đa 200 ký tự',
          ]);
        $error_phone = '/^\d{9,11}$/';
        if (!preg_match($error_phone, $request->phone )){
            return redirect('dang-tin-can-mua')->with('error_phone','Số điện thoại gồm 9 đến 11 chữ số');
        }
        else{
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $password = str_random(6);
        $user->password = bcrypt($password);
        $user->save();
        $post->user_id = $user->id;
        Mail::send('front_end.reset_pass', array('name'=>$user->name, 'content'=>$password), function($message) use ($user){

                $message->to($user->email, $user->name)
                        ->subject('Khởi tạo mật khẩu.');
                $message->from('ngocbx.vmgmedia@gmail.com','MuabannhadattaiHaNoi.com.vn');
            });
      }
    }
      $post->save();
      return redirect('dang-tin-can-mua')->with('password',$password)->with('message','Đăng thành công');
  }
  public function getContact()
  {
    $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
        $trade_category = Cache::get('trade_category', function () {
            $c=   Trade_Category::all();
            Cache::put('trade_category', $c, 30);
            return $c;
        });
    return view('front_end.contact',['trade_category'=>$trade_category,'category'=>$category]);
  }
  public function postContact(Request $request)
  {
     $this->validate($request,
          [
              'content' => 'required|min:5|max:3000',
              'phone' => 'numeric|min:9',
              'name' => 'required|min:3|max:100',
              'email' => 'required|email',
          ],
          [
              'content.required' => 'Bạn chưa điền nội dung',
              'content.min' => 'Nội dung từ 5 đến 3000 ký tự',
              'content.max' => 'Nội dung từ 5 đến 3000 ký tự',
              'name.required' => 'Bạn chưa điền tên',
              'name.min' => 'Tên từ 3 đến 100 ký tự',
              'name.max' => 'Tên từ 3 đến 100 ký tự',
              'phone.required' => 'Bạn chưa điền số điện thoại',
              'phone.numeric' => 'Số điện thoại không chính xác',
              'phone.min' => 'Số điện thoại có ít nhất 9 chữ số',
              'email.required' => 'Bạn chưa điền email',
              'email.email' => 'Email bạn điền không chính xác',
          ]);

    $contact = new Contact; 
    $contact->name = $request->name;
    $contact->phone = $request->phone;
    $contact->email = $request->email;
    $contact->content = $request->content;
    $contact->save();
    return redirect('lien-he')->with('message','Gửi thành công');
  }
  public function getEditSellPost($id)
  {
    $post = Post::find($id);
    $county = County::all();
    $guild = Guild::all();
    $direction = Direction::all();
    $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
    $trade_category = Cache::get('trade_category', function () {
            $c=   Trade_Category::all();
            Cache::put('trade_category', $c, 30);
            return $c;
        });
    return view('front_end.post_sell_edit',['trade_category'=>$trade_category,'category'=>$category,'post'=>$post,'guild'=>$guild,'direction'=>$direction,'county'=>$county]);
  }

  public function postEditSellPost(Request $request, $id)
  {
    $this->validate($request,
            [
                'title' => 'required|min:5|max:99',
                'content' => 'required|min:5|max:3000',
                'trade_category' => 'numeric',
                'category' => 'numeric',
                'area' => 'required|numeric',
                'price' => 'required|numeric',
                'unit' => 'numeric',
               
            ],
            [
                'title.required' => 'Bạn chưa điền tiêu đề',
                'title.min' => 'Tiêu đề phải gồm ít nhất 5 ký tự',
                'title.max' => 'Tiêu đề tối đa 99 ký tự',
                'content.min' => 'Nội dung phải gồm ít nhất 5 ký tự',
                'content.max' => 'Nội dung tối đa 3000 ký tự',
                'content.required' => 'Bạn chưa điền nội dung',
                'trade_category.numeric' => 'Bạn chưa chọn hình thức',
                'category.numeric' => 'Bạn chưa chọn loại',
                'area.required' => 'Bạn chưa điền diện tích',
                'area.numeric' => 'Diện tích phải là một số',
                'price.required' => 'Bạn chưa điền giá',
                'price.numeric' => 'Giá phải là một số',
                'unit.numeric' => 'Bạn chưa chọn đơn vị', 
            ]);
        $post = Post::find($id); 
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->guild_id = $request->guild;
        $post->area_id = $request->area;
        $post->price_id = $request->price*$request->unit;
        $post->price_id_max = $request->price*$request->unit;
        $post->bedroom_number_id = $request->bedroom_number;
        $post->start_date = $request->start_date;
        $post->finish_date = $request->finish_date;
        $post->save();

        if($request->hasFile('image')) {
          if(count($request->file('image'))>8){
            return redirect('dang-bai')->with('error_photo','Bạn chỉ được đăng 8 ảnh');
          }
          else{
            foreach($request->file('image') as $image) {
              $filenameWithExt = $image->getClientOriginalName();
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              $extension = $image->getClientOriginalExtension();
       
              $fileNameToStore = $filename.'_'.time().'.'.$extension;
              
              $image->storeAs('public/upload/post', $fileNameToStore);
       
              $image = new Photo;
              $image->post_id = $post->id;
              $image->link = URL::to('/').'/public/storage/upload/post/'.$fileNameToStore;
              
              $image->save();
            }
          }
        }   
        else{
          // $fileNameToStore = 'noimage.png';
        }
        return redirect('dang-bai')->with('message','Đăng thành công');
  }

  public function getPhotoDelete($id,$post_id)
  {
    $photo = Photo::find($id);
    $photo->delete();
    return redirect('sua-tin-rao-ban/'.$post_id);
  }
  public function getSellPostDelete($id)
  {
    $post = Post::find($id);
    $post->delete();
    return redirect('quan-ly-tin-rao-ban')->with('message','Xóa thành công');
  }

  public function getBuyPostDelete($id)
  {
    $post = Post::find($id);
    $post->delete();
    return redirect('quan-ly-tin-can-mua')->with('message','Xóa thành công');
  }

  public function getNotificationList()
  {
   
    $user = Auth::user();
    $mail = Notification::where('user_id',$user->id)->paginate(2);
    return view('front_end.list_notification',['mail'=>$mail,'user'=>$user]);
  }
  public function getNotificationDetail($id)
  {
    $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
    $trade_category = Cache::get('trade_category', function () {
            $c=   Trade_Category::all();
            Cache::put('trade_category', $c, 30);
            return $c;
        });
    $user = Auth::user();
    $mail = Notification::find($id);
    $mail->status = 1;
    $mail->save();
    return view('front_end.notification_detail',['category'=>$category,'trade_category'=>$category,'mail'=>$mail,'user'=>$user]);
  }
  public static function getNotificationDelete($id)
  {
    $mail = Notification::find($id);
    $mail->delete();
    return redirect('thong-bao')->with('message','Xóa thành công');
  }

  public function getEditBuyPost($id)
  {
    $post = Post::find($id);
    $county = County::all();
    $guild = Guild::all();
    $direction = Direction::all();
    $price = Price::all();
    $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
    $trade_category = Cache::get('trade_category', function () {
            $c=   Trade_Category::all();
            Cache::put('trade_category', $c, 30);
            return $c;
        });
    return view('front_end.post_buy_edit',['trade_category'=>$trade_category,'category'=>$category,'post'=>$post,'guild'=>$guild,'direction'=>$direction,'county'=>$county,'price'=>$price]);
  }


  public function postEditBuyPost(Request $request,$id)
    {
      $this->validate($request,
          [
              'title' => 'required|min:5|max:99',
              'content' => 'required|min:5|max:3000',
              'trade_category' => 'numeric',
              'category' => 'numeric',
              'area' => 'required|numeric',
               
          ],
          [
              'title.required' => 'Bạn chưa điền tiêu đề',
              'title.min' => 'Tiêu đề phải gồm ít nhất 5 ký tự',
              'title.max' => 'Tiêu đề tối đa 99 ký tự',
              'content.required' => 'Bạn chưa điền nội dung',
              'content.min' => 'Nội dung phải gồm ít nhất 5 ký tự',
              'content.max' => 'Nội dung tối đa 99 ký tự',
              'trade_category.numeric' => 'Bạn chưa chọn hình thức',
              'category.numeric' => 'Bạn chưa chọn loại',
              'area.required' => 'Bạn chưa điền diện tích',
              'area.numeric' => 'Diện tích phải là một số',
          ]);
      $post = Post::find($id);
      $price = Price::find($request->price);
      $post->title = $request->title;
      $post->content = $request->content;
      $post->category_id = $request->category;
      $post->guild_id = $request->guild;
      $post->area_id = $request->area;
      $post->price_id = $price->min*$price->unit;
      $post->price_id_max = $price->max*$price->unit;
      $post->start_date = $request->start_date;
      $post->finish_date = $request->finish_date;
      $post->save();
      return redirect('sua-tin-can-mua/'.$id)->with('message','Sửa thành công');
  }

}

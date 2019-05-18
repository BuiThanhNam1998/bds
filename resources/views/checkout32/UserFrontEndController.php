<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\User;
use App\Category;
use App\Trade_Category;
use App\County;
use App\Guild;
use App\Direction;
use App\Price;
use App\Photo; 
use App\Post; 
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class UserFrontEndController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();
        return view('front_end.profile',['user'=>$user]);
    }
    public function postProfile(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'address' => 'required',
            ],
            [
                'name.required'=>'Bạn chưa điền tên',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chỉ được nhập email',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.numeric' => 'Bạn chỉ được nhập số',
                'address.required' => 'Bạn chưa nhập địa chỉ'
            ]);
        $user = Auth::user();
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;



        if($request->hasFile('image')) {


          $this->validate($request,
          [
              'image' => 'image',
             
          ],
          [
              'image.image' => 'Bạn chỉ được chọn file ảnh',
             
          ]);
                $image = $request->image;
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
       
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
              
                $image->storeAs('public/upload/avatar', $fileNameToStore);
       
                $user->image = URL::to('/').'/public/storage/upload/avatar/'.$fileNameToStore;
              
        }   
        else{
         
        }

        $user->save();
        return redirect('profile')->with('message','Sửa thành công');
    }
    public function getChangePassword()
    {
        $user = Auth::user();
        return view('front_end.change_password',['trade_category'=>$trade_category,'category'=>$category,'user'=>$user]);
    }
    public function postChangePassword(Request $request)
    {

        $this->validate($request,
            [
                'old_password' => 'required',
                'password' => 'required|min:6',
                'passwordAgain' => 'required|same:password',
            ],
            [
                'password.required' => 'Bạn chưa điền mật khẩu',
                'password.min' => 'Mật khẩu phải dài ít nhất 6 kí tự',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Bạn phải nhập giống mật khẩu',
            ]);
        $user = Auth::user();
        if(Auth::attempt(['password'=>$request->old_password,'email'=>$user->email]))
        {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('thay-doi-mat-khau')->with('message','Thay đổi mật khẩu thành công');
        }
        else {
            return redirect('thay-doi-mat-khau')->with('error_password','Mật khẩu cũ không chính xác');
        }
    }
    public function getListSellPost()
    {
        $user = Auth::user();
        $query = '`category_id` IN (SELECT `id` FROM `category` WHERE `trade_category_id` = 1 OR `trade_category_id` = 2 ) AND `user_id` = '.$user->id;
        $post = Post::whereRaw($query)
                ->orderBy('vip','desc')
                ->paginate(10);
        return view('front_end.list_sell_post',['user'=>$user,'post'=>$post]);
    }
    public function postSearchSellPost(Request $request)
    {
        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
        $user = Auth::user();

        $query = '`status` = 0 AND `user_id` = '.$user->id.' AND `category_id` IN (SELECT `id` FROM `category` WHERE `trade_category_id` = 1 OR `trade_category_id` = 2 ) AND `user_id` = '.$user->id;
        $timestamp1 = strtotime($request->start_date);
        $date1 =date('Y-m-d', $timestamp1);
        $timestamp2 = strtotime($request->finish_date);
        $date2 =date('Y-m-d', $timestamp2);
        if($request->start_date != ""){
            $query = $query.' AND `start_date` >= '. "'".$date1."'";
        }
        if($request->finish_date != ""){
            $query = $query.' AND `finish_date` <= '. "'".$date2."'";
        }
        if($request->vip != -1){
            $query = $query.' AND `vip` = '.$request->vip;
        }
        if($request->status == 1){
            $query = $query.' AND `finish_date` >= NOW()';
        }
        
        $post = Post::whereRaw($query)
                ->orderBy('vip','desc')
                ->paginate(20);
                //var_dump($request->finish_date);
        return view('front_end.list_sell_post',['post'=>$post,'user'=>$user,'category'=>$category]);
    }
    public function postSearchBuyPost(Request $request)
    {
        $category = Cache::get('category', function () {
            $c=   Category::all();
            Cache::put('category', $c, 30);
            return $c;
        });
        $user = Auth::user();

        $query = '`status` = 0 AND `user_id` = '.$user->id.' AND `category_id` IN (SELECT `id` FROM `category` WHERE `trade_category_id` = 3 OR `trade_category_id` = 4 ) AND `user_id` = '.$user->id;
        $timestamp1 = strtotime($request->start_date);
        $date1 =date('Y-m-d', $timestamp1);
        $timestamp2 = strtotime($request->finish_date);
        $date2 =date('Y-m-d', $timestamp2);
        if($request->start_date != ""){
            $query = $query.' AND `start_date` >= '. "'".$date1."'";
        }
        if($request->finish_date != ""){
            $query = $query.' AND `finish_date` <= '. "'".$date2."'";
        }
        if($request->vip != -1){
            $query = $query.' AND `vip` = '.$request->vip;
        }
        if($request->status == 1){
            $query = $query.' AND `finish_date` >= NOW()';
        }
        
        $post = Post::whereRaw($query)
                ->orderBy('vip','desc')
                ->paginate(20);
         return view('front_end.list_sell_post',['post'=>$post,'user'=>$user,'category'=>$category]);
    }
    public function getListBuyPost()
    {
        $user = Auth::user();
        $query = ' `category_id` IN (SELECT `id` FROM `category` WHERE `trade_category_id` = 3 OR `trade_category_id` = 4 ) AND `user_id` = '.$user->id;
        $post = Post::whereRaw($query)
                ->orderBy('vip','desc')
                ->paginate(10);
        return view('front_end.list_buy_post',['trade_category'=>$trade_category,'category'=>$category,'user'=>$user,'post'=>$post]);
    }
    public function getBalance(){
        return view('front_end.balance');
    }
    public function getTransactionHistory(){
        return view('front_end.transaction_history');
    }
    public function getRecharge(){
        return view('checkout32.index');
    }
    public function postRecharge(){
        return view('front_end.login');
    //     include(app_path() . '\checkout\config.php');
    //     include(app_path() . '\checkout\NL_Checkoutv3.php');
    //     $error = '';
    //     if (@$_POST['nlpayment']) {


    //         $nlcheckout = new NL_CheckOutV3(MERCHANT_ID, MERCHANT_PASS, RECEIVER, URL_API);
    //         $total_amount = $_POST['total_amount'];

    //         $array_items[0] = array('item_name1' => 'Product name',
    //             'item_quantity1' => 1,
    //             'item_amount1' => $total_amount,
    //             'item_url1' => 'http://nganluong.vn/');

    //         $array_items = array();
    //         $payment_method = $_POST['option_payment'];
    //         $bank_code = @$_POST['bankcode'];
    //         $order_code = "TESTCHECKOUT32_" . time();

    //         $payment_type = '';
    //         $discount_amount = 0;
    //         $order_description = '';
    //         $tax_amount = 0;
    //         $fee_shipping = 0;
    //         $return_url = URL . 'payment_success.php';
    //         $cancel_url = urlencode(URL . '?orderid=' . $order_code);

    //         $buyer_fullname = $_POST['buyer_fullname'];
    //         $buyer_email = $_POST['buyer_email'];
    //         $buyer_mobile = $_POST['buyer_mobile'];
    //         $card_number = $_POST['card_number'];
    //         $card_fullname = $_POST['card_fullname'];
    //         $card_month = $_POST['card_month'];
    //         $card_year = $_POST['card_year'];
    //         $buyer_address = '';

    //         if ($payment_method != '' && $buyer_email != "" && $buyer_mobile != "" && $buyer_fullname != "" && filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {

    //             if ($payment_method == "ATM_ONLINE" && $bank_code != '') {
    //                 $nl_result = $nlcheckout->BankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $card_number, $card_fullname, $card_month, $card_year);
    //                 if ($nl_result->error_code == '00') {

    //                     if ($nl_result->auth_site != 'NL') {
    //                         //echo $nl_result->auth_site;
    //                         header('Location: ' . (string) $nl_result->auth_url);
    //                         //echo(string) $nl_result->auth_url;
    //                         die();
    //                         //Cập nhât order với token  $nl_result->token để sử dụng check hoàn thành sau này
    //                     } else {
    //                         $_SESSION['auth_url'] = (string) $nl_result->auth_url;
    //                         $_SESSION['token'] = (string) $nl_result->token; 
    //                         header('Location: ' . URL . 'authen.php');
    //                         die();
    //                         // $nl_authen = $nlcheckout->AuthenTransaction($nl_result->token, '123214', $nl_result->auth_url);
    //                         // var_dump($nl_authen);
    //                     } 
    //                 } else {
    //                    // $error = $nl_result->error_message;
    //                     $error = $nl_result->description;
    //                 }
    //             } else {
    //                 $error = "Bạn chưa chọn Ngân hàng";
    //             }
    //         } else {
    //             $error = "Bạn chưa nhập đủ thông tin khách hàng";
    //         }
    //     }
    }
}

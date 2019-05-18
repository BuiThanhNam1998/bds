<?php 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/page/{id}','AboutFrontEndController@getAbout')->name('about'); 
Route::get('/reset_pass','LoginController@getLogin')->middleware('userLogin'); 
Route::get('forgot-password','LoginController@getForgotPassword')->name('forgot-password'); 
Route::post('forgot-password','LoginController@postForgotPassword')->middleware('userLogin'); 

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::get('verify/{id}', 'PostFrontEndController@verify')
        ->where(['id' => '[0-9]+'])
        ->name('verify');

Route::get('slide',function(){
	return view('front_end.layout.slide'); 
}) ; 
Route::get('cate/{id}','SearchController@getListPostByCategory')->name('danh-muc');  
Route::get('cate-news/{id}','SearchController@getListNewsByCategory')->name('danh-muc-tin-tuc'); 
Route::get('/index', 'SearchController@getSearchAdvanced')->name('index'); 
Route::get('/', 'SearchController@getSearchAdvanced')->name('index');  
Route::get('/post_ads', 'AdsController@show_post_ads')->name('post_ads')->middleware('userLogin'); 
Route::get('login','LoginController@getLogin')->name('login');
Route::post('login','LoginController@postLogin');
Route::get('logout','LoginController@getLogout');
Route::get('register','LoginController@getRegister')->name('register');
Route::post('register','LoginController@postRegister');
Route::get('tim-kiem-nang-cao','SearchController@getSearchAdvanced')->name('tim-kiem-nang-cao');
Route::post('tim-kiem-nang-cao','SearchController@postSearchAdvanced');
Route::get('chi-tiet-bai-dang/{id}','PostFrontEndController@getPostDetail')->name('post_detail'); 
Route::get('chi-tiet-tin-tuc/{id}','PostFrontEndController@getNewsDetail')->name('news_detail'); 
Route::get('dang-bai','PostFrontEndController@getAddPost')->name('post_add'); 
Route::post('dang-bai','PostFrontEndController@postAddPost');
Route::get('ajax/category/{idTradeCategory}','AjaxController@getCategory'); 
Route::get('ajax/unit/{idTradeCategory}','AjaxController@getUnit'); 
Route::get('ajax/price/{idTradeCategory}','AjaxController@getPrice'); 
Route::get('ajax/guild/{idCounty}','AjaxController@getGuild'); 
Route::get('profile','UserFrontEndController@getProfile')->middleware('userLogin');  
Route::post('profile','UserFrontEndController@postProfile')->middleware('userLogin');  
Route::get('thay-doi-mat-khau','UserFrontEndController@getChangePassword')->middleware('userLogin');  
Route::post('thay-doi-mat-khau','UserFrontEndController@postChangePassword')->middleware('userLogin'); 
Route::get('quan-ly-tin-rao-ban','UserFrontEndController@getListSellPost')->middleware('userLogin'); 
Route::get('quan-ly-tin-can-mua','UserFrontEndController@getListBuyPost')->middleware('userLogin');  
Route::post('tim-kiem-tin-rao-ban','UserFrontEndController@postSearchSellPost')->middleware('userLogin'); 
Route::post('tim-kiem-tin-can-mua','UserFrontEndController@postSearchBuyPost')->middleware('userLogin'); 
Route::get('dang-tin-can-mua','PostFrontEndController@getAddBuyPost');  
Route::post('dang-tin-can-mua','PostFrontEndController@postAddBuyPost');  
Route::get('lien-he','PostFrontEndController@getContact')->name('lien-he'); 
Route::post('lien-he','PostFrontEndController@postContact');  
Route::get('sua-tin-rao-ban/{id}','PostFrontEndController@getEditSellPost')->middleware('userLogin'); 
Route::post('sua-tin-rao-ban/{id}','PostFrontEndController@postEditSellPost')->middleware('userLogin'); 
Route::get('tin/anh/xoa/{id}/{post_id}','PostFrontEndController@getPhotoDelete')->middleware('userLogin'); 
Route::get('tin-ban/xoa/{id}','PostFrontEndController@getSellPostDelete')->middleware('userLogin'); 
Route::get('thong-bao','PostFrontEndController@getNotificationList')->middleware('userLogin'); 
Route::get('chi-tiet-thong-bao/{id}','PostFrontEndController@getNotificationDetail')->middleware('userLogin'); 
Route::get('thong-bao/xoa/{id}','PostFrontEndController@getNotificationDelete')->middleware('userLogin'); 
Route::get('sua-tin-can-mua/{id}','PostFrontEndController@getEditBuyPost')->middleware('userLogin'); 
Route::post('sua-tin-can-mua/{id}','PostFrontEndController@postEditBuyPost')->middleware('userLogin'); 
Route::get('tin-mua/xoa/{id}','PostFrontEndController@getBuyPostDelete')->middleware('userLogin'); 
Route::get('thong-tin-so-du','UserFrontEndController@getBalance')->middleware('userLogin'); 
Route::get('lich-su-giao-dich','UserFrontEndController@getTransactionHistory')->middleware('userLogin'); 
Route::get('nap-tien','UserFrontEndController@getRecharge')->middleware('userLogin'); 
Route::post('nap-tien','UserFrontEndController@postRecharge')->middleware('userLogin'); 

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'adminLogin']], function () {
'public\vendor\uniSharp\LaravelFilemanager\Lfm::routes()';});


Route::get('admin/login','AdminsController@getAdminLogin');
Route::post('admin/login','AdminsController@postAdminLogin');
Route::get('admin/logout','AdminsController@getAdminLogout');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::get('/',function(){
		return view('admin.index');
	});
	Route::get('index',function(){
		return view('admin.index');
	});
	Route::group(['prefix'=>'dien-tich'],function(){
		Route::get('danh-sach','AreaController@getList');
		Route::get('them','AreaController@getAdd');
		Route::post('them','AreaController@postAdd');
		Route::get('sua/{id}','AreaController@getEdit');
		Route::post('sua/{id}','AreaController@postEdit');
		Route::get('xoa/{id}','AreaController@getDelete');
	});
	Route::group(['prefix'=>'so-phong-ngu'],function(){
		Route::get('danh-sach','BedroomNumberController@getList');
		Route::get('them','BedroomNumberController@getAdd');
		Route::post('them','BedroomNumberController@postAdd');
		Route::get('sua/{id}','BedroomNumberController@getEdit');
		Route::post('sua/{id}','BedroomNumberController@postEdit');
		Route::get('xoa/{id}','BedroomNumberController@getDelete');
	});
	Route::group(['prefix'=>'gia'],function(){
		Route::get('danh-sach','PriceController@getList');
		Route::get('them','PriceController@getAdd');
		Route::post('them','PriceController@postAdd');
		Route::get('sua/{id}','PriceController@getEdit');
		Route::post('sua/{id}','PriceController@postEdit');
		Route::get('xoa/{id}','PriceController@getDelete');
	});
	Route::group(['prefix'=>'huong-nha'],function(){
		Route::get('danh-sach','DirectionController@getList');
		Route::get('them','DirectionController@getAdd');
		Route::post('them','DirectionController@postAdd');
		Route::get('sua/{id}','DirectionController@getEdit');
		Route::post('sua/{id}','DirectionController@postEdit');
		Route::get('xoa/{id}','DirectionController@getDelete');
	});
	Route::group(['prefix'=>'loai-buon-ban'],function(){
		Route::get('danh-sach','TradeCategoryController@getList');
		Route::get('them','TradeCategoryController@getAdd');
		Route::post('them','TradeCategoryController@postAdd');
		Route::get('sua/{id}','TradeCategoryController@getEdit');
		Route::post('sua/{id}','TradeCategoryController@postEdit');
		Route::get('xoa/{id}','TradeCategoryController@getDelete');
		Route::group(['prefix'=>'loai'],function(){
			Route::get('danh-sach/{id}','CategoryController@getList');
			Route::get('them/{id}','CategoryController@getAdd');
			Route::post('them/{id}','CategoryController@postAdd');
			Route::get('sua/{id}/{trade_category_id}','CategoryController@getEdit');
			Route::post('sua/{id}/{trade_category_id}','CategoryController@postEdit');
			Route::get('xoa/{id}/{trade_category_id}','CategoryController@getDelete');
		});
	});
	Route::group(['prefix'=>'quan'],function(){
		Route::get('danh-sach','CountyController@getList');
		Route::get('them','CountyController@getAdd');
		Route::post('them','CountyController@postAdd');
		Route::get('sua/{id}','CountyController@getEdit');
		Route::post('sua/{id}','CountyController@postEdit');
		Route::get('xoa/{id}','CountyController@getDelete');
		Route::group(['prefix'=>'phuong'],function(){
			Route::get('danh-sach/{id}','GuildController@getList');
			Route::get('them/{id}','GuildController@getAdd');
			Route::post('them/{id}','GuildController@postAdd');
			Route::get('sua/{id}/{county_id}','GuildController@getEdit');
			Route::post('sua/{id}/{county_id}','GuildController@postEdit');
			Route::get('xoa/{id}/{county_id}','GuildController@getDelete');
		});
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('danh-sach','UsersController@getList');
		Route::get('them','UsersController@getAdd'); 
		Route::post('them','UsersController@postAdd');
		Route::get('sua/{id}','UsersController@getEdit');
		Route::post('sua/{id}','UsersController@postEdit');
		Route::group(['prefix'=>'thu'],function(){
			Route::get('danh-sach/{id}','NotificationController@getList');
			Route::get('them/{id}','NotificationController@getAdd');
			Route::post('them/{id}','NotificationController@postAdd');
			Route::get('xoa/{id}/{user_id}','NotificationController@getDelete');
			Route::get('them-toan-bo','NotificationController@getAddAll');
			Route::post('them-toan-bo','NotificationController@postAddAll');
		});
		Route::get('tim-kiem','UsersController@getSearch');
		Route::get('them-admin','AdminsController@getAddAdmin');
		Route::post('them-admin','AdminsController@postAddAdmin');
	});
	Route::group(['prefix'=>'tin'],function(){
		Route::get('danh-sach','PostController@getList');
		Route::get('danh-sach-tin-can-mua','PostController@getListBuyPost');
		Route::get('sua/{id}','PostController@getEdit');
		Route::post('sua/{id}','PostController@postEdit');
		Route::get('sua-tin-can-mua/{id}','PostController@getBuyPostEdit');
		Route::post('sua-tin-can-mua/{id}','PostController@postBuyPostEdit');
		Route::get('xoa/{id}','PostController@getDelete');
		Route::get('tim-kiem','PostController@getSearch');
		Route::get('an/{id}','PostController@getChangeStatus');
		Route::get('an-tin-can-mua/{id}','PostController@getChangeStatusBuyPost');
		Route::group(['prefix'=>'anh'],function(){
			Route::get('danh-sach/{id}','PhotoController@getList');
			Route::get('them/{id}','PhotoController@getAdd');
			Route::post('them/{id}','PhotoController@postAdd');
			Route::get('xoa/{id}/{post_id}','PhotoController@getDelete');
		});
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danh-sach','SlidesController@getList');
		Route::get('them','SlidesController@getAdd');
		Route::post('them','SlidesController@postAdd');
		Route::get('sua/{id}','SlidesController@getEdit');
		Route::post('sua/{id}','SlidesController@postEdit');
		Route::get('xoa/{id}','SlidesController@getDelete');
	});
	Route::group(['prefix'=>'banner'],function(){
		Route::get('danh-sach','BannersController@getList');
		Route::get('them','BannersController@getAdd');
		Route::post('them','BannersController@postAdd');
		Route::get('sua/{id}','BannersController@getEdit');
		Route::post('sua/{id}','BannersController@postEdit');
		Route::get('xoa/{id}','BannersController@getDelete');
	});
	Route::group(['prefix'=>'the-loai-tin-tuc'],function(){
		Route::get('danh-sach','NewsCategoryController@getList');
		Route::get('them','NewsCategoryController@getAdd');
		Route::post('them','NewsCategoryController@postAdd');
		Route::get('sua/{id}','NewsCategoryController@getEdit');
		Route::post('sua/{id}','NewsCategoryController@postEdit');
		Route::get('xoa/{id}','NewsCategoryController@getDelete');
		Route::group(['prefix'=>'the-loai'],function(){
			Route::get('danh-sach/{id}','SubCategoryController@getList');
			Route::get('them/{id}','SubCategoryController@getAdd');
			Route::post('them/{id}','SubCategoryController@postAdd');
			Route::get('sua/{id}/{news_category_id}','SubCategoryController@getEdit');
			Route::post('sua/{id}/{news_category_id}','SubCategoryController@postEdit');
			Route::get('xoa/{id}/{news_category_id}','SubCategoryController@getDelete');
		});
	});
	Route::group(['prefix'=>'tin-tuc'],function(){
		Route::get('danh-sach','NewsController@getList');
		Route::get('them','NewsController@getAdd');
		Route::post('them','NewsController@postAdd');
		Route::get('sua/{id}','NewsController@getEdit');
		Route::post('sua/{id}','NewsController@postEdit');
		Route::get('xoa/{id}','NewsController@getDelete');
	});
	Route::group(['prefix'=>'profile'],function(){
		Route::get('ho-so','AdminsController@getAdminProfile');
		Route::post('sua','AdminsController@postAdminEdit');
	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('category/{idTradeCategory}','AjaxController@getCategory');
		Route::get('guild/{idCounty}','AjaxController@getGuild');
	});
	Route::group(['prefix'=>'gioi-thieu'],function(){
		Route::get('/','InfoController@getAbout');
		Route::get('sua/{id}','InfoController@getAboutEdit');
		Route::post('sua/{id}','InfoController@postAboutEdit');
	});
	Route::get('lien-he','InfoController@getContact');
});

	

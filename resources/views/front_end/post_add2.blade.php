@extends("front_end.layout.layout")
@section('content')

    <!--header start end--> 
    <div class="content-wrap">
      <div class="row">
        
        <div class="container clearfix">
          @if(session('password')!="") 
          <div class="alert alert-success fade in">
            {{"Hệ thống đã tự tạo tài khoản, hãy check mail để lấy mật khẩu"}}
          </div>
        @endif
        @if(count($errors)>0)
          <div class="alert alert-danger fade in">
          @foreach($errors->all() as $err)
            {{$err}}<br>
          @endforeach 
        </div>
        @endif
        
        @if(session('message')) 
        <div class="alert alert-success fade in">
              {{session('message')}}
            </div>
        @endif
        @if(session('error_phone')) 
          <div class="alert alert-danger fade in">
            {{session('error_phone')}}
          </div>
        @endif

          @if(Auth::check())
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 left-menu">
            <div class="trangcanhan">

                @include('front_end.layout.left_bar') 
             
               
<!-- end -->
    </div>
  </div>
  @endif
  <!-- end of left menu -->
  <div id="top-up" class="icon_fixed">
    <a href="#" title=""><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
  </div>
  <div id="messenger" class="icon_fixed">
    <a href="" title=""><span class="fa fa-commenting"></span></a>
  </div>
  <!-- Start main-content -->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 ">
    <div class="post-bg-title">
            <h3><span class="glyphicon glyphicon-edit"></span>ĐĂNG TIN RAO BÁN/CHO THUÊ NHÀ ĐẤT</h3>
            <h6>(Quý vị nhập thông tin nhà đất cần bán hoặc cho thuê vào các mục dưới đây)</h6>

          </div>
  <div class="main-content">
            <ul class="nav nav-tabs nav-justified">
              <li ><a href="dang-bai">Cần bán/Cho thuê</a></li>
              <li class="active"><a href="dang-tin-can-mua">Cần mua/Cần thuê</a></li>
            </ul>

            <div class="tab-content">
            <div id="menu2" class="tab-pane fade in active">
  <form action="dang-tin-can-mua" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <h5>LỊCH ĐĂNG TIN</h5>
  <div class="form-group clearfix ">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label class="control-lable">Ngày bắt đầu</label></div>
    <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
      <input class="form-control" type="date" name="start_date" value="" placeholder="">
    </div>
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label class="control-lable">Ngày kết thúc</label></div>
    <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
      <input class="form-control" type="date" name="finish_date" value="" placeholder="">
    </div>
  </div>

  <h5>THÔNG TIN MÔ TẢ</h5>
  <div class="row thongtin_mota  ">

    <div class="form-group clearfix">
      <label for="tieude" class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">Tiêu đề <span class="red-color">(*)</span> 
      </label>

      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <input class="form-control" type="text" name="title" value="" placeholder="" id="tieude_menu2" onkeydown="textCounter(this, 99)" onkeyup="textCounter(this,'counterchar2',99)">
        <p><small class="p_collapse grey-color"  id="chuthich_tieude"><span class="red-color glyphicon glyphicon-play"></span>Vui lòng điền tiêu để tin đăng của bạn. Tối thiểu là 30 kí tự, tối đa là 90 kí tự</small></p> 
      </div>


      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <input type="text" name="" value="99" id="counterchar2" readonly type="text" name="counterchar" size="3" maxlength="3" value="99" class="counterchar">
      </div>
    
      <label for="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Nội dung đăng tin <small><span class="red-color">(*)</span>Tối đa chỉ 3000 kí tự</small></label>
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <textarea name="content" rows="5" id="noidung_menu2" class="form-control"></textarea>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <lable id="chuthich_noidung" class="control-lable"><small><span class="red-color glyphicon glyphicon-play"></span>Giới thiệu chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi: Gần công viên, gần trường học ... Tổng diện tích 52m2, đường đi ô tô vào tận cửa.
        </small></lable>
      </div>

    </div>
    
 </div>
 <h5>THÔNG TIN CƠ BẢN</h5>
 <div class="row thongtin_coban">
   <form action="" class="form-horizotal">
     <div class="form-group clearfix">
       <div  class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Hình thức <span class="red-color">(*)</span></label></div>
       <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
         <select name="trade_category" id="trade_category" class="form-control">
           <option value=null>--Hình thức--</option>
                        @foreach($trade_category as $tc)
                         <option value="{{$tc->id}}">{{$tc->trade_category}}</option>
                        @endforeach
         </select>

       </div>

      <div  class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
        <label for="" class="control-lable">Loại <span class="red-color">(*)</span></label>
      </div>
      <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
        <select name="category" id="category" class="form-control">
          <option value="">--Loại--</option>
        </select>
      </div>
    

     <!-- <div class="form-group clearfix">
       <div class="col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Tỉnh/Thành<span class="red-color">(*)</span></label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
         <select class="form-control">
           <option value="">Hà Nội</option>}
           <option value="">Hải Dương</option>}
           option
         </select>
       </div> -->


      <div class=" col-xs-5 col-sm-5 col-md-2 col-lg-2">
        <label class="control-lable">Quận/Huyện <span class="red-color">(*)</span></label>
      </div>
       <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
        <select class="form-control" name="county" id="county">
          <option value="">--Quận/Huyện--</option>
            @foreach($county as $co)
            <option value="{{$co->id}}">{{$co->county}}</option>
            @endforeach
        </select>
      </div>
     
    
      <div class="  col-xs-5 col-sm-5 col-md-2 col-lg-2">
        <label for="" class="control-lable">Phường/Xã <span class="red-color">(*)</span></label>
      </div>
      <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
        <select class="form-control" name="guild" id="guild">
          <option value="">--Phường/Xã--</option>
        </select>
      </div>


       <!-- <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Đường/Phố</label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
         <select class="form-control">
           <option value="">Hà Nội</option>}
           <option value="">Hải Dương</option>}
           option
         </select>
       </div>
     </div>
     <div class="form-group clearfix">
       <div class="col-sm-2 col-xs-4 col-md-2"><label class="control-lable">Dự án<span class="red-color">(*)</span></label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
         <select class="form-control">
           <option value="">Hà Nội</option>}
           <option value="">Hải Dương</option>}
           option
         </select>
       </div> -->


      <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
        <label for="" class="control-lable">Diện tích <span class="red-color">(*)</span></label>
      </div>
       
        <div class="col-sm-5 col-xs-5 col-md-3 col-lg-3" id="dientich">
         <input class="form-control " type="number" name="area" value="" placeholder="">
       </div>
       <lable class="control-lable col-xs-2 col-sm-2 col-md-1 col-lg-1">  m <sub>2</sub></lable>
   

  
   


    <!--  <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Đơn vị</label></div>
     <div class="col-sm-4 col-xs-8 col-md-4">
       <select class="form-control" name="unit">
        <option value="1">Triệu</option>
        <option value="1000">Tỷ</option>
       </select>
     </div> --> 

     <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Giá<span class="red-color">(*)</span></label></div>
  <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
    <select name="price" id="price" class="form-control">
      <option value="">--Giá--</option>
    </select>
 </div>

   </div>



   <!-- <div class="form-group clearfix">
    <div class=" col-sm-2 col-xs-2 col-md-2"><label for="diachi-menu2" class="control-lable">Địa chỉ <span class="red-color">(*)</span></label></div>
    <div class="col-sm-10 col-xs-10 col-md-10">
      <input  class="form-control" type="text" name="" value="" placeholder="" id="diachi-menu2">
    </div>
  </div> -->
  
  
@if(Auth::check())
<h5>LIÊN HỆ</h5>
<div class="row  ">
  <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">    <label class=" control-lable">Tên liên hệ</label></div>
    <div class="col-xs-7 col-sm-7 col-ms-6 col-lg-6"> <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" ></div>
  </div>
  <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 "><label for="" class="control-lable"> Địa chỉ</label></div>
    <div class="col-xs-7 col-sm-7 col-ms-6 col-lg-6"> <input class="form-control" type="text" name="address" value="{{Auth::user()->address}}" ></div>
  </div>

  <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"> <label for="" class="control-lable"> Di động<span class="red-color">(*)</span></label></div>
    <div class="col-xs-7 col-sm-7 col-ms-6 col-lg-6"> <input class="form-control" type="tel" name="phone" value="{{Auth::user()->phone}}" >
    </div>
  </div>
 <!--  <div class="col-sm-offset-2 col-sm-10"><a href="" title="" class="addTel"><i class=" glyphicon glyphicon-plus "></i>Thêm số điện thoại đăng tin(tối đa 4 số)</a></div>
  <div class="col-sm-offset-2 col-sm-10">Lưu ý: quý khách chỉ có thể đăng tin bằng số điện thoại đã được xác thực. Nếu số điện thoại của quý khách muốn đăng không có trong thông tin tài khoản, vui lòng sử dụng chức năng Thêm số điện thoại đăng tin.</div> -->
  <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label class="control-lable">Email</label></div>
    <div class="col-xs-7 col-sm-7 col-ms-6 col-lg-6">
      <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}" placeholder="">
    </div>

    <!-- <div class="col-sm-4">
      <input type="checkbox" name="" value="">
      <label class="control-lable">Nhận email phản hồi</label>
    </div> -->

  </div>
</div>
@else
<h5>LIÊN HỆ</h5>
<div class="row clearfix form-group ">
  <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">    <label class=" control-lable">Tên liên hệ</label></div>
    <div class="col-xs-7 col-sm-7 col-ms-8 col-lg-8"> <input class="form-control" type="text" name="name" value="" placeholder=""></div>
  </div>
  <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 "><label for="" class="control-lable"> Địa chỉ</label></div>
    <div class="col-xs-7 col-sm-7 col-ms-8 col-lg-8"> <input class="form-control" type="text" name="address" value="" placeholder=""></div>
  </div>
<!-- <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 "><label for="" class="control-lable"> Địa chỉ</label></div>
    <div class="col-xs-7 col-sm-7 col-ms-6 col-lg-6"> <input class="form-control" type="text" name="address" value="" placeholder=""></div>
  </div> -->
  <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 "> <label for="" class="control-lable"> Di động<span class="red-color">(*)</span></label></div>
    <div class="col-xs-7 col-sm-7 col-ms-8 col-lg-8"> <input class="form-control" type="tel" name="phone" value="" placeholder="">
    </div>
  </div>
 <!--  <div class="col-sm-offset-2 col-sm-10"><a href="" title="" class="addTel"><i class=" glyphicon glyphicon-plus "></i>Thêm số điện thoại đăng tin(tối đa 4 số)</a></div>
  <div class="col-sm-offset-2 col-sm-10">Lưu ý: quý khách chỉ có thể đăng tin bằng số điện thoại đã được xác thực. Nếu số điện thoại của quý khách muốn đăng không có trong thông tin tài khoản, vui lòng sử dụng chức năng Thêm số điện thoại đăng tin.</div> -->
  <div class="clearfix">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label class="control-lable">Email</label></div>
    <div class="col-xs-7 col-sm-7 col-ms-8 col-lg-8">
      <input class="form-control" type="email" name="email" value="" placeholder="">
    </div>

    <!-- <div class="col-sm-4">
      <input type="checkbox" name="" value="">
      <label class="control-lable">Nhận email phản hồi</label>
    </div> -->

  </div>
</div>
@endif



<div class="row">
 <!--  <div class="clearfix recaptcha">

    <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="6LdesWkUAAAAABd19m087TXbNgmMyxndnnAltYLU"></div>
    </form>
    
  </div> -->
  <div class="btn-post clearfix text-center">
     
        <button class=" btn btn-primary " type="submit">Đăng tin</button>

     
     <!--  <div class="col-sm-6">
        <button class=" btn btn-warning" type="button">Xem trước</button>
      </div> -->

    </div>
  <div class="col-md-12">
    <div class="grey-color">
      Nếu gặp bất kỳ khó khăn gì trong việc đăng ký, đăng nhập, đăng tin hay trong việc sử dụng website nói chung, Quý vị hãy liên hệ ngay với chúng tôi theo tổng đài CSKH:<strong> 1900 1881</strong> hoặc email: <strong>hotro@batdongsan.com.vn </strong>để được trợ giúp
    </div>
  </div> 
</div> 
  </form>
</div>







<!-- </div> -->
 
</div>
</div>

</div>
</div>
@if(Auth::check())
@else
<div class=" col-md-3 col-lg-3 right-sidebar">
  
    <h5>Hướng dẫn đăng tin</h5>
    <div class="row">
      <ul>
        <li>Thông tin có dấu <span class="red-color">(*) </span>là bắt buộc.</li>
        <li>Không gộp nhiều bất động sản trong một tin rao.</li>
        <li>Không đăng lại tin đã đăng trên www.batdongsan.com.vn.</li>
        <li>Nên sử dụng trình duyệt FireFox 3.0, IE7 trở lên hoặc Google Chrome để việc đăng tin và truy cập website được thuận lợi.</li>
        <li>Để quá trình đăng tin và duyệt nhanh hơn, xin lưu ý: gõ tiếng việt có dấu và không viết tắt...</li>
      </ul>
    </div>
    <h6 class="green-bold">Bạn có biết nơi rao vặt nhà đất hiệu quả nhất?</h6>
    <p>Với hơn 100 000 lượt truy cập mỗi ngày, Batdongsan.com.vn đã đạt mức tăng trưởng 300% chỉ trong 9 tháng đầu năm 2011 và tiếp tục khẳng định vị thế là nơi rao vặt nhà đất, quảng cáo nhà đất hiệu quả nhất hiện nay. Rao vặt nhà đất trên Batdongsan.com.vn là phương án tối ưu nhất cho nhu cầu bán, cho thuê nhà đất của Quý vị.</p>
  
</div>
@endif
</div> <!--end of row-->
</div>
</div>
</div>
<!-- end of content -->

<!--Back to top & messenger-->


<!--footer start-->
@endsection
@push('scripts')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="public/front_end/js/bootstrap.min.js"></script>
  <script src="public/front_end/js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script src="public/js/owl.carousel.js"></script>
<script type="text/javascript" src="public/front_end/js/script.js"></script>
 <link href="public/front_end/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/front_end/css/management.css">

<!--footer end--> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<script>
function textCounter(field,cnt, maxlimit) {         
  var cntfield = document.getElementById(cnt) 
     if (field.value.length > maxlimit) // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
    // otherwise, update 'characters left' counter
    else
    cntfield.value = maxlimit - field.value.length;
}

// kéo xuống khoảng cách 500px thì xuất hiện nút Top-up
var offset = 500;
// thời gian di trượt 0.75s ( 1000 = 1s )
var duration = 750;
$(function(){
  $(window).scroll(function () {
    if ($(this).scrollTop() > offset)
      $('#top-up').fadeIn(duration);else
    $('#top-up').fadeOut(duration);
  });
  $('#top-up').click(function () {
    $('body,html').animate({scrollTop: 0}, duration);
  });
});
$(document).ready(function(){
  $(".huongdan_up360").click(function(){
    if(document.getElementById("postanh360").style.display=="none"){
      document.getElementById("postanh360").style.display="block";
      document.getElementById("icon-chevron-down").style.transform = 'rotate(180deg)';
      
    }else{
      document.getElementById("postanh360").style.display="none";
      document.getElementById("icon-chevron-down").style.transform = 'rotate(360deg)';

    }

  });
});
$(document).ready(function(){
  $("#tieude_menu1").hover(function(){
    $("#chuthich_tieude").css("display", "block")},function(){
      $("#chuthich_tieude").css("display","none");

    });

  $("#noidung_menu1").hover(function(){
    $("#chuthich_noidung").css("display", "block")},function(){
      $("#chuthich_noidung").css("display","none");

    });
  $("#tieude2").hover(function(){
    $("#chuthich_tieude2").css("display", "block")},function(){
      $("#chuthich_tieude2").css("display","none");

    });
});


$(document).ready(function(){
      $("#trade_category").change(function(){
        var idTradeCategory = $(this).val();
        $.get("ajax/category/"+idTradeCategory,function(data){
          $("#category").html(data);
        })
      });
    });
$(document).ready(function(){
      $("#county").change(function(){
        var idCounty = $(this).val();
        $.get("ajax/guild/"+idCounty,function(data){
          $("#guild").html(data);
        })
      });
    });

$(document).ready(function(){
      $("#trade_category").change(function(){
        var idTradeCategory = $(this).val();
        $.get("ajax/price/"+idTradeCategory,function(data){
          $("#price").html(data);
        })
      }); 
    });
</script>
@endpush

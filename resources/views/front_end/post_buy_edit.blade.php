@extends("front_end.layout.layout")
@section('content')

    <!--header start end--> 
    <div class="content-wrap">
      <div class="row">
          @if(count($errors)>0)
                            <div class="alert alert-danger fade in">
                              @foreach($errors->all() as $err)
                                {{$err}}<br>
                              @endforeach 
                            </div>
                            @endif
                            @if(session('message')) 
                            <div class="alert alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="icon-remove"></i>
                                                  </button>
                                 {{session('message')}}
                                </div>
                            @endif
        <div class="container clearfix">
          @if(Auth::check())
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 left-menu">
            <div class="trangcanhan">

              <div class="thumbnail">
               <h5>TRANG CÁ NHÂN</h5>
               <img src="front_end/images/pet.jpg" alt="..." class="img-circle">
               <div class="caption">
                <h5>{{Auth::user()->name}}</h5>

                <div class="taikhoan clearfix">
                  <p>Tài khoản tin rao: <span>0</span></p><br>
                  <p>Tài khoản ngoài tin rao: <span>0</span></p><br>
                  <p>Tài khoản KM1: <span>0</span></p><br>
                  <p>Tài khoản KM2: <span>0</span></p><br>
                </div>

                <p><a href="#" class="btn btn-primary" role="button">Nạp tiền</a> </p>
              </div>


              <div class="panel-group menu-quanly" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                      <a class=" main-menu">Thay đổi thông tin cá nhân</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul class="nav nav-pills nav-stacked">
                       <li ><a  href="profile">Thay đổi thông tin cá nhân</a></li>
                       <li><a  href="thay-doi-mat-khau">Thay đổi mật khẩu</a></li>
                     </ul>
                   </div>
                 </div>
               </div>
               <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse2" >
                  <h4 class="panel-title">
                    <a class="main-menu">Quản lý tin rao</a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse in">
                  <div class="panel-body">
                   <ul class="nav nav-pills nav-stacked">
                    <li><a href="quan-ly-tin-rao-ban" >Quản lý tin rao bán/cho thuê</a></li>
                    <li><a href="dang-bai" >Đăng tin rao bán/cho thuê</a></li>
                    <li><a href="quan-ly-tin-can-mua" ">Quản lý tin cần mua/cần thuê</a></li>
                    <li class="active"><a href="dang-tin-can-mua">Đăng tin cần mua/cần thuê</a></li>
                    <!-- <li><a href="" ">Quản lý tin nháp</a></li> -->

                  </ul>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                  <a class="main-menu">Quản lý tài chính</a>
                </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked" >
                    <li><a href="#" >Thông tin số dư <span class="badge">new</span> </a></li>
                    <li><a href="#" >Lịch sử giao dịch</a></li>
                    <li><a href="#" >Nhóm khuyến mãi</a></li>
                    <li><a href="#" >Quản lý tài khoản Doanh nghiệp <span class="badge">new</span></a></li>
                    <li><a href="#" >Nạp tiền vào tài khoản</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                  <a  class="main-menu">Tiện ích</a>
                </h4>
              </div>
              <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                 <ul>
                  <li><a href="#" >Thông báo<span class="badge">new</span> </a></li>
                  <li><a href="#" >Quản lý đăng kí nhận email</a></li>
                  <li><a href="#" >Hộp tin nhắn</a></li>
                  <li><a href="#" >Quản lý Chat <span class="badge">new</span></a></li>
                </ul>

              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading"data-toggle="collapse" data-parent="#accordion" href="#collapse5">
              <h4 class="panel-title">
                <a  class="main-menu">Quản lý tài chính</a>
              </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse">
              <div class="panel-body">
                <ul>
                  <li><a href="">Hướng dẫn sử dụng</a></li>
                  <li><a href="">Hướng dẫn thanh toán</a></li>
                  <li><a href="">Báo giá</a></li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>

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
              <li ><a data-toggle="tab" href="#menu1">Cần bán/Cho thuê</a></li>
              <li class="active"><a data-toggle="tab" href="#menu2">Cần mua/Cần thuê</a></li>
            </ul>

            <div class="tab-content">
            <div id="menu2" class="tab-pane fade in active">
  <form action="sua-tin-can-mua/{{$post->id}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <h5>LỊCH ĐĂNG TIN</h5>
  <div class="form-group clearfix ">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label class="control-lable">Ngày bắt đầu</label></div>
    <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
      <input class="form-control" type="date" name="start_date" value="{{$post->start_date}}" placeholder="">
    </div>
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label class="control-lable">Ngày kết thúc</label></div>
    <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
      <input class="form-control" type="date" name="finish_date" value="{{$post->finish_date}}" placeholder="">
    </div>
  </div>

  <h5>THÔNG TIN MÔ TẢ</h5>
  <div class="row thongtin_mota  ">

    <div class="form-group clearfix">
      <label for="tieude" class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">Tiêu đề <span class="red-color">(*)</span> </label>

      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <input class="form-control" type="text" name="title" value="{{$post->title}}" placeholder="" id="tieude_menu2" onkeydown="textCounter(this, 99)" onkeyup="textCounter(this,'counterchar2',99)">
        <p><small class="p_collapse grey-color"  id="chuthich_tieude"><span class="red-color glyphicon glyphicon-play"></span>Vui lòng điền tiêu để tin đăng của bạn. Tối thiểu là 30 kí tự, tối đa là 90 kí tự</small></p> 
      </div>


      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <input type="text" name="" value="99" id="counterchar2" readonly type="text" name="counterchar" size="3" maxlength="3" value="99" class="counterchar">
      </div>
    
      <label for="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Nội dung đăng tin <small><span class="red-color">(*)</span>Tối đa chỉ 3000 kí tự</small></label>
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <textarea name="content" rows="5" id="noidung_menu2" class="form-control">{!!$post->content!!}</textarea>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <p id="chuthich_noidung" class="p_collapse grey-color"><small><span class="red-color glyphicon glyphicon-play"></span>Giới thiệu chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi: Gần công viên, gần trường học ... Tổng diện tích 52m2, đường đi ô tô vào tận cửa.
        </small></p>
      </div>

    </div>
    <!-- <div class="form-group clearfix">
      <div class="col-md-12">
        <label for="">Hình ảnh <small class="grey-color">(Tối đa 5 ảnh. Mỗi ảnh tối đa 2MB)</small></label>
      </div>
      <div class="col-sm-4">
       <div class="inputpic ">
         <label class="  glyphicon glyphicon-picture"></label>
         <input class="" type="file" name="photo" multiple >
         

       </div>
     </div>
     <div class="col-md-12"><small>Đăng ảnh thật nhanh bằng cách kéo và thả ảnh vào khung. Thay đổi vị trí của ảnh bằng cách kéo ảnh vào vị trí mà bạn muốn!</small></div>
   </div>
 -->
 </div>
 <h5>THÔNG TIN CƠ BẢN</h5>
 <div class="row thongtin_coban">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><p><small class="grey-color">Bạn chỉ chọn được thông tin Phường/Xã, Đường/Phố hay Dự án khi chọn 1 Quận/Huyện. Trường hợp bạn chọn nhiều Quận/Huyện thì không được chọn các tiêu chí còn lại.</small></p></div>
   <form action="" class="form-horizotal">
     <div class="form-group clearfix">
       <div  class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Hình thức <span class="red-color">(*)</span></label></div>
       <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
         <select name="trade_category" id="trade_category" class="form-control">
            @foreach($trade_category as $tc)
                <option value="{{$tc->id}}" @if($tc->id==$post->category->trade->id) {{"selected"}} @endif>{{$tc->trade_category}}</option>
                @endforeach
         </select>

       </div>

       <div  class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Loại <span class="red-color">(*)</span></label></div>
       <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
         <select name="category" id="category" class="form-control">
          @foreach($category as $ca)
                          @if($ca->trade_category_id == $post->category->trade->id)
                          <option value="{{$ca->id}}"
                            @if($ca->id == $post->category->id)
                              {{"selected"}}
                            @endif
                          >
                            {{$ca->category}} 
                          </option>
                          @endif
                          @endforeach
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


       <div class=" col-xs-5 col-sm-5 col-md-2 col-lg-2"><label class="control-lable">Quận/Huyện</label></div>
       <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
         <select class="form-control" name="county" id="county">
                         @foreach($county as $co)
                         <option value="{{$co->id}}" @if($co->id==$post->guild->county->id) {{"selected"}} @endif>{{$co->county}}</option>
                         @endforeach
         </select>
       </div>
     
    
       <div class="  col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Phường/Xã <span class="red-color">(*)</span></label></div>
       <div class="col-xs-7 col-sm-7 col-ms-4 col-lg-4">
         <select class="form-control" name="guild" id="guild">
          @foreach($guild as $gu)
                          @if($gu->county_id == $post->guild->county->id)
                          <option value="{{$gu->id}}"
                            @if($gu->id == $post->guild->id)
                              {{"selected"}}
                            @endif
                          >
                            {{$gu->guild}} 
                          </option>
                          @endif
                          @endforeach
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


       <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Diện tích</label></div>
       
        <div class="col-sm-5 col-xs-5 col-md-3 col-lg-3" id="dientich">
         <input class="form-control " type="number" name="area" value="{{$post->area_id}}" placeholder="">
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
    <select name="price" class="form-control">
      <option value="">--Chọn giá--</option>
      @foreach($price as $pr)
      <option value="{{$pr->id}}">{{$pr->min}}-{{$pr->max}} @if($pr->unit==1){{"triệu"}} @else{{"tỷ"}} @endif</option>
      @endforeach
    </select>
 </div>

   </div>



   <!-- <div class="form-group clearfix">
    <div class=" col-sm-2 col-xs-2 col-md-2"><label for="diachi-menu2" class="control-lable">Địa chỉ <span class="red-color">(*)</span></label></div>
    <div class="col-sm-10 col-xs-10 col-md-10">
      <input  class="form-control" type="text" name="" value="" placeholder="" id="diachi-menu2">
    </div>
  </div> -->
  
  

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
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_end/css/management.css')}}">

  <script src="front_end/js/bootstrap.min.js"></script>
  <script src="front_end/js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script src="js/owl.carousel.js"></script> 
<script type="text/javascript" src="js/script.js"></script>
 <link href="front_end/css/style.css" rel="stylesheet">

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
  $("#tieude_menu2").hover(function(){
    $("#chuthich_tieude").css("display", "block")},function(){
      $("#chuthich_tieude").css("display","none");

    });

  $("#noidung_menu2").hover(function(){
    $("#chuthich_noidung").css("display", "block")},function(){
      $("#chuthich_noidung").css("display","none");

    });
  $("#tieude1").hover(function(){
    $("#chuthich_tieude1").css("display", "block")},function(){
      $("#chuthich_tieude1").css("display","none");

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
</script>
@endpush

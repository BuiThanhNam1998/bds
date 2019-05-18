@extends("front_end.layout.layout")
@section('content')

    <!--header start end-->
    <div class="content-wrap">
      <div class="row">

        <div class="container clearfix">
           @if(session('message'))
            <div class="alert alert-success fade in">
                 {{session('message')}}
                </div>
            @endif
             @if(count($errors)>0)
            <div class="alert alert-danger fade in">
              @foreach($errors->all() as $err)
                {{$err}}<br>
              @endforeach
            </div>
            @endif
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 left-menu">

            <div class="trangcanhan">
                @include('front_end.layout.left_bar')
            </div>
  </div>
  <!-- end of left menu -->
  <div id="top-up" class="icon_fixed">
    <a href="#" title=""><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
  </div>
  <div id="messenger" class="icon_fixed">
    <a href="" title=""><span class="fa fa-commenting"></span></a>
  </div>
  <!-- Start main-content -->
  <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 ">
    <div class="main-content tab-content">
      <div id="changeUserInfor" class="tab-pane fade in active">
        <h5>THAY ĐỔI THÔNG TIN CÁ NHÂN</h5>
        <form class="biggest-form" action="profile" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <div class="header-form">Thông tin cá nhân</div>
          <div class="inf-user ">

            <!-- <div class=" form-group clearfix">
              <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Họ và tên <span class="red-color">(*)</span></label></div>
              <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6"><input class="form-control" type="text" name="" value="" placeholder=""></div>
            </div>
            <div class=" form-group clearfix">
              <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Tên thường gọi</label></div>
              <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6"><input class="form-control" type="text" name="" value="" placeholder=""></div>
            </div>
            <div class=" form-group clearfix">
              <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Ngày sinh </label></div>
              <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6"><input class="form-control" type="date" name="" value="" placeholder=""></div>
            </div>
            <div class="form-group clearfix">
              <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Giới tính </label></div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 "><label class="radio-inline">
                <input type="radio" name="optradio">Nam</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 "><label class="radio-inline">
                  <input type="radio" name="optradio">Nữ</div>
                </div>
                <div class="form-group clearfix ">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Địa chỉ </label></div>
                  <div class="form-group col-xs-4 col-sm-3 col-md-3 col-lg-3">
                    <label for="">Tỉnh/Thành phố</label>
                    <select name="city" id="" class="form-control" >
                      <option value="">Hà Nội</option>
                      <option value="">Hải Dương</option>
                      <option value="">Quảng Ninh</option>
                    </select>
                  </div>
                  <div class="form-group col-xs-4 col-sm-3 col-md-3 col-lg-3">
                    <label for="">Tỉnh/Thành phố</label>
                    <select name="city" id="" class="form-control" >
                      <option value="">Hà Nội</option>
                      <option value="">Hải Dương</option>
                      <option value="">Quảng Ninh</option>
                    </select>
                  </div>

                  <div class="col-xs-3"></div>
                  <div class="form-group col-xs-4 col-sm-3 col-md-3 col-lg-3">
                    <label for="">Quận/Huyện</label>
                    <select name="city" id="" class="form-control" >
                      <option value="">Hà Nội</option>
                      <option value="">Hải Dương</option>
                      <option value="">Quảng Ninh</option>
                    </select>
                  </div>
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                  </div>
                  <div class="form-group col-xs-4 col-sm-3 col-md-3 col-lg-3">
                    <label for="">Xã/Thị trấn</label>
                    <select name="city" id="" class="form-control" >
                      <option value="">Hà Nội</option>
                      <option value="">Hải Dương</option>
                      <option value="">Quảng Ninh</option>
                    </select>
                  </div>
                  <div class="col-xs-3"></div>

                  <div class="form-group col-xs-9 col-sm-6 col-md-6 col-lg-6">
                    <label >Địa chỉ</label>
                    <input type="text" name="" value="" placeholder="" class="form-control">
                  </div>

                </div> -->

            <div class=" form-group clearfix">
              <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Tên người dùng <span class="red-color">(*)</span></label></div>
              <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6">
                <input class="form-control" type="text" name="name" value="{{$user->name}}" placeholder="">
              </div>
            </div>
            <div class=" form-group clearfix">
              <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Địa chỉ <span class="red-color">(*)</span></label></div>
              <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6">
                <input class="form-control" type="text" name="address" value="{{$user->address}}" placeholder="">
              </div>
            </div>


                <div class="header-form">Thông tin liên hệ</div>
                <div class="inf-user">

                 <!--  <div class=" form-group clearfix">
                    <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Họ và tên <span class="red-color">(*)</span></label></div>
                    <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6"><input class="form-control" type="text" name="" value="" placeholder=""></div>
                  </div> -->

                  <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a class="addTel" href="" title=""><i class=" glyphicon glyphicon-plus "></i>Thêm số điện thoại đăng tin(tối đa 4 số)</a>
                  </div> -->
                  <div class=" form-group clearfix">
                    <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Số điện thoại <span class="red-color">(*)</span></label></div>
                    <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6"><input class="form-control" type="text" name="phone" value="{{$user->phone}}" placeholder=""></div>
                  </div>

                  <div class=" form-group clearfix">
                    <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Email <span class="red-color">(*)</span></label></div>
                    <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6"><input class="form-control" type="text" name="email" value="{{$user->email}}" placeholder=""></div>
                  </div>

                 <!--  <div class=" form-group clearfix">
                    <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">Facebook</label></div>
                    <div class="col-xs-8 col-sm-9 col-md-6 col-lg-6"><input class="form-control" type="text" name="" value="" placeholder=""></div>
                  </div> -->

                 <!--  <div class="header-form">Avatar</div>
                  <div class="inf-user">
                   <div class=" form-group clearfix">
                    <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 "><label class="control-lable">File ảnh</label></div>
                    <div class="col-xs-8 col-sm-9 col-md-6 col-lg-6"><input class="form-control" type="file" name="" value="" placeholder=""></div>
                  </div> -->

                </div>




                <div class="header-form">Avatar</div>

                  <div class=" form-group clearfix">

                    <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6">
                      <input class="clearfix" type="file" name="image" id="chooseimg">
                    </div>

                    <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6">
                      <img id="image" height="200px" class="clearfix" src="{{$user->image}}" />
                    </div>

                  </div>



                <div class="form-group clearfix">
                  <div class="col-xs-5 col-sm-3 col-md-2 col-lg-2">
                   <input type="submit" name="" value="Lưu lại">
                 </div>
               </div>
             </div>

           </form>


         </div>


</div>
</div>
</div>

</div>
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
  <link href="front_end/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/front_end/css/management.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="front_end/js/bootstrap.min.js"></script>
  <script src="front_end/js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/script.js"></script>

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

<script>
  var file = document.getElementById('chooseimg');
  var img = document.getElementById('image');
  file.addEventListener("change", function() {
    if (this.value) {
      var file = this.files[0];
      var reader = new FileReader();
      reader.onloadend = function () {
        img.src = reader.result;
      };
      reader.readAsDataURL(file);
    }
  });
</script>
@endpush

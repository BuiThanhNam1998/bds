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

              <div class="thumbnail">
               <h5>TRANG CÁ NHÂN</h5>
               <img src="front_end/images/pet.jpg" alt="..." class="img-circle">
               <div class="caption">
                <h5>{{$user->name}}</h5>

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
                       <li><a " href="profile">Thay đổi thông tin cá nhân</a></li>
                       <li><a " href="thay-doi-mat-khau">Thay đổi mật khẩu</a></li>
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
                    <li class="active"><a href="quan-ly-tin-rao-ban" >Quản lý tin rao bán/cho thuê</a></li>
                    <li><a href="dang-bai" >Đăng tin rao bán/cho thuê</a></li>
                    <li><a href="quan-ly-tin-can-mua" ">Quản lý tin cần mua/cần thuê</a></li>
                    <li><a href="dang-tin-can-mua">Đăng tin cần mua/cần thuê</a></li>
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
                    <li><a href="#" data-toggle="pill">Thông tin số dư <span class="badge">new</span> </a></li>
                    <li><a href="#" data-toggle="pill">Lịch sử giao dịch</a></li>
                    <li><a href="#" data-toggle="pill">Nhóm khuyến mãi</a></li>
                    <li><a href="#" data-toggle="pill">Quản lý tài khoản Doanh nghiệp <span class="badge">new</span></a></li>
                    <li><a href="#" data-toggle="pill">Nạp tiền vào tài khoản</a></li>
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
                  <li><a href="#" data-toggle="pill">Thông báo<span class="badge">new</span> </a></li>
                  <li><a href="#" data-toggle="pill">Quản lý đăng kí nhận email</a></li>
                  <li><a href="#" data-toggle="pill">Hộp tin nhắn</a></li>
                  <li><a href="#" data-toggle="pill">Quản lý Chat <span class="badge">new</span></a></li>
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
      
      <div id="managementmail" class="tab-pane fade in active clearfix">

        <h5>THÔNG BÁO</h5>

        
    <div class="table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Tiêu đề</th>
            <th>Ngày</th>
          </tr>
        </thead>
        <tbody>
          @foreach($mail as $ma)
          <tr>
            @if($ma->status == 0)
            <td><b>{{$ma->title}}</b><br><a href="chi-tiet-thong-bao/{{$ma->id}}">Xem</a> <a href="thong-bao/xoa/{{$ma->id}}">Xóa</a></td>
            @else 
            <td>{{$ma->title}}<br><a href="chi-tiet-thong-bao/{{$ma->id}}">Xem</a> <a href="thong-bao/xoa/{{$ma->id}}">Xóa</a></td>
            @endif
            <td>{{$ma->created_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
        {{ $mail->links() }}

    </div>
    <!-- <dl class="clearfix col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <dt>Note</dt>
      <dd>Trong trường hợp Quý khách muốn đăng và quản lý tin rao tiếng Anh, xin vui lòng click vào đây  <a href="" title="">English</a></dd>
    </dl>  -->
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
    if(document.getElementById("mailanh360").style.display=="none"){
      document.getElementById("mailanh360").style.display="block";
      document.getElementById("icon-chevron-down").style.transform = 'rotate(180deg)';
      
    }else{
      document.getElementById("mailanh360").style.display="none";
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

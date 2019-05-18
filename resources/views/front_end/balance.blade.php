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
      
      <div id="managementPost" class="tab-pane fade in active clearfix">

        <h5>THÔNG TIN SỐ DƯ</h5>

    <div class="table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nội dung</th>
            <th>Số dư</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tài khoản</td>
            <td>{{Auth::user()->balance}}</td>
          </tr>
        </tbody>

      </table>
    </div>
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
@endpush

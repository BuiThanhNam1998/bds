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
          @if(Auth::check())
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 left-menu">
            <div class="trangcanhan">

                @include('front_end.layout.left_bar')
              


    </div> 
    <!-- end trang ca nhan -->


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
      <li class="active"><a  href="dang-bai">Cần bán/Cho thuê</a></li>
      <li><a  href="dang-tin-can-mua">Cần mua/Cần thuê</a></li>
    </ul>

    <div class="tab-content">
      <div id="menu1" class="tab-pane fade in active">



        <form action="sua-tin-rao-ban/{{$post->id}}" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <h5>THÔNG TIN CƠ BẢN</h5>
          <div class=" form-group  ">



           <div class=" clearfix">
             <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Tiêu đề <span class="red-color">(*)</span></label></div>
             <div class="col-xs-5 col-sm-5 col-md-8 col-lg-8">
               <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="" id="tieude1" onkeydown="textCounter(this, 99)" onkeyup="textCounter(this,'counterchar1',99)">
               <small id="chuthich_tieude1" class="form-text text-muted p_collapse">Vui lòng nhập tiêu đề tin đăng của bạn. Tối thiểu là 30 kí tự, tối đa là 99 kí tự</small>
             </div>
             <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
               <input type="text" name="" value="99" id="counterchar1" readonly type="text" name="counterchar" size="3" maxlength="3" value="99" class="counterchar">
             </div>

           </div>
           <div class=" clearfix">

             <div  class=" col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Hình thức <span class="red-color">(*)</span></label></div>
             <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
               <select name="trade_category" id="trade_category" class="form-control">
                @foreach($trade_category as $tc)
                <option value="{{$tc->id}}" @if($tc->id==$post->category->trade->id) {{"selected"}} @endif>{{$tc->trade_category}}</option>
                @endforeach
              </select>

            </div>



            <div  class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Loại <span class="red-color">(*)</span></label></div>
            <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
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
                   </div>
                   <div class=" clearfix">

                     <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Quận/Huyện<span class="red-color">(*)</span></label></div>
                     <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
                       <select class="form-control" name="county" id="county">
                         @foreach($county as $co)
                         <option value="{{$co->id}}" @if($co->id==$post->guild->county->id) {{"selected"}} @endif>{{$co->county}}</option>
                         @endforeach
                       </select>
                     </div>
                     



                     <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label class="control-lable">Phường/Xã</label></div>
                     <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
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

                   </div>

                   <!-- <div class=" clearfix">
                     <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Quận/Huyện <span class="red-color">(*)</span></label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                       <select class="form-control">
                         <option value="">Hà Nội</option>}
                         <option value="">Hải Dương</option>}

                       </select>
                     </div>


                     <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Đường/Phố</label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                       <select class="form-control">
                         <option value="">Hà Nội</option>}
                         <option value="">Hải Dương</option>}
                         option
                       </select>
                     </div>
                   </div> -->

                  <!--  <div class=" clearfix">
                     <div class="col-sm-2 col-xs-4 col-md-2"><label class="control-lable">Dự án<span class="red-color">(*)</span></label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                       <select class="form-control">
                         <option value="">Hà Nội</option>}
                         <option value="">Hải Dương</option>}
                         option
                       </select>
                     </div> -->
                     

                   

                     <div class=" clearfix">        

                       <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Giá<span class="red-color">(*)</span></label></div>
                       <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
                         <input class="form-control" type="number" name="price" @if($post->price_id>=1000) value={{($post->price_id)/1000}} @else value={{"value=$post->price_id"}} @endif>
                       </div>


                       <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Đơn vị</label></div>
                       <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
                         <select name="unit" class="form-control">
                          <option value="">--Đơn vị--</option>
                          <option value="1" @if($post->price_id>=1000) {{"selected"}} @endif>triệu </option>
                          <option value="1000" @if($post->price_id>=1000) {{"selected"}} @endif>tỷ</option>
                        </select>
                      </div>
                    </div>
                      <div class=" clearfix">        
                       <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Diện tích (m <sub>2</sub>)</label></div>
                       <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
                        <!-- <div class="col-sm-6 col-xs-6 col-md-6" id="dientich"> -->
                         <input class="form-control " type="number" name="area" value="{{$post->area_id}}" placeholder="">
                         <!-- </div> -->

                       </div>

                     </div>
                <!--  <div class=" clearfix">
                   <div class=" col-sm-2 col-xs-4 col-md-2">
                     <label for="" class="control-lable">Tổng giá tiền</label>
                   </div>
                   <div class="col-sm-4 col-xs-8 col-md-4">
                     <input type="number" class="form-control" name="" value="" placeholder="">
                   </div>

                 </div>
               -->
                 <!-- <div class="  clearfix">
                  <div class=" col-sm-2 col-xs-2 col-md-2"><label for="" class="control-lable">Địa chỉ <span class="red-color">(*)</span></label></div>
                  <div class="col-sm-10 col-xs-10 col-md-10">
                    <input  class="form-control" type="text" name="" value="" placeholder="">
                  </div>
                </div> -->
                <!-- </div> -->
                <!-- </form> -->

                <!--   </form> -->

              </div>
              <!-- </div> -->
              <h5>THÔNG TIN MÔ TẢ</h5>
              <div class=" form-group  ">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><span class="red-color">(*)</span>Tối đa 3000 kí tự</div>
                <div class=" clearfix">
                  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <textarea class="form-control" name="content" rows="5">{!! $post->content !!}</textarea>
                  </div>
                  <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <label class="control-lable" for="information">Giới thiệu chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi: Gần công viên, gần trường học ... Tổng diện tích 52m2, đường đi ô tô vào tận cửa. <span class="red-color">Lưu ý: tin rao chỉ để mệnh giá tiền Việt Nam Đồng.</span></label></div>
                  </div>
                </div>

                  <!-- </form> -->

                  <h5>THÔNG TIN KHÁC</h5>
                  <div class=" form-group ">
                   <!-- <form action="" class="form-horizotal"> -->
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                       Quý vị nên điền đầy đủ thông tin vào các mục dưới đây để tin đăng có hiệu quả hơn
                     </div>
            <!--  <div class=" clearfix">
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Mặt tiền(m)</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4"><input  class="form-control" type="number" name="" value="" placeholder=""></div>
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Đường vào(m)</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4"><input  class="form-control" type="number" name="" value="" placeholder=""></div>
             </div> -->
             <div class=" clearfix">
               <div class=" col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Hướng nhà</label></div>
               <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
                <select class="form-control" name="direction">
                  <option value="">--Hướng nhà--</option>
                  @foreach($direction as $di)
                  <option value="{{$di->id}}" @if($di->id==$post->direction->id) {{"selected"}} @endif >{{$di->direction}}</option>
                  @endforeach
                </select>
              </div>
              <!--  <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Ban công</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4"><input  class="form-control" type="number" name="" value="" placeholder=""></div> -->
             </div>
             <!-- <div class=" clearfix">
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Số tầng</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4 "><input  class="form-control" type="number" name="" value="" placeholder=""></div>


             </div> -->
             <div class=" clearfix">

               <div class=" col-xs-5 col-sm-5 col-md-2 col-lg-2"><label for="" class="control-lable">Số phòng ngủ</label></div>
               <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4"><input  class="form-control" type="number" name="bedroom_number" value="{{$post->bedroom_number_id}}" placeholder=""></div>
              <!--  <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Số toilet</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4 "><input class="form-control" type="number" name="" value="" placeholder=""></div> -->
             </div>

             <!-- <div class=" col-sm-12">
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Nội thất</label></div>
               <div class="col-sm-8 col-xs-8 col-md-8">
                <textarea name="" class="form-control" rows="5"></textarea>
              </div>
            </div> -->
          </div>



        <h5>HÌNH ẢNH</h5>
        <div class="form-group">

         <div>

           <div class=" clearfix">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><label for="" class="control-lable"><br /> Tin rao có ảnh sẽ được xem nhiều hơn gấp 10 lần và được nhiều người gọi gấp 5 lần so với tin rao không có ảnh.<br /> Hãy đăng ảnh để được giao dịch nhanh chóng!</label></div>


             <div class=" clearfix">
               <!-- <div class="inputpic "> -->
                 <!-- <label class="  glyphicon glyphicon-picture"></label> -->
                 <div class="col-xs-6 col-sm-6  col-md-6  col-lg-6 ">
                   <input class="" type="file" name="image[]" multiple="multiple">
                 </div>

<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
  @foreach($post->photo1 as $ph)
  <div class="col-md-4">
    
      <img src="{{$ph->link}}" class="lib">
      <div class="caption text-center"> 
        <div class="btn-group">
                        <a class="btn btn-warning" href="tin/anh/xoa/{{$ph->id}}/{{$post->id}}">Xóa</a>
                      </div>
  </div>
 
</div>
  @endforeach                <!-- </div> -->
               </div>
              <!--  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><p class="green-bold">
                Đăng ảnh thật nhanh bằng cách kéo và thả ảnh vào khung. Thay đổi vị trí của ảnh bằng cách kéo ảnh vào vị trí mà bạn muốn!
              </p></div> -->
            </div>
          </div>

        <!-- <div class="anh360 col-xs-12 col-sm-12 col-md-12 col-lg-12" >
         <div class="header-anh360">
           <div class="huongdan_up360">
             <span class="icon-360">360<sub>o</sub></span>
             <strong>Hướng dẫn đăng ảnh 360 </strong>
           </div>
           
           <div id="postanh360" >
             <p class="green-bold">Batdongsan.com.vn nay đã hỗ trợ đăng và xem ảnh 360° trong tin rao!</p>
             <p>Ảnh 360° được hỗ trợ bao gồm ảnh dạng hình cầu (Photo Sphere) và ảnh toàn cảnh (Panorama). Tin rao có ảnh 360° sẽ được gắn nhãn <span class="icon-360">360<sub>o</sub></span> </p>
             <p class="huongdan">3 BƯỚC ĐƠN GIẢN ĐỂ ĐĂNG ẢNH 360°:</p>
             <ol >
               <li>Chụp ảnh 360° bất động sản của bạn theo một trong các cách sau:
                <ul>
                  <li>Sử dụng thiết bị chụp ảnh 360° chuyên dụng (VD: Samsung Gear 360)</li>
                  <li>Sử dụng điện thoại thông minh có chế độ chụp ảnh toàn cảnh (Panorama).</li>
                  <li>Sử dụng điện thoại thông minh có cài đặt ứng dụng bên thứ 3 (VD: Google Street View hoặc Cardboard Camera)</li>
                </ul>
              </li>
              <li> Tải ảnh lên Batdongsan.com.vn bằng nút đăng ảnh hoặc kéo thả ảnh như thông thường</li>
              <li>  Đánh dấu vào ô  Ảnh 360° để chọn những ảnh bạn muốn hiển thị theo chế độ Ảnh 360°</li>
            </ol>
          </div>
          
        </div>
        <div class="huongdan_up360"><span class="glyphicon glyphicon-chevron-down" id="icon-chevron-down">
        </span><hr>
      </div>

    </div> -->
   <!--  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><label for="inputvideo">Nếu bạn có nhu cầu Upload video, hãy liên hệ với chúng tôi để được hỗ trợ</label></div>
    <div class="col-sm-2">
     <div class="inputvideo clearfix">
       <label class="   glyphicon glyphicon-plus  "></label>
       <input class="" type="file" name="" value="" placeholder="">
      

     </div>
   </div> --> 

 </div>
 
<h5>LỊCH ĐĂNG TIN</h5>
  <div class=" lichdangtin form-group clearfix ">
      {{--<div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4">--}}
          {{--<ul class=" clearfix">--}}
            {{--<li>Loại tin rao</li>--}}
            {{--<li><select name="vip" class="form-control" >--}}
              {{--<option value="">--Chọn loại tin--</option>--}}
              {{--<option value="4">Vip 1</option>--}}
              {{--<option value="3">Vip 2</option>--}}
              {{--<option value="2">Vip 3</option>--}}
              {{--<option value="1">Thường</option>--}} 
            {{--</select></li>--}}
          {{--</ul>--}}
        {{--<!-- <div class="product-unitprice">--}}
          {{--<label  for=""> <strong>Đơn giá</strong></label>--}}
          {{--<span class="green-bold">1234567 đồng/ngày</span>--}}
        {{--</div> -->--}}
      {{--</div>--}}
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div >
          <ul class=" clearfix">
            <li>Ngày bắt đầu</li>
            <li><input class="form-control" type="date" name="start_date" value="{{$post->start_date}}" placeholder=""></li>
          </ul>
        </div>
        <!-- <div class="product-totaldate">
          <label  for=""> <strong>Số ngày</strong></label>
          <span class="green-bold">1234567 đồng/ngày</span>
        </div> -->
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div >
          <ul class=" clearfix">
            <li>Ngày kết thúc</li>
            <li><input class="form-control" type="date" name="finish_date" value="{{$post->finish_date}}" placeholder=""></li>
          </ul>
        </div>

      </div>
    

  </div>
<h5>THÀNH TIỀN</h5>
<div class=" thanhtien form-group clearfix">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <!-- <p class="phidichvu ">
      Phí dịch vụ trừ vào tài khoản: <span class="green-bold">53 nghìn 537 đồng</span>
    </p>
    <p class="tienkhuyenmai">
      Khuyến mại: <span class="green-bold">0 nghìn đồng</span>
    </p>
    <hr>
    - Phí dịch vụ trên chưa bao gồm 10% VAT (5 nghìn 354 đồng)
    <br />
    - Khi thanh toán cho chúng tôi, Quý khách vui lòng thanh toán phí bao gồm VAT là 58 nghìn 891 đồng -->
    <div class="clearfix recaptcha">

      <form action="?" method="POST">
        <div class="g-recaptcha" data-sitekey="your_site_key"></div>
      </form>

    </div>
    <div class="btn-post clearfix text-center">

      <button class=" btn btn-primary " type="submit">Đăng tin</button>


     <!--  <div class="col-sm-6">
        <button class=" btn btn-warning" type="button">Xem trước</button>
      </div> -->

    </div>
    <div class="grey-color clearfix">
      Nếu gặp bất kỳ khó khăn gì trong việc đăng ký, đăng nhập, đăng tin hay trong việc sử dụng website nói chung, Quý vị hãy liên hệ ngay với chúng tôi theo tổng đài CSKH:<strong> 1900 1881</strong> hoặc email: <strong>hotro@batdongsan.com.vn </strong>để được trợ giúp
    </div>
  </div>

</div>
</div>
</form>
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
    <link rel="stylesheet" type="text/css" href="{{asset('public/front_end/css/management.css')}}">

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <!-- <script src="front_end/js/bootstrap.min.js"></script> -->
  <!-- <script src="front_end/js/bootstrap.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<!-- <script src="js/owl.carousel.js"></script>  -->
<!-- <script type="text/javascript" src="js/script.js"></script> -->
 <!-- <link href="front_end/css/style.css" rel="stylesheet"> -->
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

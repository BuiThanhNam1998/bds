@extends("front_end.layout.layout")
@section('content')

  <div class="content-wrap">
      <div class="container">
        <div class="row">
          @if(session('password') != "") 
     <div class="alert alert-success fade in">
                  
                 {{session('password')}}
                </div>
  @endif
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
          <div class="col-md-3 col-sm-4 col-xs-4">
            <div class="trangcanhan">

              <div class="thumbnail">
               <h5>TRANG CÁ NHÂN</h5>
               <img src="front_end/images/car5.jpg" alt="ảnh đại diện" class="img-circle">
               <div class="caption">
                <h5>PHAM THU TRANG</h5>

                <div class="taikhoan">
                  <p>Tài khoản tin rao: <span>0</span></p><br>
                  <p>Tài khoản ngoài tin rao: <span>0</span></p><br>
                  <p>Tài khoản KM1: <span>0</span></p><br>
                  <p>Tài khoản KM2: <span>0</span></p><br>
                </div>

                <p><a href="#" class="btn btn-primary" role="button">Nạp tiền</a> </p>
              </div>
              <div class="menu-quanly">
                <div class="title">
                  <div class="main-menu">Quản lý thông tin cá nhân</div>
                  <ul>
                    <li><a href="page_2.html" >Thay đổi thông tin cá nhân</a></li>
                    <li><a href="thaydoimatkhau.html">Thay đổi mật khẩu</a></li>
                  </ul>
                </div>
                <div class="title">
                  <div class="main-menu">Quản lý tin rao</div>
                  <ul>
                    <li><a href="quanlybanthue.html">Quản lý tin rao bán/cho thuê</a></li>
                    <li><a href="dangtinraoban.html"class="selected">Đăng tin rao bán/cho thuê</a></li>
                    <li><a href="">Quản lý tin cần mua/cần thuê</a></li>
                    <li><a href="">Đăng tin cần mua/cần thuê</a></li>
                    <li><a href="">Quản lý tin nháp</a></li>

                  </ul>
                </div> 

                <div class="title">
                  <div class="main-menu">Quản lý tài chính</div>
                  <ul>
                    <li><a href="">Thông tin số dư <span class="badge">new</span> </a></li>
                    <li><a href="">Lịch sử giao dịch</a></li>
                    <li><a href="">Nhóm khuyến mãi</a></li>
                    <li><a href="">Quản lý tài khoản Doanh nghiệp <span class="badge">new</span></a></li>
                    <li><a href="">Nạp tiền vào tài khoản</a></li>
                  </ul>
                </div>
                <div class="title">
                  <div class="main-menu">Tiện ích</div>
                  <ul>
                    <li><a href="">Thông báo<span class="badge">new</span> </a></li>
                    <li><a href="">Quản lý đăng kí nhận email</a></li>
                    <li><a href="">Hộp tin nhắn</a></li>
                    <li><a href="">Quản lý Chat <span class="badge">new</span></a></li>
                  </ul>

                </div>
                <div class="title">
                  <div class="main-menu">Hướng dẫn & Báo giá</div>
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
        <div id="top-up" class="icon_fixed">
          <a href="#" title=""><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
        </div>
        <div id="messenger" class="icon_fixed">
          <a href="" title=""><span class="fa fa-commenting"></span></a>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-8">

          <div class="post-bg-title">
            <h3><span class="glyphicon glyphicon-edit"></span>ĐĂNG TIN RAO BÁN/CHO THUÊ NHÀ ĐẤT</h3>
            <h6>(Quý vị nhập thông tin nhà đất cần bán hoặc cho thuê vào các mục dưới đây)</h6>

          </div>

          <div class="main-content">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#menu1">Cần bán/Cho thuê</a></li>
              <li><a data-toggle="tab" href="#menu2">Cần mua/Cần thuê</a></li>
            </ul>

            <div class="tab-content">
              <div id="menu1" class="tab-pane fade in active">



                <form action="" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <h5>THÔNG TIN CƠ BẢN</h5>
                <div class="row  ">

                 <div>

                   <div class="form-group clearfix">
                     <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Tiêu đề <span class="red-color">(*)</span></label></div>
                     <div class="col-sm-9 col-xs-8 col-md-9">
                       <input type="text" class="form-control" name="title" value="" placeholder="" id="tieude1">
                     </div>
                     <lable class="control-lable red-color col-sm-1 col-xs-1 col-md-1">99</lable>
                     
                   </div>
                   <div class="col-sm-offset-2 col-sm-9 col-xs-12 col-md-offset-2 col-md-9"><small id="chuthich_tieude1" class="form-text text-muted p_collapse">Vui lòng nhập tiêu đề tin đăng của bạn. Tối thiểu là 30 kí tự, tối đa là 99 kí tự</small></div>
                   <div class="form-group clearfix">
                     <div  class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Hình thức <span class="red-color">(*)</span></label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                       <select name="trade_category" id="trade_category" class="form-control">
                        <option value=null>--Hình thức--</option>
                        @foreach($trade_category as $tc)
                         <option value="{{$tc->id}}">{{$tc->trade_category}}</option>
                        @endforeach
                       </select>

                     </div>
                     
                     <div  class="col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Loại <span class="red-color">(*)</span></label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                       <select name="category" id="category" class="form-control">
                         <option>--Phân mục--</option>
                         <!-- @foreach($category as $ca)
                         <option value="{{$tc->id}}">{{$ca->category}}</option>
                         @endforeach -->
                       </select>
                     </div>
                   </div>
                   
                   <div class="form-group clearfix">
                     <div class="col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Quận/Huyện<span class="red-color">(*)</span></label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                       <select class="form-control" name="county" id="county">
                         <option value="">--Quận/Huyện--</option>
                         @foreach($county as $co)
                         <option value="{{$co->id}}">{{$co->county}}</option>
                         @endforeach
                       </select>
                     </div>
                     
                     
                     <div class=" col-sm-2 col-xs-4 col-md-2"><label class="control-lable">Phường/Xã</label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                       <select class="form-control" name="guild" id="guild">
                        <option value="">--Phường/Xã--</option>
                        <!--  @foreach($guild as $gu)
                         <option value="{{$gu->id}}">{{$gu->guild}}</option>
                         @endforeach -->
                       </select>
                     </div>
                   </div>

                   <!-- <div class="form-group clearfix">
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

                  <!--  <div class="form-group clearfix">
                     <div class="col-sm-2 col-xs-4 col-md-2"><label class="control-lable">Dự án<span class="red-color">(*)</span></label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                       <select class="form-control">
                         <option value="">Hà Nội</option>}
                         <option value="">Hải Dương</option>}
                         option
                       </select>
                     </div> -->
                     
                  <div class="form-group clearfix">
                       
                     <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Diện tích (m <sub>2</sub>)</label></div>
                     <div class="col-sm-4 col-xs-8 col-md-4">
                      <!-- <div class="col-sm-6 col-xs-6 col-md-6" id="dientich"> -->
                       <input class="form-control " type="number" name="area" value="" placeholder="">
                     <!-- </div> -->
                    
                   </div>
                  </div>

                 </div>
                 <div class="form-group clearfix">
                   <div class="col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Giá<span class="red-color">(*)</span></label></div>
                   <div class="col-sm-4 col-xs-8 col-md-4">
                     <input class="form-control" type="number" name="price" value="" placeholder="">
                   </div>


                   <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Đơn vị</label></div>
                   <div class="col-sm-4 col-xs-8 col-md-4">
                     <select name="unit" class="form-control">
                        <option value="">--Đơn vị--</option>
                        <option value="1">triệu</option>
                        <option value="1000">tỷ</option>
                     </select>
                   </div>
                 </div>
                <!--  <div class="form-group clearfix">
                   <div class=" col-sm-2 col-xs-4 col-md-2">
                     <label for="" class="control-lable">Tổng giá tiền</label>
                   </div>
                   <div class="col-sm-4 col-xs-8 col-md-4">
                     <input type="number" class="form-control" name="" value="" placeholder="">
                   </div>

                 </div>
 -->
                 <!-- <div class="form-group  clearfix">
                  <div class=" col-sm-2 col-xs-2 col-md-2"><label for="" class="control-lable">Địa chỉ <span class="red-color">(*)</span></label></div>
                  <div class="col-sm-10 col-xs-10 col-md-10">
                    <input  class="form-control" type="text" name="" value="" placeholder="">
                  </div>
                </div> -->
              </div>
            <!-- </form> -->

              <!--   </form> -->


            <!-- </div> -->
            <h5>THÔNG TIN MÔ TẢ</h5>
            <div class="row  ">
             <div>
              <div class="col-md-12"><span class="red-color">(*)</span>Tối đa 3000 kí tự</div>
              <div class="form-group clearfix">
                <div class="col-sm-8 col-md-8 col-xs-8">
                  <textarea class="form-control" name="content" rows="5"></textarea>
                </div>
                <label class="control-lable col-sm-4 col-xs-4 col-md-4" for="information">Giới thiệu chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi: Gần công viên, gần trường học ... Tổng diện tích 52m2, đường đi ô tô vào tận cửa. <span class="red-color">Lưu ý: tin rao chỉ để mệnh giá tiền Việt Nam Đồng.</span></label>
              </div>

            <!-- </form> -->
          </div>
          <h5>THÔNG TIN KHÁC</h5>
          <div class="row  ">
           <form action="" class="form-horizotal">
             <div class="col-md-12">
               Quý vị nên điền đầy đủ thông tin vào các mục dưới đây để tin đăng có hiệu quả hơn
             </div>
            <!--  <div class="form-group clearfix">
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Mặt tiền(m)</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4"><input  class="form-control" type="number" name="" value="" placeholder=""></div>
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Đường vào(m)</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4"><input  class="form-control" type="number" name="" value="" placeholder=""></div>
             </div> -->
             <div class="form-group clearfix">
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Hướng nhà</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4">
                <select class="form-control" name="direction">
                        <option value="">--Hướng nhà--</option>
                        @foreach($direction as $di)
                        <option value="{{$di->id}}">{{$di->direction}}</option>
                        @endforeach
                </select>
              </div>
              <!--  <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Ban công</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4"><input  class="form-control" type="number" name="" value="" placeholder=""></div> -->
             </div>
             <!-- <div class="form-group clearfix">
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Số tầng</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4 "><input  class="form-control" type="number" name="" value="" placeholder=""></div>


             </div> -->
             <div class="form-group clearfix">

               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Số phòng ngủ</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4"><input  class="form-control" type="number" name="bedroom_number" value="" placeholder=""></div>
              <!--  <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Số toilet</label></div>
               <div class="col-sm-4 col-xs-8 col-md-4 "><input class="form-control" type="number" name="" value="" placeholder=""></div> -->
             </div>

             <!-- <div class="form-group col-sm-12">
               <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Nội thất</label></div>
               <div class="col-sm-8 col-xs-8 col-md-8">
                <textarea name="" class="form-control" rows="5"></textarea>
              </div>
            </div> -->
          </div>
        </div>
        <h5>HÌNH ẢNH VÀ VIDEO</h5>
        <div class="row  ">

         <div>

           <div class="form-group clearfix">
             <div class=" col-sm-8"><label for="" class="control-lable">Tối đa 8 ảnh với tin thường và 16 với tin VIP. Mỗi ảnh tối đa 2MB.<br /> Tin rao có ảnh sẽ được xem nhiều hơn gấp 10 lần và được nhiều người gọi gấp 5 lần so với tin rao không có ảnh.<br /> Hãy đăng ảnh để được giao dịch nhanh chóng!</label></div>


             <div class="col-sm-4 clearfix">
               <!-- <div class="inputpic "> -->
                 <!-- <label class="  glyphicon glyphicon-picture"></label> -->
                 <input class="" type="file" name="image[]" multiple="multiple">


               <!-- </div> -->
             </div>
             <div class="col-md-12"><p class="green-bold">
              Đăng ảnh thật nhanh bằng cách kéo và thả ảnh vào khung. Thay đổi vị trí của ảnh bằng cách kéo ảnh vào vị trí mà bạn muốn!
            </p></div>
          </div>
        </div>

        <div class="anh360 col-md-12" >
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

    </div>
    <div class="col-md-12"><label for="inputvideo">Nếu bạn có nhu cầu Upload video, hãy liên hệ với chúng tôi để được hỗ trợ</label></div>
    <div class="col-sm-2">
     <div class="inputvideo clearfix">
       <label class="   glyphicon glyphicon-plus  "></label>
       <input class="" type="file" name="" value="" placeholder="">
       <!-- <span>Click để tải ảnh <br />hoặc kéo thả ảnh vào đây</span> -->

     </div>
   </div>

 </div>
 <!-- <h5>BẢN ĐỒ</h5>
 <div class="row  ">
  <div class="col-md-12">Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon  tới đúng vị trí của tin rao.
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.874235284112!2d105.7877666492678!3d21.03771758592482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab364e994e1d%3A0x8ecb7a90defec517!2zTmfDtSA4NyBOZ3V54buFbiBQaG9uZyBT4bqvYywgROG7i2NoIFbhu41uZyBI4bqtdSwgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1532281119168" allowfullscreen></iframe>
  Có thể dữ liệu bản đồ không chính xác. Vì vậy nếu có bất kỳ sai sót nào xin bạn hãy báo cho chúng tôi để khắc phục kịp thời.</div>
</div> -->

@if(Auth::check())
<h5>LIÊN HỆ</h5>
<div class="row  ">
  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2">    <label class=" control-lable">Tên liên hệ</label></div>
    <div class="col-sm-10 col-xs-8 col-md-10"> <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" placeholder=""></div>
  </div>
  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2 "><label for="" class="control-lable"> Địa chỉ</label></div>
    <div class="col-sm-10 col-xs-8 col-md-10"> <input class="form-control" type="text" name="address" value="{{Auth::user()->address}}" placeholder=""></div>
  </div>

  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2"> <label for="" class="control-lable"> Di động<span>(*)</span></label></div>
    <div class="col-sm-10 col-xs-8 col-md-10"> <input class="form-control" type="tel" name="phone" value="{{Auth::user()->phone}}" placeholder="">
    </div>
  </div>
  <div class="col-sm-offset-2 col-sm-10"><a href="" title="" class="addTel"><i class=" glyphicon glyphicon-plus "></i>Thêm số điện thoại đăng tin(tối đa 4 số)</a></div>
  <div class="col-sm-offset-2 col-sm-10">Lưu ý: quý khách chỉ có thể đăng tin bằng số điện thoại đã được xác thực. Nếu số điện thoại của quý khách muốn đăng không có trong thông tin tài khoản, vui lòng sử dụng chức năng Thêm số điện thoại đăng tin.</div>
  <div class="form-group clearfix">
    <div class="col-sm-2"><label class="control-lable">Email</label></div>
    <div class="col-sm-6">
      <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}" placeholder="">
    </div>
  </div>
</div>
@else
<h5>LIÊN HỆ</h5>
<div class="row  ">
  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2">    <label class=" control-lable">Tên liên hệ</label></div>
    <div class="col-sm-10 col-xs-8 col-md-10"> <input class="form-control" type="text" name="name" value="" placeholder=""></div>
  </div>
  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2 "><label for="" class="control-lable"> Địa chỉ</label></div>
    <div class="col-sm-10 col-xs-8 col-md-10"> <input class="form-control" type="text" name="address" value="" placeholder=""></div>
  </div>

  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2"> <label for="" class="control-lable"> Di động<span>(*)</span></label></div>
    <div class="col-sm-10 col-xs-8 col-md-10"> <input class="form-control" type="tel" name="phone" value="" placeholder="">
    </div>
  </div>
  <div class="col-sm-offset-2 col-sm-10"><a href="" title="" class="addTel"><i class=" glyphicon glyphicon-plus "></i>Thêm số điện thoại đăng tin(tối đa 4 số)</a></div>
  <div class="col-sm-offset-2 col-sm-10">Lưu ý: quý khách chỉ có thể đăng tin bằng số điện thoại đã được xác thực. Nếu số điện thoại của quý khách muốn đăng không có trong thông tin tài khoản, vui lòng sử dụng chức năng Thêm số điện thoại đăng tin.</div>
  <div class="form-group clearfix">
    <div class="col-sm-2"><label class="control-lable">Email</label></div>
    <div class="col-sm-6">
      <input class="form-control" type="email" name="email" value="" placeholder="">
    </div>
  </div>
</div>
@endif


<h5>LỊCH ĐĂNG TIN</h5>
<div class="row lichdangtin  ">
  <div class="lich">
    <div class="col-sm-4 col-xs-12 col-md-4">
      <div >
        <ul class="form-group clearfix">
          <li>Loại tin rao</li>
          <li><select name="vip" class="form-control" >
            <option value="">--Chọn loại tin--</option>
            <option value="1">Vip</option>
            <option value="0">Thường</option>
          </select></li>
        </ul>
      </div>
      <div class="product-unitprice">
        <label  for=""> <strong>Đơn giá</strong></label>
        <span class="green-bold">1234567 đồng/ngày</span>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12">
      <div >
        <ul class="form-group clearfix">
          <li>Ngày bắt đầu</li>
          <li><input class="form-control" type="date" name="start_date" value="" placeholder=""></li>
        </ul>
      </div>
      <div class="product-totaldate">
        <label  for=""> <strong>Số ngày</strong></label>
        <span class="green-bold">1234567 đồng/ngày</span>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12">
      <div >
        <ul class="form-group clearfix">
          <li>Ngày kết thúc</li>
          <li><input class="form-control" type="date" name="finish_date" value="" placeholder=""></li>
        </ul>
      </div>

    </div>
    <div class="col-sm-12 text1">
      <p><span>Tin thường</span> là loại tin đăng bằng <span class="blue">chữ xanh </span> và <span class="blue">khung xanh</span></p>
    </div>
    <div class="col-sm-12 textsmall">
      <p><span class="  glyphicon glyphicon-info-sign"></span>   Quý khách nên chọn đăng tin Vip để có hiệu quả cao hơn, ví dụ: tin Vip1 có lượt xem trung bình cao hơn <strong>20 lần</strong> so với tin thường</p>
    </div>
  </div>
</div>
<!-- <h5>THÔNG TIN KHUYẾN MẠI</h5>
<div class="row khuyenmai  ">
  <p class="col-md-12">Không có khuyến mại nào trong dịp này</p>
</div> -->
<h5>THÀNH TIỀN</h5>
<div class="row thanhtien">
  <div class="col-md-12">
    <p class="phidichvu ">
      Phí dịch vụ trừ vào tài khoản: <span class="green-bold">53 nghìn 537 đồng</span>
    </p>
    <p class="tienkhuyenmai">
      Khuyến mại: <span class="green-bold">0 nghìn đồng</span>
    </p>
    <hr>
    - Phí dịch vụ trên chưa bao gồm 10% VAT (5 nghìn 354 đồng)
    <br />
    - Khi thanh toán cho chúng tôi, Quý khách vui lòng thanh toán phí bao gồm VAT là 58 nghìn 891 đồng
    <div class="clearfix recaptcha">

      <form action="?" method="POST">
        <div class="g-recaptcha" data-sitekey="6LdesWkUAAAAABd19m087TXbNgmMyxndnnAltYLU"></div>
      </form>

    </div>
    <div class="col-sm-12 btn-post">
      <div class="col-sm-6">  
        <button class=" btn btn-primary" type="submit">Đăng tin</button>

      </div>
      <div class="col-sm-6">
        <button class=" btn btn-warning" type="button">Xem trước</button>
      </div>

    </div>
    <div class="grey-color">
      Nếu gặp bất kỳ khó khăn gì trong việc đăng ký, đăng nhập, đăng tin hay trong việc sử dụng website nói chung, Quý vị hãy liên hệ ngay với chúng tôi theo tổng đài CSKH:<strong> 1900 1881</strong> hoặc email: <strong>hotro@batdongsan.com.vn </strong>để được trợ giúp
    </div>
  </div>
</div>
</form>
</div>







<!-- </div> -->
<div id="menu2" class="tab-pane fade">
  <h5>LỊCH ĐĂNG TIN</h5>
  <div class="row lichdang  ">
    <div class="col-sm-2"><label class="control-lable">Ngày bắt đầu</label></div>
    <div class="col-sm-4"><input class="form-control" type="date" name="" value="" placeholder=""></div>
    <div class="col-sm-2"><label class="control-lable">Ngày kết thúc</label></div>
    <div class="col-sm-4"><input class="form-control" type="date" name="" value="" placeholder=""></div>
  </div>

  <h5>THÔNG TIN MÔ TẢ</h5>
  <div class="row thongtin_mota  ">

    <div class="form-group clearfix">
      <label for="tieude" class="col-md-12">Tiêu đề <span class="red-color">(*)</span> </label>

      <div class="col-md-10">
        <input class="form-control" type="text" name="" value="" placeholder="" id="tieude_menu2">
        <p><small class="p_collapse grey-color"  id="chuthich_tieude"><span class="red-color glyphicon glyphicon-play"></span>Vui lòng điền tiêu để tin đăng của bạn. Tối thiểu là 30 kí tự, tối đa là 90 kí tự</small></p> 
      </div>


      <div class="col-sm-2">
        <label for="tieude" class="control-lable"><small><span class="red-color">88/90</span></small></label>
      </div>
    </div>
    <div class="form-group clearfix">
      <label for="" class="col-md-12">Nội dung đăng tin <small><span class="red-color">(*)</span>Tối đa chỉ 3000 kí tự</small></label>
      <div class="col-md-8">
        <textarea name="" rows="5" id="noidung_menu2" class="form-control"></textarea>
      </div>
      <div class="col-md-4">
        <p id="chuthich_noidung" class="p_collapse grey-color"><small><span class="red-color glyphicon glyphicon-play"></span>Giới thiệu chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi: Gần công viên, gần trường học ... Tổng diện tích 52m2, đường đi ô tô vào tận cửa.
        </small></p>
      </div>

    </div>
    <div class="form-group clearfix">
      <div class="col-md-12">
        <label for="">Hình ảnh <small class="grey-color">(Tối đa 5 ảnh. Mỗi ảnh tối đa 2MB)</small></label>
      </div>
      <div class="col-sm-4">
       <div class="inputpic ">
         <label class="  glyphicon glyphicon-picture"></label>
         <input class="" type="file" name="" value="" placeholder="">
         

       </div>
     </div>
     <div class="col-md-12"><small>Đăng ảnh thật nhanh bằng cách kéo và thả ảnh vào khung. Thay đổi vị trí của ảnh bằng cách kéo ảnh vào vị trí mà bạn muốn!</small></div>
   </div>

 </div>
 <h5>THÔNG TIN CƠ BẢN</h5>
 <div class="row thongtin_coban">
   <div class="col-md-12"><p><small class="grey-color">Bạn chỉ chọn được thông tin Phường/Xã, Đường/Phố hay Dự án khi chọn 1 Quận/Huyện. Trường hợp bạn chọn nhiều Quận/Huyện thì không được chọn các tiêu chí còn lại.</small></p></div>
   <form action="" class="form-horizotal">
     <div class="form-group clearfix">
       <div  class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Hình thức <span class="red-color">(*)</span></label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
         <select name="sle1" id="sle1" class="form-control">
           <option>Nhà bán đất</option>
           <option>Nhà cho thuê</option>
           --Hình thức--
         </select>

       </div>

       <div  class="col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Loại <span class="red-color">(*)</span></label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
         <select name="sle2" id="sle2" class="form-control">
           <option>--Phân mục--</option>}
           option
         </select>
       </div>
     </div>

     <div class="form-group clearfix">
       <div class="col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Tỉnh/Thành<span class="red-color">(*)</span></label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
         <select class="form-control">
           <option value="">Hà Nội</option>}
           <option value="">Hải Dương</option>}
           option
         </select>
       </div>


       <div class=" col-sm-2 col-xs-4 col-md-2"><label class="control-lable">Phường/Xã</label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
         <select class="form-control">
           <option value="">Hà Nội</option>}
           <option value="">Hải Dương</option>}
           option
         </select>
       </div>
     </div>
     <div class="form-group clearfix">
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
     </div>
     <div class="form-group clearfix">
       <div class="col-sm-2 col-xs-4 col-md-2"><label class="control-lable">Dự án<span class="red-color">(*)</span></label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
         <select class="form-control">
           <option value="">Hà Nội</option>}
           <option value="">Hải Dương</option>}
           option
         </select>
       </div>


       <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Diện tích</label></div>
       <div class="col-sm-4 col-xs-8 col-md-4">
        <div class="col-sm-6 col-xs-6 col-md-6" id="dientich">
         <input class="form-control " type="number" name="" value="" placeholder="">
       </div>
       <lable class="control-lable col-sm-6 col-xs-6 col-md-6">  m <sub>2</sub></lable>
     </div>

   </div>
   <div class="form-group clearfix">



     <div class=" col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Đơn vị</label></div>
     <div class="col-sm-4 col-xs-8 col-md-4">
       <select class="form-control">

       </select>
     </div>

   </div>


   <div class="form-group clearfix">
    <div class=" col-sm-2 col-xs-2 col-md-2"><label for="diachi-menu2" class="control-lable">Địa chỉ <span class="red-color">(*)</span></label></div>
    <div class="col-sm-10 col-xs-10 col-md-10">
      <input  class="form-control" type="text" name="" value="" placeholder="" id="diachi-menu2">
    </div>
  </div>
  
  <div class="col-sm-2 col-xs-4 col-md-2"><label for="" class="control-lable">Giá<span class="red-color">(*)</span></label></div>
  <div class="col-sm-4 col-xs-8 col-md-4">
   <select name="" class="form-control">
     <option value="">5tr-10tr</option>

   </select>
 </div>
</form>
</div>
<h5>LIÊN HỆ</h5>
<div class="row  ">
  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2">    <label class=" control-lable">Tên liên hệ</label></div>
    <div class="col-sm-6 col-xs-8 col-md-6"> <input class="form-control" type="text" name="" value="" placeholder=""></div>
  </div>
  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2 "><label for="" class="control-lable"> Địa chỉ</label></div>
    <div class="col-sm-6 col-xs-8 col-md-6"> <input class="form-control" type="text" name="" value="" placeholder=""></div>
  </div>

  <div class="form-group clearfix">
    <div class="col-sm-2 col-xs-4 col-md-2"> <label for="" class="control-lable"> Di động<span>(*)</span></label></div>
    <div class="col-sm-6 col-xs-8 col-md-6"> <input class="form-control" type="tel" name="" value="" placeholder="">
    </div>
  </div>
  <div class="col-sm-offset-2 col-sm-10"><a href="" title="" class="addTel"><i class=" glyphicon glyphicon-plus "></i>Thêm số điện thoại đăng tin(tối đa 4 số)</a></div>
  <div class="col-sm-offset-2 col-sm-10">Lưu ý: quý khách chỉ có thể đăng tin bằng số điện thoại đã được xác thực. Nếu số điện thoại của quý khách muốn đăng không có trong thông tin tài khoản, vui lòng sử dụng chức năng Thêm số điện thoại đăng tin.</div>
  <div class="form-group clearfix">
    <div class="col-sm-2"><label class="control-lable">Email</label></div>
    <div class="col-sm-6">
      <input class="form-control" type="email" name="" value="" placeholder="">
    </div>
    <div class="col-sm-4">
      <input type="checkbox" name="" value="">
      <label class="control-lable">Nhận email phản hồi</label>
    </div>
  </div>
</div>
<div class="row">
  <div class="clearfix recaptcha">

    <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="6LdesWkUAAAAABd19m087TXbNgmMyxndnnAltYLU"></div>
    </form>
    
  </div>
  <div class="col-sm-12 btn-post">
    <div class="col-sm-6">  
      <button class=" btn btn-primary" type="submit">Đăng tin</button>

    </div>
    <div class="col-sm-6">
      <button class=" btn btn-warning" type="button">Xem trước</button>
    </div>


  </div>
  <div class="col-md-12">
    <div class="grey-color">
    Nếu gặp bất kỳ khó khăn gì trong việc đăng ký, đăng nhập, đăng tin hay trong việc sử dụng website nói chung, Quý vị hãy liên hệ ngay với chúng tôi theo tổng đài CSKH:<strong> 1900 1881</strong> hoặc email: <strong>hotro@batdongsan.com.vn </strong>để được trợ giúp
  </div>
  </div>  
</div>
</div> 
</div>
</div>
</div>
</div>
</div>

    <!--header start end--> 
@endsection

<!-- end of content -->
<!--footer start-->
@push('scripts')
    <link rel="stylesheet" type="text/css" href="public/front_end/css/page2.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
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

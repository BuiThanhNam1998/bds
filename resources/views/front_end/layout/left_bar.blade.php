

        <div class="thumbnail">
            <h5>TRANG CÁ NHÂN</h5>
            <img src="{{Auth::user()->image}}" alt="..." class="img-circle" style="border-radius:50%;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;">
            <div class="caption">
                <h5>{{Auth::user()->name}}</h5>

                <div class="taikhoan clearfix">
                    <p>Tài khoản : <span>{{Auth::user()->balance}}</span></p><br>
                   <!--  <p>Tài khoản ngoài tin rao: <span>0</span></p><br>
                    <p>Tài khoản KM: <span>0</span></p><br>
                    <p>Tài khoản KM2: <span>0</span></p><br> -->
               </div>

               <p><a href="nap-tien" class="btn btn-primary" role="button">Nạp tiền</a> </p>
            </div>


            <div class="panel-group menu-quanly" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            <a class="main-menu">Thay đổi thông tin cá nhân</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="{{asset('profile')}}">Thay đổi thông tin cá nhân</a></li>
                                <li><a  href="{{asset('thay-doi-mat-khau')}}">Thay đổi mật khẩu</a></li>
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
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="quan-ly-tin-rao-ban" >Quản lý tin rao bán/cho thuê</a></li>
                                <li><a href="dang-bai" >Đăng tin rao bán/cho thuê</a></li>
                                <li><a href="quan-ly-tin-can-mua" >Quản lý tin cần mua/cần thuê</a></li>
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
                                <li><a href="thong-tin-so-du">Thông tin số dư <span class="badge">new</span> </a></li>
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
                                <li><a href="thong-bao" >Thông báo<span class="badge">new</span> </a></li>
                                {{--<li><a href="#" data-toggle="pill">Quản lý đăng kí nhận email</a></li>--}}
                                {{--<li><a href="#" data-toggle="pill">Hộp tin nhắn</a></li>--}}
                                {{--<li><a href="#" data-toggle="pill">Quản lý Chat <span class="badge">new</span></a></li>--}}
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
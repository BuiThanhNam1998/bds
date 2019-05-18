<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:description" content="mua bán nhà đất, bất động sản, nhà đất, chung cư, mua nhà đất, bán nhà đất, mua chung cư, bán chung cư" />
    <meta name="description" content="Bán nhà đất Hà Nội, bán bất động sản 2018 chính chủ tại Hà Nội, nhà đất giá rẻ, vị trí đẹp, đường rộng. Mua bán nhà đất ở Hà Nội có giấy tờ sổ hồng đỏ, nhiều diện tích, hướng đông, tây, nam, bắc">
    <meta name="keywords" content="mua bán nhà đất, mua nhà đất, bất động sản, nhà đất, Hà Nội, nhadat, muabannhadat, bds, nhadathanoi, bat dong san, chung cư, văn phòng">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mua bán nhà đất Hà Nội</title>

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{asset('public/favicon.ico')}}">
    <base href='{{asset("")}}'>
    
    <!-- Bootstrap -->
    <link href="{{asset('public/front_end/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/front_end/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/front_end/css/font-awesome.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300italic,300,400italic,500italic,500,700,700italic' rel='stylesheet' type='text/css'>
    <link href="{{asset('public/front_end/css/home_style.css')}}" rel="stylesheet"> 


   

@stack('styles')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('public/front_end/js/jquery-2.1.4.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.js"></script>


</head>
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="512234402556217"
     logged_in_greeting="Gửi tin nhắn cho Mua bán nhà đất tại Hà Nội:"
     logged_out_greeting="Gửi tin nhắn cho Mua bán nhà đất tại Hà Nội:">
</div>
<!--top bar start-->


<!--header start-->
<div class="header-wrap">
    <div class="container">
        <!--row start-->
        <div class="row">
            <!--col-md-3 start-->
            <div class="col-md-3 col-sm-12">
                <div class="logo"><a href="{{route("index")}}"><img src="{{asset("public/img/logo.png")}}"></a></div>
            </div>
            <!--col-md-3 end-->
            <!--col-md-7 end-->
            <div class="col-md-9 col-sm-12">
                <!--Navegation start-->
                <div class="advertisement">
                    @if($banner!=null && sizeof($banner)>1)

                                    <a class="page-breadcrumb" href="{{$banner[1]->link}}"><img src="{{$banner[1]->photo}}" alt="" height="100px" width="100%"></a>

                    @endif

                </div>
                <!--Navegation start-->
            </div>
            <!--col-md-3 end-->
            <!--col-md-2 start-->

            <div class="row" style="margin-left: 0;margin-right: 0">
                <div class="col-md-7" style="padding-left: 25px;color: #055699;">
                    <div style="padding-top: 10px">
                        <span style="margin-right: 12px;">Kênh thông tin hàng đầu về bất động sản</span>
                        <i class="fa fa-facebook-square" style="font-size: 18px;margin-right: 5px"></i>
                        <i class="fa fa-google-plus-square" style="font-size: 18px;margin-right: 5px"></i>
                        <i class="fa fa-youtube-square" style="font-size: 18px;margin-right: 5px"></i>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-6">
                <div class="user-wrap">
                    <div class="post-btn" style="float: left;width: 150px">
                        <a href="{{route("post_add")}}"><span class="glyphicon glyphicon-plus"></span>  Đăng tin rao</a>
                    </div>
                    @if(Auth::check())
                        <div class="login-btn"><a href="logout"><b>Đăng xuất</b></a></div>
                        <div class="register-btn"><a href="profile"><b>{{Auth::user()->name}}</b></a></div>
                    @else
                        <div class="login-btn"><a href="login"><b>Đăng nhập</b></a></div>
                        <div class="register-btn"><a href="register"><b>Đăng ký</b></a></div>
                    @endif


                </div>
            </div>
            </div>
            


            <div class="col-md-12 col-sm-12">
                <div class="navigationwrape">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>

                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li > <a href="{{route("index")}}" >
                                        Trang chủ </a>

                                </li>

                                <li class="dropdown"> <a href="#" > Nhà đất bán <span class="caret"></span> </a>
                                    <ul class="dropdown-menu">
                                        @foreach($category as $item)
                                            @if($item->trade_category_id ==1)
                                                <li> <a href="{{route("danh-muc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="dropdown"> <a href="#">Nhà đất cho thuê <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($category as $item)
                                            @if($item->trade_category_id ==2)
                                                <li> <a href="{{route("danh-muc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#">Cần mua <span class="caret"></span></a>
                                    <ul class="dropdown-menu">

                                        @foreach($category as $item)
                                            @if($item->trade_category_id ==3)
                                                <li> <a href="{{route("danh-muc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#">Cần thuê <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($category as $item)
                                            @if($item->trade_category_id ==4)
                                                <li> <a href="{{route("danh-muc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="dropdown"> <a href="#">Dự án <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($sub_category as $item)
                                            @if($item->news_category ==1)
                                                <li> <a href="{{route("danh-muc-tin-tuc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#">Tin tức<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($sub_category as $item)
                                            @if($item->news_category ==2)
                                                <li> <a href="{{route("danh-muc-tin-tuc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#">Kiến trúc<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($sub_category as $item)
                                            @if($item->news_category ==3)
                                                <li> <a href="{{route("danh-muc-tin-tuc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#">Nội - Ngoại thất<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($sub_category as $item)
                                            @if($item->news_category ==4)
                                                <li> <a href="{{route("danh-muc-tin-tuc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#">Phong thủy<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($sub_category as $item)
                                            @if($item->news_category ==5)
                                                <li> <a href="{{route("danh-muc-tin-tuc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>

                            </ul> 

                        </div>
                    </div>
                </div>
            </div>

            <!--col-md-2 end--> 
        </div>
        <!--row end-->
    </div>
</div>
<!--header start end-->


@yield('content')



<!--footer start-->
<div class="footer-wrap">

    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-6">
                <h3>Truy cập nhanh</h3>
                <ul class="footer-links">
                    <li><a href="{{route('index')}}">Trang chủ</a></li>
                    <li><a href="{{route('about',['id'=>1])}}">Giới thiệu</a></li>
                    <li><a href="{{route('about',['id'=>2])}}">Điều khoản</a></li>
                    <li><a href="{{route('about',['id'=>3])}}">Quy định sử dụng</a></li>
                    <li><a href="{{route('about',['id'=>4])}}">Báo giá - Hỗ trợ</a></li>
                    <li><a href="{{route('about',['id'=>5])}}">Câu hỏi thường gặp</a></li>
                    <li><a href="{{route('about',['id'=>6])}}">Quy định đăng tin</a></li>
                    <li><a href="{{route('lien-he')}}">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3>Danh mục</h3>
                <ul class="footer-category">
                    @foreach($category as $item)
                        @if($item->trade_category_id ==1)
                        <li> <a href="{{route("danh-muc",['id'=>$item->id])}}"> {{$item->category}}</a></li>
                        @endif
                    @endforeach
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3>Liên hệ</h3>
                <div class="address">41/87, Nguyễn Phong Sắc, Cầu Giấy, Hà Nội</div>
                <div class="info"><i class="fa fa-phone" aria-hidden="true"></i> <a href="#.">(777) 123 4567</a></div>
                <div class="info"><i class="fa fa-fax" aria-hidden="true"></i> <a href="#.">(123) 456 7890</a></div>
            </div>
        </div>
        <div class="copyright">Copyright © 2018 muabannhadattaihanoi.com.vn - All Rights Reserved.</div>
    </div>

</div>

<!--footer end-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('public/front_end/js/bootstrap.min.js')}}"></script>

<!-- general script file -->
<script src="{{asset('public/front_end/js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('public/front_end/js/script.js')}}"></script>

@stack('scripts')



<script>
  (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
    t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
  })(window, document, '_gscq','script','//widgets.getsitecontrol.com/154149/script.js');
</script>


</body>
</html>
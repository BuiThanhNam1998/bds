<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>batdongsan</title>
  <!-- Bootstrap CSS -->
  <base href='{{asset("")}}'>
  <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('public/css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('public/css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('public/css/style-responsive.css')}}" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="public/js/html5shiv.js"></script>
      <script src="public/js/respond.min.js"></script>
      <script src="public/js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <header class="header dark-bg"> 
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="admin" class="logo">Trang <span class="lite">Chủ</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <!-- <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul> -->
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            @if(Auth::guard('admins')->check())
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/profile.png" width="30px" height="auto">
                            </span>
                            <span class="username">{{Auth::guard('admins')->user()->name}}</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="admin/profile/ho-so"><i class="icon_profile"></i> Hồ sơ</a>
              </li>

              <li class="eborder-top">
                <a href="admin/user/them-admin"><i class="icon_plus"></i> Thêm tài khoản Admin</a>
              </li>

              <!-- <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
              </li>
              <li>
                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
              </li> -->
              <li>
                <a href="admin/logout"><i class="icon_key_alt"></i> Log Out</a>
              </li>
             <!--  <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li>
              <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li> -->
            </ul>
            @endif
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="admin">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          
            
          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Tin Đăng</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/tin/danh-sach">Danh Sách Tin Rao Bán</a></li>
              <li><a class="" href="admin/tin/danh-sach-tin-can-mua">Danh Sách Tin Cần Mua</a></li>
            </ul>
          </li>

            <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>User</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/user/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/user/them"><span>Thêm</span></a></li>
            </ul>
          </li>


           <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Loại Nhà Đất</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/loai-buon-ban/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/loai-buon-ban/them"><span>Thêm</span></a></li>
            </ul>
          </li>

          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Mức Giá</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/gia/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/gia/them"><span>Thêm</span></a></li>
            </ul>
          </li>

           <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Quận</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/quan/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/quan/them"><span>Thêm</span></a></li>
            </ul>
          </li>
            
          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Diện Tích</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/dien-tich/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/dien-tich/them"><span>Thêm</span></a></li>
            </ul>
          </li>

          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Số Phòng Ngủ</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/so-phong-ngu/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/so-phong-ngu/them"><span>Thêm</span></a></li>
            </ul>
          </li>

          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Hướng Nhà</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/huong-nha/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/huong-nha/them"><span>Thêm</span></a></li>
            </ul>
          </li>

          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Slide</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/slide/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/slide/them"><span>Thêm</span></a></li>
            </ul>
          </li>

          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Banner</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/banner/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/banner/them"><span>Thêm</span></a></li>
            </ul>
          </li>


          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Thể loại tin tức</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/the-loai-tin-tuc/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/the-loai-tin-tuc/them"><span>Thêm</span></a></li>
            </ul>
          </li>


          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Tin tức</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="admin/tin-tuc/danh-sach">Danh Sách</a></li>
              <li><a class="" href="admin/tin-tuc/them"><span>Thêm</span></a></li>
            </ul>
          </li>


          <li>
            <a class="" href="admin/gioi-thieu/">
                          <i class="icon_documents_alt"></i>
                          <span>Giới thiệu</span>

                      </a>

          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
            <!-- <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Pages</li>
            </ol> -->
          </div>
        </div>
        <!-- page start-->
        @yield('content')
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="{{asset('public/js/jquery.js')}}"></script>
  <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{asset('public/js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('public/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="{{asset('public/js/scripts.js')}}"></script>
  @yield('script')


</body>

</html>

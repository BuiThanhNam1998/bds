@extends('admin.index') 
@section('content')
    <!--main content start-->
    
        <div class="row">
           @if(session('message')) 
            <div class="alert alert-success fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
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
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4>{{$admin->name}}</h4>
                  <div class="follow-ava">
                    <img src="img/profile.png" alt="">
                  </div>
                  <h6>Administrator</h6>
                </div>
               <!--  <div class="col-lg-4 col-sm-4 follow-info">
                  <p>@jenifersmith</p>
                  <p><i class="fa fa-twitter">jenifertweet</i></p>
                  <h6>
                                    <span><i class="icon_clock_alt"></i>11:05 AM</span>
                                    <span><i class="icon_calendar"></i>25.10.13</span>
                                    <span><i class="icon_pin_alt"></i>NY</span>
                                </h6>
                </div> -->
               
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-admin"></i>
                                          Hồ sơ
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Sửa hồ sơ
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                 
                  <!-- profile -->
                  <div id="profile" class="tab-pane active">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1>Thông tin</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>Tên </span>: {{$admin->name}} </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>: {{$admin->email}}</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Số điện thoại </span>: {{$admin->phone}}</p>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Thông tin hố sơ</h1>
                        <form class="form-horizontal" role="form" action="admin/profile/sua" method="post">
                          <input type="hidden" name="_token" value="{{csrf_token()}}" />
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Tên</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="f-name" value="{{$admin->name}}" name="name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" value="{{$admin->email}}" name="email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Số điện thoại</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="c-name" value="{{$admin->phone}}" name="phone">
                            </div>
                          </div>

                          <div class="form-group ">
                            <label for="block" class="control-label col-lg-2 col-sm-3">Đổi mật khẩu</label>
                            <div class="col-lg-10 col-sm-9">
                              <input type="checkbox" style="width: 20px" class="checkbox form-control" id="changeFassword" name="changeFassword" />
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Mật khẩu</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control password" id="c-name" name="password" disabled>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-2 control-label">Nhập lại mật khẩu</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control password" id="c-name" name="passwordAgain" disabled>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary">Lưu</button>
                              <button type="reset" class="btn btn-default">Hủy</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
   @endsection
   @section('script')
  <script>
    $(document).ready(function(){
      $("#changeFassword").change(function(){
        if($(this).is(":checked")){
          $(".password").removeAttr('disabled');
        }
        else {
          $(".password").attr('disabled','');
        }
      });
    });
  </script>
@endSection

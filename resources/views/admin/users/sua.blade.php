@extends('admin.index')
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>User</li>
              <li><i class="fa fa-square-o"></i>Sửa</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
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
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Sửa
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="admin/user/sua/{{$user->id}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group ">
                      <label for="name" class="control-label col-lg-2">Tên<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="name" name="name" minlength="1" type="text" value="{{$user->name}}" />
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="email" name="email" minlength="1" type="email" required value="{{$user->email}}" />
                      </div>
                    </div>

                   <!--  <div class="form-group ">
                      <label for="block" class="control-label col-lg-2 col-sm-3">Đổi mật khẩu<span class="required">*</span></label>
                      <div class="col-lg-10 col-sm-9">
                        <input type="checkbox" style="width: 20px" class="checkbox form-control" id="changeFassword" name="changeFassword" />
                      </div> 
                    </div>

                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Password<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control password" id="password" name="password" type="password" disabled />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="passwordAgain" class="control-label col-lg-2">Nhập lại password<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control password" id="passwordAgain" name="passwordAgain" type="password" disabled />
                      </div>
                    </div> -->
                    
                    <div class="form-group ">
                      <label for="phone" class="control-label col-lg-2">Số điện thoại<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="phone" name="phone" minlength="1" type="text" required value="{{$user->phone}}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Địa chỉ<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="address" name="address" minlength="1" type="text" required value="{{$user->address}}" />
                      </div>
                    </div>

                    
                   <!--  <div class="form-group">
                      <label class="control-label col-lg-2" for="inputSuccess">Quyền<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="role_id">
                          @foreach($role as $ro)
                          <option value="{{$ro->id}}"
                            @if($ro->id == $user->role_id)
                              {{"selected"}}
                            @endif
                          >
                            {{$ro->role}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div> -->

                   <div class="form-group ">
                      <label for="block" class="control-label col-lg-2 col-sm-3">Khóa<span class="required">*</span></label>
                      <div class="col-lg-10 col-sm-9">
                        <input type="checkbox" style="width: 20px" class="checkbox form-control" id="block" name="block" 
                          @if($user->block == 1)
                          {{"checked"}}
                          @endif
                        />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Lưu</button>
                        <button class="btn btn-default" type="reset">Hủy</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
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
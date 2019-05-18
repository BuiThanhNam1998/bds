@extends('admin.index') 
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Người dùng</li>
              <li><i class="fa fa-square-o"></i>Danh sách</li>
            </ol>
          </div>
        </div>
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
              <header class="panel-heading">
                Danh Sách 
              </header>
<p>
<div class="row">
<div class="col-lg-4">
  <form action="admin/user/tim-kiem" method="get" accept-charset="utf-8">
   <div class="input-group">
      <input type="text" class="form-control" placeholder="Tìm kiếm..." name="keyWord">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Tìm !</button>
      </span>
    </div><!-- /input-group -->
  </form>
  </div><!-- /.col-lg-6 -->


<span class="input-btn">
        <a href="admin/user/thu/them-toan-bo"><button class="btn btn-primary" type="submit">Gửi thư cho toàn bộ user</button></a>
      </span>


</div>
</p>



              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Khóa</th>
                    <th>Hộp thư</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    @if($user->block==1)
                      <td>Có</td>
                    @elseif($user->block==0)
                      <td>Không</td>
                    @endif
                    <td><a href="admin/user/thu/danh-sach/{{$user->id}}">Hộp thư</a></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/user/sua/{{$user->id}}">Sửa</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </section>
            </div>
          </div>
          {{$users->links()}}
@endsection
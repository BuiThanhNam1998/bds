@extends('admin.index') 
@section('content')
<?php 
    function changeColor($keyWord,$str){
        return str_replace($keyWord,"<span style='color:red;'>$keyWord</span>",$str);
    }
?>
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
  
            <div class="col-lg-12">
              <header class="panel-heading">
                Danh Sách 
              </header>

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
                    <th>Khóa</th>
                    <th>Hộp thư</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{!! changeColor($keyWord,$user->name) !!}</td>
                    <td>{!! changeColor($keyWord,$user->email) !!}</td>
                    <td>{!! changeColor($keyWord,$user->phone) !!}</td>
                    <td>{{$user->address}}</td>
                    @if($user->role_id==2)
                      <td>Admin</td>
                    @elseif($user->role_id==1)
                      <td>User</td>
                    @endif
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
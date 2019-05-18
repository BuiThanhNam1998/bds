@extends('admin.index') 
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Thư</li>
              <li><i class="fa fa-square-o"></i>Danh sách</li>
            </ol>
          </div>
        </div>
<div class="row">
            <div class="col-lg-12">
              <p>
              <header class="panel-heading">
                User: {{$user->name}} 
              </header>
              </p>
              <p><a class="btn btn-primary btn-lg" href="admin/user/thu/them/{{$user->id}}">Gửi thư mới</a></p>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Tiêu Đề</th>
                    <th>Nội Dung</th>
                    <th>Thời Gian</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($notifications as $notification)
                  <tr>
                    <td>{{$notification->title}}</td>
                    <td>{{$notification->content}}</td>
                    <td>{{$notification->created_at}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-warning" href="admin/user/thu/xoa/{{$notification->id}}/{{$user->id}}">Xóa</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </section>
            </div>
          </div>
@endsection
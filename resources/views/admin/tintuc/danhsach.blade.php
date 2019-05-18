@extends('admin.index') 
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Hướng nhà</li>
              <li><i class="fa fa-square-o"></i>Danh sách</li>
            </ol>
          </div>
        </div>
<div class="row">
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
            <div class="alert alert-success fade in">
              @foreach($errors->all() as $err)
                {{$err}}<br>
              @endforeach 
            </div>
            @endif
            <div class="col-lg-12">
              <header class="panel-heading">
                Danh Sách
              </header>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Thể loại</th>
                    <th>Trạng thái</th>
                    <th>Ảnh</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($news as $ne)
                  <tr>
                    <td>{{$ne->title}}</td>
                    <td>{{$ne->category->category}}</td>
                    @if($ne->status==1)
                      <td>Hiện</td>
                    @elseif($ne->status==0)
                      <td>Ẩn</td>
                    @endif
                    <td><img src="{{$ne->photo}}" alt="" width="300px"></td> 
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/tin-tuc/sua/{{$ne->id}}">Sửa</a>
                        <a class="btn btn-warning" href="admin/tin-tuc/xoa/{{$ne->id}}">Xóa</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </section>
            </div>
          </div>
           {{$news->links()}}
@endsection
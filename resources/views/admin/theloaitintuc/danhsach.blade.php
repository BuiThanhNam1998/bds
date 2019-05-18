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
            <div class="col-lg-6">
              <header class="panel-heading">
                Danh Sách
              </header>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Thể loại</th>
                    <th>Thể loại con</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($news_category as $nc)
                  <tr>
                    <td>{{$nc->news_category}}</td>
                    <td><a href="admin/the-loai-tin-tuc/the-loai/danh-sach/{{$nc->id}}">Danh sách</a></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/the-loai-tin-tuc/sua/{{$nc->id}}">Sửa</a>
                        <a class="btn btn-warning" href="admin/the-loai-tin-tuc/xoa/{{$nc->id}}">Xóa</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </section>
            </div>
          </div>
           {{$news_category->links()}}
@endsection
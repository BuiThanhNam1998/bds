@extends('admin.index') 
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Banner</li>
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
                    <th>Tên</th>
                    <th>Link</th>
                    <th>Ảnh</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($banners as $banner) 
                  <tr>
                    <td>{{$banner->name}}</td>
                    <td>{{$banner->link}}</td>
                    <td><img src="{{$banner->photo}}" alt="banner" width="400px"></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/banner/sua/{{$banner->id}}">Sửa</a>
                        <a class="btn btn-warning" href="admin/banner/xoa/{{$banner->id}}">Xóa</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </section>
            </div>
          </div>
          {{$banners->links()}}
@endsection
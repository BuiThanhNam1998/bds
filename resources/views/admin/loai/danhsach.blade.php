@extends('admin.index') 
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Loại</li>
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
            <div class="col-lg-6">
              <p><header class="panel-heading">
                Danh Sách: {{$trade_category->trade_category}}
              </header></p>
              <p><a class="btn btn-primary btn-lg" href="admin/loai-buon-ban/loai/them/{{$trade_category->id}}">Thêm loại</a></p>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Loại</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($category as $ca)
                  <tr>
                    <td>{{$ca->category}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/loai-buon-ban/loai/sua/{{$ca->id}}/{{$trade_category->id}}">Sửa</a>
                        <a class="btn btn-warning" href="admin/loai-buon-ban/loai/xoa/{{$ca->id}}/{{$trade_category->id}}">Xóa</a>
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
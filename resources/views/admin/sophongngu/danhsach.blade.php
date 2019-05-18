@extends('admin.index') 
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Số phòng ngủ</li>
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
            <div class="col-lg-6">
              <header class="panel-heading">
                Số Phòng Ngủ 
              </header>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Số Phòng Ngủ</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($bedroom_number as $bed)
                  <tr>
                    <td>{{$bed->number}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/so-phong-ngu/sua/{{$bed->id}}">Sửa</a>
                        <a class="btn btn-warning" href="admin/so-phong-ngu/xoa/{{$bed->id}}">Xóa</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </section>
            </div>
          </div>
          {{$bedroom_number->links()}}
@endsection 

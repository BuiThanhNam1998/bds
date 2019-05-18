@extends('admin.index') 
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Giá</li>
              <li><i class="fa fa-square-o"></i>Danh sách</li>
            </ol>
          </div>
        </div>
<div class="row">
   @if(session('message')) 
            <div class="alert alert-success fade in">
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
            <div class="col-lg-6">
              <header class="panel-heading">
                Danh Sách 
              </header>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Mức giá từ</th>
                    <th>Mức giá đến</th>
                    <th>Đơn vị</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($price as $pr)
                  <tr>
                    <td>{{$pr->min}}</td>
                    <td>{{$pr->max}}</td>
                    <td>{{$pr->unit1->unit}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/gia/sua/{{$pr->id}}">Sửa</a>
                        <a class="btn btn-warning" href="admin/gia/xoa/{{$pr->id}}">Xóa</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </section>
            </div>
          </div>
          {{$price->links()}}
@endsection
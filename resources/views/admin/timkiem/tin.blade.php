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
              <li><i class="fa fa-bars"></i>Tin đăng</li>
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
                    <th>Tiêu đề</th>
                    <th>Người đăng</th>
                    <th>Loại</th>
                    <th>Giá</th>
                    <th>Lượt xem</th>
                    <th>Loại tin</th>
                    <th>Ngày đăng</th>
                    <th>Ngày kết thúc</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($post as $po)
                  <tr>
                    <td>{{substr($po->title,0,40)}}...</td>
                    <td>{{$po->user->name}}</td>
                    <td>{{$po->category->category}}</td>
                    <td>{{$po->price->price}}</td>
                    <td>{{$po->view}}</td>
                    @if($po->vip==1)
                      <td>vip</td>
                    @elseif($po->vip==0)
                      <td>thường</td>
                    @endif
                    <td>{{$po->start_date}}</td>
                    <td>{{$po->finish_date}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/tin/sua/{{$po->id}}">Sửa</a>
                        <a class="btn btn-warning" href="admin/tin/xoa/{{$po->id}}">Xóa</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </section>
            </div>
          </div>
           {{$post->links()}}
@endsection
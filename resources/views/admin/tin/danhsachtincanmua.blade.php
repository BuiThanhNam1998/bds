@extends('admin.index') 
@section('content')
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


<!-- <p>
<div class="row">
<div class="col-lg-4">
  <form action="admin/tin/tim-kiem" method="get" accept-charset="utf-8">
   <div class="input-group">
      <input type="text" class="form-control" placeholder="Tìm kiếm..." name="keyWord">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Tìm !</button>
      </span>
    </div>
  </form>
  </div>
</div>
</p> -->


              <table class="table table-hover">
                 <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Người đăng</th>
                    <th>Loại</th>
                    <th>Giá</th>
                    <th>Xem</th>
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
                    
                    <td>
                      @if($po->price_id >= 1000)
                        {{$po->price_id /1000}} - {{$po->price_id_max /1000}} tỷ
                      @endif
                      @if($po->price_id < 1000)
                        {{$po->price_id }} - {{$po->price_id_max }} triệu
                      @endif

                    </td>


                    <td>{{$po->view}}</td>

                    @if($po->vip==4)
                      <td>Vip I</td>
                    @elseif($po->vip==3)
                      <td>Vip II</td>
                    @elseif($po->vip==2)
                      <td>Vip III</td>
                    @elseif($po->vip==1)
                      <td>Thường</td>
                    @endif

                    <td>{{$po->start_date}}</td>
                    <td>{{$po->finish_date}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="admin/tin/an-tin-can-mua/{{$po->id}}">
                          @if($po->status==0)
                            Hiện
                          @elseif($po->status==1)
                            Ẩn
                          @endif
                        </a>
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
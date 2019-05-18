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
                Bài đăng: {{$post->title}} 
              </header>
              </p>
              <p><a class="btn btn-primary btn-lg" href="admin/tin/anh/them/{{$post->id}}">Thêm ảnh mới</a></p>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                  <tr>
                    <td><img src="{{$photo->link}}" alt="" width="400px"></td> 
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-warning" href="admin/tin/anh/xoa/{{$photo->id}}/{{$post->id}}">Xóa</a>
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
@extends('admin.index')
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Banner</li>
              <li><i class="fa fa-square-o"></i>Sửa</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
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
            <div class="alert alert-danger fade in">
              @foreach($errors->all() as $err)
                {{$err}}<br>
              @endforeach 
            </div>
            @endif
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Sửa
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="admin/banner/sua/{{$banner->id}}" role="form" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group ">
                      <label for="name" class="control-label col-lg-2">Tên <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="name" name="name" type="text" value="{{$banner->name}}" />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="name" class="control-label col-lg-2">Link <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="link" name="link" type="text" value="{{$banner->link}}" />
                      </div>
                    </div>

                     <div class="form-group">
                        <label for="exampleInputFile" class="control-label col-lg-2">Ảnh</label>
                      <div class="col-lg-10">
                       <p><img src="upload/banner/{{$banner->photo}}" alt="" width="400px"></p>
                        <input type="file" id="exampleInputFile" name="photo">
                        <p class="help-block">Example block-level help text here.</p>
                      </div>
                      </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Lưu</button>
                        <button class="btn btn-default" type="reset">Hủy</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
@endsection
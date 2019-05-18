@extends('admin.index')
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Hướng nhà</li>
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
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="admin/gioi-thieu/sua/{{$about->id}}" >
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />

                  <div class="form-group ">
                      <label for="title" class="control-label col-lg-2">Tiêu đề<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="title" name="title" type="text" value="{{$about->title}} " />
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2">Nội dung<span class="required">*</span></label>
                        <div class="col-sm-10">
                          <textarea class="form-control ckeditor" name="content" rows="15" id="content">{!!$about->content!!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Lưu</button>
                        <button class="btn btn-default" type="button">Hủy</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
@endsection
@section('script')
  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ asset('public/assets/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('public/assets/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('public/assets/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('public/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('public/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('public/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
  </script>
@endsection



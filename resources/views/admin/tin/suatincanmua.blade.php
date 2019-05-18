@extends('admin.index')
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Tin đăng</li>
              <li><i class="fa fa-square-o"></i>Sửa</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Thêm
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="admin/tin/sua-tin-can-mua/{{$post->id}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group ">
                      <label for="title" class="control-label col-lg-2">Tiêu đề<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="title" name="title" required >{{$post->title}}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2">Nội dung<span class="required">*</span></label>
                        <div class="col-sm-10">
                          <textarea class="form-control ckeditor" name="content" rows="6" id="content">{!!$post->content!!}</textarea>
                        </div>
                    </div>
                  

                    <div class="form-group">
                      <label class="control-label col-lg-2" for="inputSuccess">Loại buôn bán<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="trade_category" id="trade_category">
                          @foreach($trade_category as $tc)
                          <option value="{{$tc->id}}"
                            @if($tc->id == $post->category->trade->id)
                              {{"selected"}}
                            @endif
                          >
                            {{$tc->trade_category}}  
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-lg-2" for="inputSuccess">Loại<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="category" id="category">
                          @foreach($category as $ca)
                          @if($ca->trade_category_id == $post->category->trade->id)
                          <option value="{{$ca->id}}"
                            @if($ca->id == $post->category->id)
                              {{"selected"}}
                            @endif
                          >
                            {{$ca->category}} 
                          </option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="area" class="control-label col-lg-2">Diện tích<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="area" name="area" type="text" value="{{$post->area_id}} " />
                      </div>
                    </div>

                      <div class="form-group">
                      <label class="control-label col-lg-2" for="inputSuccess">Giá<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="price" id="price">
                          @foreach($price as $pr)

                          <option value="{{$pr->id}}" @if($pr->min*$pr->unit == $post->price_id && $pr->max*$pr->unit== $post->price_id_max){{"selected"}} @endif>
                            {{$pr->min}}-{{$pr->max}} @if($pr->unit==1){{"triệu"}} @else{{"tỷ"}} @endif
                          </option>

                           @endforeach
                        </select>
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-lg-2" for="inputSuccess">Quận<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="county" id="county">
                          @foreach($county as $co)
                          <option value="{{$co->id}}"
                            @if($co->id == $post->guild->county->id)
                              {{"selected"}}
                            @endif
                          >
                            {{$co->county}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-lg-2" for="inputSuccess">Phường<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="guild" id="guild">
                          @foreach($guild as $gu)
                          @if($gu->county_id == $post->guild->county->id)
                          <option value="{{$gu->id}}"
                            @if($gu->id == $post->guild->id)
                              {{"selected"}}
                            @endif
                          >
                            {{$gu->guild}} 
                          </option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-lg-2" for="inputSuccess">Loại tin đăng<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="vip" id="vip">
                          <option value="4" @if($post->vip==4) {{"selected"}} @endif>Vip 1</option>
                          <option value="3" @if($post->vip==3) {{"selected"}} @endif>Vip 2</option>
                          <option value="2" @if($post->vip==2) {{"selected"}} @endif>Vip 3</option>
                          <option value="1" @if($post->vip==1) {{"selected"}} @endif>Thường</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Ẩn</label>
                      <div class="col-lg-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="1" name="status"
                              @if($post->status == 1)
                                {{"checked"}}
                              @endif
                            >
                          </label>
                        </div>
                      </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label col-lg-2">Ngày bắt đầu đăng</label>
                        <div class="col-lg-10">
                          <input id="dp1" type="date" class="form-control" name="start_date" value="{{$post->start_date}}">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-lg-2">Ngày kết thúc</label>
                        <div class="col-lg-10">
                          <input id="dp1" type="date" class="form-control" name="finish_date" value="{{$post->finish_date}}">
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <label for="photo" class="control-label col-lg-2">Ảnh</label>
                      <div class="col-lg-10">
                       <p><img src="public/upload/post/{{$post->photo}}" alt="" width="400px"></p>
                        <input type="file" id="image" name="image" multiple>
                        <p class="help-block">Example block-level help text here.</p>
                      </div>
                      </div> -->

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
  <script type="text/javascript" src="public/assets/ckeditor/ckeditor.js"></script>

  <script>
    $(document).ready(function(){
      $("#trade_category").change(function(){
        var idTradeCategory = $(this).val();
        $.get("admin/ajax/category/"+idTradeCategory,function(data){
          $("#category").html(data);
        })
      });
    });
  </script>

  <script>
    $(document).ready(function(){
      $("#county").change(function(){
        var idCounty = $(this).val();
        $.get("admin/ajax/guild/"+idCounty,function(data){
          $("#guild").html(data);
        })
      });
    });
  </script>





<!--  --><script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<!-- <script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>

<script>
CKEDITOR.replace('my-editor', options);
</script> -->


<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script>
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
  </script>

  CKEditor init
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
  <script>
    $('textarea[name=content]').ckeditor({
      height: 100,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
  </script> -->

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
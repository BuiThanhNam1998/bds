@extends('admin.index')
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Gửi</li>
              <li><i class="fa fa-square-o"></i>Gửi toàn bộ user</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Gửi thư mới cho toàn bộ user
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group ">
                      <label for="title" class="control-label col-lg-2">Tiêu đề</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="title" name="title"  type="text"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="content" class="control-label col-lg-2">Nội dung</label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="content" name="content" required></textarea>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Gửi</button>
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
@extends('admin.index')
@section('content')
<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Giá</li>
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
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="admin/gia/sua/{{$price->id}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group ">
                      <label for="min" class="control-label col-lg-2">Mức giá từ<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="min" name="min" type="text" value="{{$price->min}}"/>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="max" class="control-label col-lg-2">Đến<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="max" name="max" type="text" value="{{$price->max}}"/>
                      </div>
                    </div>
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="inputSuccess">Đơn vị<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="unit" id="unit">
                          @foreach($unit as $un)
                             <option value="{{$un->id}}" @if($price->unit1->id == $un->id) {{"selected"}} @endif>{{$un->unit}}
                             </option>
                          @endforeach
                        </select>
                        </div>
                    </div>

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
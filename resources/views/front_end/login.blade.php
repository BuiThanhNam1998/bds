@extends('front_end.layout.layout')
@section('content')
<!--inner heading start-->
{{--<div class="inner-heading">--}}
    {{--<div class="container">--}}
        {{--<h1>Đăng nhập</h1>--}}
    {{--</div>--}}
{{--</div>--}}
<!--inner heading end-->

<!--login start-->
<div class="inner-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-2"></div>
            <div class="col-md-6 col-sm-8">
                <div class="login">
                    <div class="contctxt">Đăng nhập</div>
                    <div class="formint conForm">
                        <form action="" method="post">
                             @if(count($errors)>0)
                            <div class="alert alert-danger fade in">
                              @foreach($errors->all() as $err)
                                {{$err}}<br>
                              @endforeach 
                            </div>
                            @endif
                            @if(session('message')) 
                            <div class="alert alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="icon-remove"></i>
                                                  </button>
                                 {{session('message')}}
                                </div>
                            @endif
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="input-wrap">
                                <input type="text" name="phone" placeholder="Điện thoại" class="form-control">
                            </div>
                            <div class="input-wrap">
                                <input type="password" name="password" placeholder="Mật khẩu" class="form-control">
                            </div>
                            <div>
                                <input type="checkbox" name="remember">
                                <label for="price">Nhớ mật khẩu</label>
                            </div>

                            <div class="sub-btn">
                                <input type="submit" class="sbutn" value="Đăng nhập">
                            </div>


                            <div class="newuser">
                                <div class="col-md-3 col-sm-4 " style="text-align: left">
                                 <a class="btn" href="{{route('forgot-password')}}">Quên mật khẩu!</a>
                                </div>
                                <div class="col-md-9 col-sm-8 " style="text-align: right">
                                <i class="fa fa-user" aria-hidden="true"></i> Thành viên mới? <a class="btn  " href="{{route('register')}}">Đăng ký!</a></div>

                            </div>
                                     <a class="btn btn-block btn-social btn-google   " href="{{ URL::to('redirect/google') }}">
                                         <span class="fa fa-google"></span> <span class="text_button">Đăng nhập bằng Google</span>
                                     </a>
                                     <a class="btn btn-block btn-social btn-facebook " href="{{ URL::to('redirect/facebook') }}">
                                         <span class="fa fa-facebook"></span>  <span class="text_button">Đăng nhập bằng Facebook</span>
                                     </a>

                        </form>



                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-2"></div>
        </div>
    </div>
</div>
<!--login end--> 
@endsection
@push("styles")
<link href="{{asset('public/front_end/css/bootstrap-social.css')}}" rel="stylesheet">
@endpush
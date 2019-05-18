@extends("front_end.layout.layout")
@section('content')
    <!--inner heading start-->
    {{--<div class="inner-heading">--}}
        {{--<div class="container">--}}
            {{--<h1>Gửi mật khẩu</h1>--}}
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
                        <div class="contctxt">Gửi mật khẩu</div>
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
                                    <div class="alert alert-success fade in">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="icon-remove"></i>
                                        </button>
                                        {{session('message')}}
                                    </div>
                                @endif
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                <div class="input-wrap">
                                    <input type="text" name="email" placeholder="Email" class="form-control">
                                </div>

                                <div class="sub-btn">
                                    <input type="submit" class="sbutn" value="Gửi mật khẩu">
                                </div>
                                <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> <a href="{{route("login")}}" class="btn">Đăng nhập</a></div>
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
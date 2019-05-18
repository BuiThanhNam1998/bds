@extends("front_end.layout.layout")
@section('content')
<!--inner start-->
<div class="inner-heading">
  <div class="container">
    <h1>Contact Us</h1>
  </div>
</div>
<!--inner end-->

<div class="inner-wrap">
  <div class="container"> 
    <!--contact start-->
    <div class="contact-info">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="contactWrp">
            <div class="contact-icon"> <i class="fa fa-map-marker" aria-hidden="true"></i> </div>
            <h5>Địa chỉ của chúng tôi</h5>
            <p>số 41, ngõ 87 Nguyễn Phong Sắc, Cầu Giấy, Hà Nội</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="contactWrp">
            <div class="contact-icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
            <h5>Gọi cho chúng tối</h5>
            <p>Điện thoại : +12 345 67 09 <br>
              Di động : +12 345 67 09</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="contactWrp">
            <div class="contact-icon"> <i class="fa fa-laptop" aria-hidden="true"></i> </div>
            <h5>Email</h5>
            <p>Email : info@yoursite.com <br>
              Email : info@yoursite.com </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="contactWrp">
            <div class="contact-icon"> <i class="fa fa-globe" aria-hidden="true"></i> </div>
            <h5>Ghé thăm chúng tôi</h5>
            <p>Website : www.yoursite.com<br>
              Website : www.yoursite.com</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
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
        <form action="" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <div class="row">
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="text" name="name" placeholder="Họ tên" class="form-control">
                <div class="form-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="text" name="phone" placeholder="Số điện thoại của bạn" class="form-control">
                <div class="form-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <div class="input-wrap">
            <input type="text" name="email" placeholder="Email của bạn" class="form-control">
            <div class="form-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          </div>
          <div class="input-wrap">
            <textarea class="form-control" placeholder="Viết nội dung tin nhắn của bạn ở đây..." name="content"></textarea>
            <div class="form-icon"><i class="fa fa-comment" aria-hidden="true"></i></div>
          </div>
          <div class="contact-btn">
            <button class="sub" type="submit" value="submit" name="submitted"> <i class="fa fa-paper-plane" aria-hidden="true"></i>Gửi</button>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8742352823856!2d105.78777201471542!3d21.03771758599352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abe6265e441b%3A0x875d18d94894af84!2sGtech+Trainning+Center!5e0!3m2!1svi!2s!4v1534091541869" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
    <!--contact end--> 
  </div>
</div>
@endsection

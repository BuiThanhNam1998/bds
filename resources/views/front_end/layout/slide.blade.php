@extends("front_end.layout.layout")
@section('content')
<div class="row">
<div class="col-md-offset-2 col-md-6">
<div class="tp-banner-container sliderWraper">
  <div class="tp-banner" >
    <ul>
      <li data-slotamount="7" data-transition="fade" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="../public/front_end/images/dummy.png" data-lazyload="../public/front_end/images/banner.jpg" height="100px">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="left" data-y="170" data-speed="600" data-start="1600">World’s Largest </div>
        <div class="caption lfl large-title tp-resizeme slidertext3" data-x="left" data-y="225" data-speed="600" data-start="2200"><span>Classifieds Portal</span></div>
        <div class="caption lfb large-title tp-resizeme slidertext6" data-x="left" data-y="300" data-speed="600" data-start="2800">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula lectus<br/>
          sed mauris mollis, eget dapibus purus pharetra.</div>
        <div class="caption lfl large-title tp-resizeme slidertext7" data-x="left" data-y="330" data-speed="600" data-start="3500"><a href="#">Contact Us</a></div>
      </li>
      <li data-slotamount="7" data-transition="fade" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="../public/front_end/images/dummy.png" data-lazyload="../public/front_end/images/banner2.jpg" height="100px">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="left" data-y="170" data-speed="600" data-start="1600">World’s Largest </div>
        <div class="caption lfl large-title tp-resizeme slidertext3" data-x="left" data-y="225" data-speed="600" data-start="2200"><span>Classifieds Portal</span></div>
        <div class="caption lfb large-title tp-resizeme slidertext6" data-x="left" data-y="300" data-speed="600" data-start="2800">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula lectus<br/>
          sed mauris mollis, eget dapibus purus pharetra.</div>
        <div class="caption lfl large-title tp-resizeme slidertext7" data-x="left" data-y="330" data-speed="600" data-start="3500"><a href="#">Contact Us</a></div>
      </li>
    </ul>
  </div>
</div>

</div>

<div class="col-md-2">
	<ul class="list-group">
	  <li class="list-group-item active">Cras justo odio</li>
	  <li class="list-group-item">Dapibus ac facilisis in</li>
	  <li class="list-group-item">Morbi leo risus</li>
	  <li class="list-group-item">Porta ac consectetur ac</li>
	  <li class="list-group-item">Vestibulum at eros</li>
	  <li class="list-group-item">Vestibulum at eros</li>
	  <li class="list-group-item">Vestibulum at eros</li>
	</ul>
</div>

</div>
@endsection
@push('styles')
<link href="{{asset('public/front_end/css/owl.carousel.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/front_end/rs-plugin/css/settings.css')}}">

@endpush
@push('scripts')
<!-- SLIDER REVOLUTION SCRIPTS  --> 
<script type="text/javascript" src="{{asset('public/front_end/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/front_end/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script> 
<!-- general script file --> 

<!-- general script file --> 
<script src="{{asset('public/front_end/js/owl.carousel.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/front_end/js/script.js')}}"></script>
@endpush

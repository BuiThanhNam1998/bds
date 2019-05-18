@extends("front_end.layout.layout")
@section('content')
<!--inner heading start-->

<!--inner heading end-->

<!--listing start-->
<div class="inner-wrap listing" style="padding-top: 20px">
    <div class="container">
        


<div class="row">
    <div class="col-md-6">
    <div class="tp-banner-container sliderWraper">
      <div class="tp-banner" >
        <ul>
            @foreach($news as $ne)
            <li data-slotamount="7" data-transition="fade" data-masterspeed="1000" data-saveperformance="on"> 
                <img alt="" src="{{$ne->photo}}" data-lazyload="{{$ne->photo}}" height="100px">
                <div class="caption lft large-title tp-resizeme slidertext2" data-x="left" data-y="170" data-speed="600" data-start="1600" style="padding-left: 20px;">
                    <a href="cate-news/{{$ne->category->id}}">{{$ne->category->category}}</a>
                </div>
                <div class="caption lfl large-title tp-resizeme slidertext3" data-x="left" data-y="225" data-speed="600" data-start="2200" style="font-size: 30px;padding-left: 20px;padding-top: 20px;">
                    <a href="chi-tiet-tin-tuc/{{$ne->slug}}"><span style="font-size: 30px">{{$ne->title}}</span></a>
                </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    </div>

    <div class="col-md-3">
        <ul class="list-group">
            @foreach($news as $ne)
            <a href="chi-tiet-tin-tuc/{{$ne->slug}}"><li class="list-group-item">{{substr($ne->title,0,60)}}...</li></a>
            @endforeach
        </ul>
    </div>
    <div class="col-md-3">
        <a href="{{$banner[0]->link}}" ><img src="{{$banner[0]->photo}}" height="260px" width="100%"></a>
    </div>
</div>



        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="leftSidebar">
                    <h3>Công cụ tìm kiếm</h3>
                    <div class="sidebarpad">
                        <form action="tim-kiem-nang-cao" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="input-wrap">
                                <input type="text" name="keyword" placeholder="Từ khóa tìm kiếm" class="form-control" value="@if(isset($keyword)){{ $keyword }} @endif">
                            </div>

                            <div class="input-wrap">
                                <select name="trade_category" class="form-control" id="trade_category">
                                    <option value="0">--Hình thức--</option>
                                    @foreach($trade_category as $tc)
                                        <option value="{{$tc->id}}"
                                        @if(isset($tradeid))
                                            @if($tc->id == $tradeid)
                                                selected
                                            @endif
                                        @endif
                                        >{{$tc->trade_category}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-wrap">
                                <select name="category" class="form-control" id="category">
                                    <option value="0">--Loại--</option>
                                    @foreach($category as $ca)
                                        <option value="{{$ca->id}}"
                                        @if(isset($cateid))
                                            @if($ca->id == $cateid)
                                                selected
                                            @endif
                                        @endif
                                        >{{$ca->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-wrap">
                                <select name="county" class="form-control">
                                    <option value="0">--Quận--</option>
                                    @foreach($county as $co)
                                        <option value="{{$co->id}}"
                                                @if(isset($countyid))
                                                @if($co->id == $countyid)
                                                selected
                                                @endif
                                                @endif
                                        >{{$co->county}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-wrap">
                                <select name="price" class="form-control" id="price">
                                    <option value="0">--Giá--</option>
                                    <option value="-2">Thỏa Thuận</option>
                                    @foreach($price as $pr)
                                        <option value="{{$pr->id}}"
                                                @if(isset($priceid))
                                                @if($pr->id == $priceid)
                                                selected
                                                @endif
                                                @endif
                                        >{{$pr->min}}-{{$pr->max}} {{$pr->unit1->unit}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="input-wrap">
                                <select name="area" class="form-control">
                                    <option value="0">--Diện tích--</option>
                                    @foreach($area as $ar)
                                        <option value="{{$ar->id}}"
                                                @if(isset($areaid))
                                                @if($ar->id == $areaid)
                                                selected
                                                @endif
                                                @endif
                                        >{{$ar->min}}-{{$ar->max}} m2</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-wrap">
                                <select name="bedroom_number" class="form-control">
                                    <option value="0">--Số phòng ngủ--</option>
                                    @foreach($bedroom_number as $bn)
                                        <option value="{{$bn->id}}"
                                                @if(isset($bedroom_number_id))
                                                @if($bn->id == $bedroom_number_id)
                                                selected
                                                @endif
                                                @endif
                                        >{{$bn->number}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-wrap">
                                <select name="direction" class="form-control">
                                    <option value="0">--Hướng nhà--</option>
                                    @foreach($direction as $di)
                                        <option value="{{$di->id}}"
                                                @if(isset($direction_id))
                                                @if($di->id == $direction_id)
                                                selected
                                                @endif
                                                @endif
                                        >{{$di->direction}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="sub-btn">
                                <input type="submit" class="sbutn" value="Tìm kiếm">
                            </div>
                        </form>
                        @if($banner!=null && sizeof($banner)>0)
                        <div class="ad"><a href="{{$banner[0]->link}}" ><img src="{{$banner[0]->photo}}"></a></div>
@endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-8 ">
                <div class="infinite-scroll">
                    <ul class="listService">
                        @if(count($post)>0)
                            @foreach($post as $item)
                                <li class="">
                                    <div class="listWrpService">
                                        <a href="{{route('post_detail',['id'=>$item->slug])}}">
                                            <div class="row">

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3> @if($item->vip == 4)
                                                            <i class="fa fa-star red_star" ></i>
                                                        @endif

                                                        @if($item->vip >= 3)
                                                            <span class="vip_color">{{$item->title}}</span>
                                                        @endif
                                                        @if($item->vip == 2)
                                                            <span class="vip_color2">{{$item->title}}</span>
                                                        @endif
                                                        @if($item->vip == 1)
                                                            <span class="vip_color3">{{$item->title}}</span>
                                                        @endif
                                                        @if($item->vip == 0)
                                                            <span class="normal_color">{{$item->title}}</span>
                                                        @endif

                                                    </h3>
                                                </div>


                                                <div class="col-md-3 col-sm-3 col-xs-5">
                                                    <div class="listImg"><img src="{{$item->photo}}"></div>
                                                </div>
                                                <div class="col-md-9 col-sm-9 col-xs-7">

                                                    <div class="dollar"><i class="fa fa-money" aria-hidden="true"></i> Giá:
                                                        @if($item->price_id >= 1000)
                                                            {{$item->price_id /1000}} tỷ
                                                        @endif
                                                        @if($item->price_id < 1000 && $item->price_id > 0)
                                                            {{$item->price_id }} triệu
                                                        @endif
                                                        @if($item->price_id == -1)
                                                            Thỏa Thuận
                                                        @endif
                                                    </div>

                                                    @if(isset($item->guild))
                                                    <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa điểm: {{$item->guild->county->county}}
                                                    </div>
                                                    @else
                                                    <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa điểm: {{$item->county}}
                                                    </div>
                                                    @endif

                                                    <div class="location"><i class="fa fa-cube" aria-hidden="true"></i> Diện tích: {{$item->area_id}} m<sup>2</sup></div>
                                                    <div class="location"><i class="fa fa-clock-o" aria-hidden="true"></i> Ngày đăng: {{ date('d-m-Y', strtotime($item->created_at)) }}</div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div class="alert alert-info fade in">
                                {{"Không tìm thấy kết quả nào."}}
                            </div>
                        @endif
                    </ul>

                    <div class="pagiWrap">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active"><b><a style="color: #fff" href="cate-news/4">NỘI NGOẠI THẤT</a></b></li>
                    @foreach($news1 as $ne)
                    <a href="chi-tiet-tin-tuc/{{$ne->slug}}"><li class="list-group-item">{{$ne->title}}</li></a>
                    @endforeach
                </ul>

                <ul class="list-group">
                    <li class="list-group-item active"><b><a style="color: #fff" href="cate-news/4">PHONG THỦY</a></b></li>
                    @foreach($news2 as $ne)
                    <a href="chi-tiet-tin-tuc/{{$ne->slug}}"><li class="list-group-item">{{$ne->title}}</li></a>
                    @endforeach
                </ul>
                @if($banner!=null && sizeof($banner)>0)
                <div class="ad"><a href="{{$banner[0]->link}}" ><img src="{{$banner[0]->photo}}"></a></div>
                @endif
            </div>

        </div>
    </div>
</div>
<!--listing end-->


<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" width="50%" src="{{asset('public/img/loading.gif')}}" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>

<script>
$(document).ready(function(){
    
    var clickEvent = false;
    $('#myCarousel').carousel({
        interval:   4000    
    }).on('click', '.list-group li', function() {
            clickEvent = true;
            $('.list-group li').removeClass('active');
            $(this).addClass('active');     
    }).on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
            var count = $('.list-group').children().length -1;
            var current = $('.list-group li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if(count == id) {
                $('.list-group li').first().addClass('active'); 
            }
        }
        clickEvent = false;
    });
})

$(window).load(function() {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
    $('#myCarousel .list-group-item').outerHeight(triggerheight);
});
$(document).ready(function(){
      $("#trade_category").change(function(){
        var idTradeCategory = $(this).val();
        $.get("ajax/category/"+idTradeCategory,function(data){
          $("#category").html(data);
        })
      });
    });
$(document).ready(function(){
      $("#trade_category").change(function(){
        var idTradeCategory = $(this).val();
        $.get("ajax/price/"+idTradeCategory,function(data){
          $("#price").html(data);
        })
      }); 
    });
</script>
</script>
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
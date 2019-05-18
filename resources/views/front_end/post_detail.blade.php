@extends("front_end.layout.layout")
@section('content')
<!--inner heading start-->

<!--inner heading end-->

<!--Detail page start-->
<div class="inner-wrap about">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4> @if($post->vip == 4)
                        <i class="fa fa-star red_star" ></i>
                    @endif

                    @if($post->vip >= 3)
                        <span class="vip_color">{{$post->title}}</span>
                    @endif
                    @if($post->vip == 2)
                        <span class="vip_color2">{{$post->title}}</span>
                    @endif
                    @if($post->vip == 1)
                        <span class="vip_color3">{{$post->title}}</span>
                    @endif
                    @if($post->vip == 0)
                        <span class="normal_color">{{$post->title}}</span> 
                    @endif

                </h4>
                <div class="safety-tips">
                    <h5>Thông tin bất động sản</h5>
                    <ul class="featureLinks">
                        @if($post->price_id >= 1000)
                            <li>Giá:<span class="dollar"> {{$post->price_id / 1000}}</span> tỷ </li>
                        @endif
                        @if($post->price_id < 1000 && $post->price_id > 0)
                            <li>Giá: <span class="dollar">{{$post->price_id }}</span> triệu </li>
                        @endif
                        @if($post->price_id == -1)
                            Thỏa Thuận
                        @endif
                            <li>Diện tích: {{$post->area_id}} m<sup>2</sup> </li>
                            <li>Địa chỉ: {{$post->guild->guild}}-{{$post->guild->county->county}}</li>
                        @if(isset($post->bedroom_number))
                            <li>Số phòng ngủ: {{$post->bedroom_number->number}}</li>
                        @endif
                        @if(isset($post->direction))
                            <li>Hướng nhà: {{$post->direction->direction}}</li>
                        @endif

                    </ul>
                </div>
                <div class="safety-tips">
                    <h5>Mô tả</h5>
                    {!! $post->content !!}
                </div>
                <div id="main" role="main">
                    <div class="slider">
                        <div class="flexslider innerslider">
                            <ul class="slides">
                                @foreach($post->photo1 as $photo)
                                <li data-thumb="{{$photo->link}}"> <img src="{{$photo->link}}" /> </li>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="safety-tips">

                        <h5>Liên hệ</h5>

                    <ul class="featureLinks">
                        <li>Họ tên: {{$post->user->name}}</li>
                        <li>Điện thoại: {{$post->user->phone}}</li>
                        <li>Email: {{$post->user->email}}</li>
                        <li>Địa chỉ: {{$post->user->address}}</li>
                    </ul>






                </div>
                <div class="safety-tips">
                <h5>Tin liên quan</h5>


                    <ul class="listService">
                        @if(count($post_related)>0)
                            @foreach($post_related as $item)
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

                                                    <div class="dollar"><i class="fa fa-money" aria-hidden="true"></i> Giá
                                                        @if($item->price_id >= 1000)
                                                            {{$item->price_id /1000}} tỷ
                                                        @endif
                                                        @if($item->price_id < 1000)
                                                            {{$item->price_id }} triệu
                                                        @endif
                                                    </div>
                                                    <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa điểm: {{$item->guild->county->county}}</div>

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
                </div>
            </div>
            <div class="col-md-4">



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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Detail page end-->
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('public/front_end/css/flexslider.css')}}" type="text/css" media="screen" />
@endpush
@push('scripts')
<script defer src="{{asset('public/front_end/js/jquery.flexslider.js')}}"></script>
<script type="text/javascript">

    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
@endpush
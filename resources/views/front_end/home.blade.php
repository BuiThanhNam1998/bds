@extends('front_end.layout.layout')
@section('content')
<!--slider start-->
<div class="slider-wrap">
    <div class="container">
        <div class="sliderTxt">

            <p>Tìm kiếm với hơn 1.000.000 tin cho thuê và bán nhà đất tại Hà Nội</p>
            <form action="{{ route('tim-kiem-nang-cao') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="row form-wrap">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="" placeholder="Nhập từ khóa..." class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">

                            <select name="county" class="dropdown">
                                <option>-- Quận --</option>
                                @foreach($county as $co)
                                    <option value="{{$co->id}}">{{$co->county}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">

                            <select name="category" class="dropdown">
                                <option>-- Loại nhà đất --</option>
                                @foreach($category as $ca)
                                    <option value="{{$ca->id}}">{{$ca->category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-btn">
                            <input type="submit" class="sbutn" value="Tìm kiếm">
                        </div>
                    </div>
                </div>
            </form>


        </div>
        <div class="sliderTxt1">
        <a href="{{route('tim-kiem-nang-cao')}}"><p >Tìm kiếm nâng cao</p></a>
        </div>
    </div>
</div>
<!--slider end-->

<!--Latest ads start-->
<div class="feature-wrap">
    <div class="container infinite-scroll">


        <ul class="row feature-service">
            @foreach($post as $item)
            <li class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-image"><img src="{{$item->photo}}">
                    <div class="price">{{$item->price_id}}</div>
                </div>
                <div class="feature">
                    <div class="feat-bg">
                        <h3>
                            @if($item->vip == 2)
                            <i class="fa fa-star red_star" ></i>
                            @endif
                                <a href="#">
                                    @if($item->vip >= 1)
                                <span class="vip_color">{{$item->title}}</span>
                                        @endif
                                        @if($item->vip == 0)
                                            <span class="normal_color">{{$item->title}}</span>
                                        @endif
                            </a>
                        </h3>
                    </div>
                    <div class="feature-detail">
                        <ul class="featureList">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$item->guild->county->county}}</li>
                            <li><i class="fa fa-cube" aria-hidden="true"></i> {{$item->area_id}} m<sup>2</sup></li>
                        </ul>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>



        <div class="view-btn"> {{ $post->links() }}</div>
    </div>
</div>
<!--Latest ads end-->


<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="{{asset('public/img/loading.gif')}}" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
@endsection


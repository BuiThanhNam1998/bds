@extends("front_end.layout.layout")
@section('content')
<!--inner heading start-->

<!--inner heading end-->

<!--listing start-->
<div class="inner-wrap listing">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="leftSidebar">
                    <h3>Công cụ tìm kiếm</h3>
                    <div class="sidebarpad">
                        <form action="tim-kiem-nang-cao" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <h4>Từ khóa</h4>
                            <div class="input-wrap">
                                <input type="text" name="keyword" placeholder="Từ khóa tìm kiếm" class="form-control" value="@if(isset($keyword)){{ $keyword }} @endif">
                            </div>
                            <h4>Loại</h4>
                            <div class="input-wrap">
                                <select name="category" class="form-control">
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
                            <h4>Quận</h4>
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
                            <h4>Giá</h4>
                            <div class="input-wrap">
                                <select name="price" class="form-control">
                                    <option value="0">--Giá--</option>
                                    @foreach($price as $pr)
                                        <option value="{{$pr->id}}"
                                                @if(isset($priceid))
                                                @if($pr->id == $priceid)
                                                selected
                                                @endif
                                                @endif
                                        >{{$pr->min}}-{{$pr->max}} @if($pr->unit==1) {{"triệu"}} @else {{"tỷ"}} @endif</option>
                                    @endforeach
                                </select>
                            </div>
                            <h4>Diện tích</h4>
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
                            <h4>Số phòng ngủ</h4>
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
                            <h4>Hướng nhà</h4>
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

            <div class="col-md-9 col-sm-8 ">
                <div class="infinite-scroll">
                    <ul class="listService">
                        @if(count($news)>0)
                            @foreach($news as $item)
                                <li class="">
                                    <div class="listWrpService">
                                        <a href="{{route('news_detail',['id'=>$item->slug])}}">
                                            <div class="row">

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3> 

                                                            <span class="normal_color">{{$item->title}}</span>

                                                    </h3>
                                                </div>


                                                <div class="col-md-3 col-sm-3 col-xs-5">
                                                    <div class="listImg"><img src="{{$item->photo}}"></div>
                                                </div>
                                                <div class="col-md-9 col-sm-9 col-xs-7">

                                                    <div ><i aria-hidden="true"></i>
                                                      {{ $item->summary }}
                                                    </div>


                                                    <div class="location"><i class="fa fa-clock-o" aria-hidden="true"></i> Ngày đăng: {{ date('d-m-Y', strtotime($item->created_at)) }}
                                                    </div>

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
@endsection
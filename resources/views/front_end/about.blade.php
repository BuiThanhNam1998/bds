@extends("front_end.layout.layout")
@section('content')

    <!--inner header start-->
        
    <!--inner header end-->

    <!--inner content start-->
    <div class="inner-wrap">
        <div class="container">
            <div class="">
            <h4> @if($about != null)
                    {!! $about->title !!}
                @endif
            </h4>
        </div>
            <div class="row">
                <div class="col-md-8">
                   @if($about != null)
                    {!! html_entity_decode($about->content) !!}
                       @endif
                </div>
                <div class="col-md-4">
                    <!-- Side Bar -->
                    <div class="leftSidebar">
                        <h3>Công cụ tìm kiếm</h3>
                        <div class="sidebarpad">
                            <form action="" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <h4>Từ khóa</h4>
                                <div class="input-wrap">
                                    <input type="text" name="keyword" placeholder="Từ khóa tìm kiếm" class="form-control">
                                </div>
                                <h4>Loại</h4>
                                <div class="input-wrap">
                                    <select name="category" class="form-control">
                                        <option>--Loại--</option>
                                        @foreach($category as $ca)
                                            <option value="{{$ca->id}}">{{$ca->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h4>Quận</h4>
                                <div class="input-wrap">
                                    <select name="county" class="form-control">
                                        <option value="">--Quận--</option>
                                        @foreach($county as $co)
                                            <option value="{{$co->id}}">{{$co->county}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h4>Giá</h4>
                                <div class="input-wrap">
                                    <select name="price" class="form-control">
                                        <option value="">--Giá--</option>
                                        @foreach($price as $pr)
                                            <option value="{{$pr->id}}">{{$pr->min}}-{{$pr->max}} {{$pr->unit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h4>Diện tích</h4>
                                <div class="input-wrap">
                                    <select name="area" class="form-control">
                                        <option value="">--Diện tích--</option>
                                        @foreach($area as $ar)
                                            <option value="{{$ar->id}}">{{$ar->min}}-{{$ar->max}} m2</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h4>Số phòng ngủ</h4>
                                <div class="input-wrap">
                                    <select name="bedroom_number" class="form-control">
                                        <option value="">--Số phòng ngủ--</option>
                                        @foreach($bedroom_number as $bn)
                                            <option value="{{$bn->id}}">{{$bn->number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h4>Hướng nhà</h4>
                                <div class="input-wrap">
                                    <select name="direction" class="form-control">
                                        <option value="">--Hướng nhà--</option>
                                        @foreach($direction as $di)
                                            <option value="{{$di->id}}">{{$di->direction}}</option>
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
    <!--inner content end-->


@endsection

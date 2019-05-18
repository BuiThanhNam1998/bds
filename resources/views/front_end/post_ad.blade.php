@extends("front_end.layout.layout")
@section('content')
<!--inner heading start-->
<div class="inner-heading">
    <div class="container">
        <h1>Post Ads</h1>
    </div>
</div>
<!--inner heading end-->

<!--ad post start-->
<div class="inner-wrap listing">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-2"></div>
            <div class="col-md-6 col-sm-8">
                <div class="login">
                    <div class="contctxt">Ad Information</div>
                    <div class="formint conForm">
                        <form>
                            <div class="input-wrap">
                                <input type="text" name="" placeholder="Ad Title" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-wrap">
                                        <select name="" class="form-control">
                                            <option>Category </option>
                                            <option value="01">Mobile</option>
                                            <option value="02">Electronics</option>
                                            <option value="03">Vahicles</option>
                                            <option value="04">Bikes</option>
                                            <option value="05">Animals</option>
                                            <option value="06">Toys</option>
                                            <option value="07">Furniture</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrap">
                                        <select name="" class="form-control">
                                            <option>Ad Type </option>
                                            <option value="01">I Want To Sale</option>
                                            <option value="02">I Want To Buy</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-wrap">
                                <textarea class="form-control" placeholder="Ad Description"></textarea>
                            </div>
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <!-- don't give a name === doesn't send on POST/GET -->
                                <span class="input-group-btn">
                <!-- image-preview-clear button -->
                <button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
                                    <!-- image-preview-input -->
                <div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
                  <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/>
                    <!-- rename it -->
                </div>
                </span> </div>
                            <div class="contctxt persional">Persional Information</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-wrap">
                                        <input type="text" name="" placeholder="First Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrap">
                                        <input type="text" name="" placeholder="First Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrap">
                                        <input type="text" name="" placeholder="Phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrap">
                                        <select name="" class="form-control">
                                            <option>Select Cities </option>
                                            <option value="01">New York</option>
                                            <option value="02">Chicago</option>
                                            <option value="03">San Diego</option>
                                            <option value="04">Los Angeles</option>
                                            <option value="05">Houston</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-btn">
                                <input type="submit" class="sbutn" value="Submit Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-2"></div>
        </div>
    </div>
</div>
<!--ad post end-->
@endsection
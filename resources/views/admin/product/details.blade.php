@extends('admin.master')
@section('title', $product->name)
@section('meta')
    <meta name="title" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
@endsection


@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Details</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
            </ol>
        </div>
    </div><!-- PAGE-HEADER END -->
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="d-grid justify-content-end">
            <a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn-sm float-start m-1">
                <i class="fa fa-edit"></i> Edit
            </a>
        </div>
        <!-- COL-OPEN -->
        <div class="col-lg-12 col-md-12">
            <div class="card productdesc">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class=" col-xl-6 col-lg-12 col-md-12">
                            <div class="row h-100">
                                <div class="col-xl-2">
                                    <div class="clearfix carousel-slider h-100">
                                        <div class="carousel slide h-100" data-bs-interval="t" id="thumbcarousel">
                                            <div class="carousel-inner h-100">
                                                <ul class="carousel-item active d-flex h-100">
                                                    @if(isset($productImages))
                                                        @foreach($productImages as $key => $productImage)
                                                        <li class="thumb my-2" data-bs-slide-to="{{$key}}" data-bs-target="#Slider">
                                                            <img alt="img" src="{{asset($productImage['image'])}}">
                                                        </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-10">
                                    <div class="product-carousel w-100">
                                        <div class="carousel slide w-100" data-bs-ride="false" id="Slider">
                                            <div class="carousel-inner w-100">
                                                @if(isset($productImages))
                                                    @foreach($productImages as $key=> $productImage)
                                                    <div class="carousel-item {{$key == 0 ? 'active':''}}">
                                                        <img alt="img" class="img-fluid w-100 d-block" src="{{asset($productImage['image'])}}" width="100">
                                                    </div>
                                                     @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12">

                            <h3 class="mb-2 mt-xl-0 mt-4">{{$product->name}}</h3>
                            <h6 class="mb-2 mt-xl-0 text-muted mt-4">Slug : {{$product->slug}}</h6>
                            <div class="text-warning rating-container d-sm-flex">
                                {{--<div class="text-warning">
                                    <span class="text-muted">Rating:</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>--}}
                                {{--<div class="ms-2">
                                    <span class="me-3">(4.3)</span> <a class="text-info" href="#">
                                        <svg class="w-inner-icn text-info" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.5,21h-19C2.223877,21,2,21.223877,2,21.5S2.223877,22,2.5,22h19c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,21,21.5,21z M4.5,18.0888672h5c0.1326294,0,0.2597656-0.0527344,0.3534546-0.1465454l10-10c0.000061,0,0.0001221-0.000061,0.0001831-0.0001221c0.1951294-0.1952515,0.1950684-0.5117188-0.0001831-0.7068481l-5-5c0-0.000061-0.000061-0.0001221-0.0001221-0.0001221c-0.1951904-0.1951904-0.5117188-0.1951294-0.7068481,0.0001221l-10,10C4.0526733,12.3291016,4,12.4562378,4,12.5888672v5c0,0.0001831,0,0.0003662,0,0.0005493C4.0001831,17.8654175,4.223999,18.0890503,4.5,18.0888672z M14.5,3.2958984l4.2930298,4.2929688l-2.121582,2.121582l-4.2926025-4.293396L14.5,3.2958984z M5,12.7958984l6.671814-6.671814l4.2926025,4.293396l-6.6713867,6.6713867H5V12.7958984z"></path></svg> <span>37</span>
                                        Reviews</a>
                                </div>--}}
                            </div>
                            <p class="mb-0 text-18 mt-5">Price</p>
                            <p class="mb-1">
                                @if($product->discount_value)
                                    <span class="text-dark text-22">
                                        ৳ {{ $product->discount_type == 0 ? ($product->regular_price - $product->discount_value):'' }}
                                        {{ $product->discount_type == 1 ? ($product->regular_price - (($product->regular_price * $product->discount_value) / 100)):'' }}
                                    </span>
                                @endif
                                <span class="mx-2 text-muted text-decoration-line-through">৳ {{ $product->regular_price }}</span>
                                @if($product->discount_value)
                                    <span class="text-dark">( {{ $product->discount_value }} {{ $product->discount_type == 0 ? 'Tk':'' }} {{ $product->discount_type == 1 ? '%':'' }}  Off)</span>
                                @endif
                            </p>
                            <div class="mt-5">
                                <p class="text-muted m-0">SKU : {{$product->code}}</p>
                            </div>
                            <div class="mt-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span class="bg-success p-1 text-black rounded-3">stock : {{$product->stock_amount}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="tab-menu-heading border-bottom-0">
                                            <div class="tabs-menu">
                                                <!-- Tabs -->
                                                <ul class="nav panel-tabs">
                                                    <li>
                                                        <a class="active me-2 my-sm-0 my-1 text-body" data-bs-toggle="tab" href="#tab1">Specifications</a>
                                                    </li>
                                                    <li>
                                                        <a class=" me-2 my-sm-0 my-1 text-body" data-bs-toggle="tab" href="#tab2">Pricing & Stock</a>
                                                    </li>

                                                    <li>
                                                        <a class="me-2 my-sm-0 my-1 text-body" data-bs-toggle="tab" href="#tab3">Description</a>
                                                    </li>
                                                    <li>
                                                        <a class="text-body me-2 my-sm-0 my-1" data-bs-toggle="tab" href="#tab4">Reviews</a>
                                                    </li>
                                                    <li>
                                                        <a class="text-body my-sm-0 my-1" data-bs-toggle="tab" href="#tab5">Seo Information</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <h4 class="mb-5 mt-3">General</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Category
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->category->name}}
                                                                    </div>
                                                                </li>
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Sub Category Name
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->subCategory->name}}
                                                                    </div>
                                                                </li>

                                                                <li class=" row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Brand Name
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->brand->name}}
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Unit Name
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->unit->name}}
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Product Color
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        @foreach($product->colors as $color)
                                                                            <span class="me-2 p-1 rounded-3" style="background-color: {{$color->color->code}}">{{$color->color->name.' '}} </span>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Product Size
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        @foreach($product->sizes as $size)
                                                                            <span class="me-2 p-1 rounded-3">{{$size->size->code.' '}} </span>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <h4 class="mb-5 mt-3">Pricing & Stock</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">

                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        MRP
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        ৳ {{$product->mrp}}
                                                                    </div>
                                                                </li>
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Regular Price
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        ৳ {{$product->regular_price}}
                                                                    </div>
                                                                </li>
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Selling Price
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        ৳ {{$product->selling_price}}
                                                                    </div>
                                                                </li>

                                                                <li class=" row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        App Selling Price
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        ৳ {{$product->app_selling_price ?? '0'}}
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Stock Amount
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->stock_amount}}
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Alert Qty
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->alert_qty}}
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Max Order Qty
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->max_order_qty}}
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Weight
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->weight}} {{$product->weight < 1 ? 'gm':'kg'}}
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        VAT
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->vat}}
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Free Delivery
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->free_delivery == 1 ? 'Yes':'No'}}
                                                                    </div>
                                                                </li>
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Vat Applicable
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->vat_applicable == 1 ? 'Yes':'No'}}
                                                                    </div>
                                                                </li>

                                                                <li class=" row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Stock Visibility
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->stock_visibility == 1 ? 'Yes':'No'}}
                                                                    </div>
                                                                </li>
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Discount Type
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->discount_type == 0 ? 'Flat Amount':''}}
                                                                        {{$product->discount_type == 1 ? '% Percentage %':''}}
                                                                        {{$product->discount_type == 2 ? 'N/A':''}}
                                                                    </div>
                                                                </li>
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Discount Value
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->discount_value}}
                                                                    </div>
                                                                </li>
                                                                <li class="row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Discount Banner
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->discount_banner == 'save-percentage' ? 'Save(%)':''}}
                                                                        {{$product->discount_banner == 'save-tk' ? 'Save(Tk)':''}}
                                                                        {{$product->discount_banner == 'discount-percentage' ? 'Discount(%)':''}}
                                                                        {{$product->discount_banner == 'discount-tk' ? 'Discount(Tk)':''}}
                                                                    </div>
                                                                </li>
                                                                <li class="p-b-20 row">
                                                                    <div class="col-sm-5 text-muted">
                                                                        Refund
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        {{$product->refund == 1 ? 'Yes':'No'}}
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="row">
                                                            <div class="col-sm-3 fw-bold text-muted">
                                                                Short Description
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <p>{{$product->short_description}}</p>
                                                            </div>
                                                        </li>
                                                        <hr>
                                                        <li class=" row">
                                                            <div class="col-sm-3 fw-bold text-muted">
                                                                Long Description
                                                            </div>
                                                            <div class="col-sm-9">
                                                                {!! $product->long_description !!}
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="tab4">
                                                    <ul class="comment-section-main">
                                                        <li>
                                                            <div class="media mb-5 cnsl">
                                                                <div class=" me-3">
                                                                    <a href="#"><img alt="64x64" class="media-object rounded-circle thumb-sm" src="assets/images/users/5.jpg"></a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="name-time-container d-flex">
                                                                        <h5 class="mt-0 mb-0 me-2">David Neilson</h5><svg class="mx-2 me-1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.999939,6.5c-0.276123,0-0.5,0.223877-0.5,0.5v4.6914062l-2.7059937,1.3623047c-0.168457,0.0848999-0.2747803,0.2573853-0.2749634,0.4460449C8.5187988,13.7758789,8.7424927,13.9998169,9.0185547,14c0.078064,0.0003662,0.1550903-0.0180664,0.2245483-0.0537109l2.9814453-1.5C12.3933105,12.3615112,12.4998169,12.1888428,12.499939,12V7C12.499939,6.723877,12.276123,6.5,11.999939,6.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path></svg> <span class="time-main text-muted">2h ago</span>
                                                                    </div>
                                                                    <div class="text-warning mb-0">
                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="comment-main-action d-flex">
                                                                        <p class="font-13 text-muted mb-0 comment-main">Weh du dann die vom von und ergötzt denkst sanken..</p>
                                                                    </div><a href="#"><span class="badge btn-custom rounded-pill">Reply</span></a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media mb-5">
                                                                <div class=" me-3">
                                                                    <a href="#"><img alt="64x64" class="media-object rounded-circle thumb-sm" src="assets/images/users/5.jpg"></a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="name-time-container d-flex">
                                                                        <h5 class="mt-0 mb-0 me-2">Nikki Taylor</h5><svg class="mx-2 me-1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.999939,6.5c-0.276123,0-0.5,0.223877-0.5,0.5v4.6914062l-2.7059937,1.3623047c-0.168457,0.0848999-0.2747803,0.2573853-0.2749634,0.4460449C8.5187988,13.7758789,8.7424927,13.9998169,9.0185547,14c0.078064,0.0003662,0.1550903-0.0180664,0.2245483-0.0537109l2.9814453-1.5C12.3933105,12.3615112,12.4998169,12.1888428,12.499939,12V7C12.499939,6.723877,12.276123,6.5,11.999939,6.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path></svg> <span class="time-main text-muted">1h ago</span>
                                                                    </div>
                                                                    <div class="text-warning mb-0">
                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="comment-main-action d-flex">
                                                                        <p class="font-13 text-muted mb-0 comment-main"><span class="text-teritary">@David  Neilson</span> De tout plus o amer coups un eau. Confiture impassibles un de bords fumant poissons.</p>
                                                                    </div><a href="javascript:void(0)"><span class="badge btn-custom rounded-pill">Reply</span></a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media mb-5">
                                                                <div class=" me-3">
                                                                    <a href="#"><img alt="64x64" class="media-object rounded-circle thumb-sm" src="assets/images/users/5.jpg"></a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="name-time-container d-flex">
                                                                        <h5 class="mt-0 mb-0 me-2">Halsey Glenn</h5><svg class="mx-2 me-1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.999939,6.5c-0.276123,0-0.5,0.223877-0.5,0.5v4.6914062l-2.7059937,1.3623047c-0.168457,0.0848999-0.2747803,0.2573853-0.2749634,0.4460449C8.5187988,13.7758789,8.7424927,13.9998169,9.0185547,14c0.078064,0.0003662,0.1550903-0.0180664,0.2245483-0.0537109l2.9814453-1.5C12.3933105,12.3615112,12.4998169,12.1888428,12.499939,12V7C12.499939,6.723877,12.276123,6.5,11.999939,6.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path></svg> <span class="time-main text-muted">30min ago</span>
                                                                    </div>
                                                                    <div class="text-warning mb-0">
                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="comment-main-action d-flex">
                                                                        <p class="font-13 text-muted mb-0 comment-main"><span class="text-teritary">@Nikki  Taylor</span> Condemned reverie shun friends yet he domestic bade, the aye longed fondly.</p>
                                                                    </div><a href="javascript:void(0)"><span class="badge btn-custom rounded-pill">Reply</span></a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-0">
                                                            <div class="media mb-0">
                                                                <div class=" me-3">
                                                                    <a href="#"><img alt="64x64" class="media-object rounded-circle thumb-sm" src="assets/images/users/15.jpg"></a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="name-time-container d-flex">
                                                                        <h5 class="mt-0 mb-0 me-2">Jon Fincher</h5><svg class="mx-2 me-1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.999939,6.5c-0.276123,0-0.5,0.223877-0.5,0.5v4.6914062l-2.7059937,1.3623047c-0.168457,0.0848999-0.2747803,0.2573853-0.2749634,0.4460449C8.5187988,13.7758789,8.7424927,13.9998169,9.0185547,14c0.078064,0.0003662,0.1550903-0.0180664,0.2245483-0.0537109l2.9814453-1.5C12.3933105,12.3615112,12.4998169,12.1888428,12.499939,12V7C12.499939,6.723877,12.276123,6.5,11.999939,6.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path></svg> <span class="time-main text-muted">3h ago</span>
                                                                    </div>
                                                                    <div class="text-warning mb-0">
                                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="comment-main-action d-flex">
                                                                        <p class="font-13 text-muted mb-0 comment-main">Labore tempor vero stet tempor et dolores ipsum.</p>
                                                                    </div><a href="javascript:void(0)"><span class="badge btn-custom rounded-pill">Reply</span></a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="tab5">
                                                    <h4 class="mb-5 mt-3">Seo Information</h4>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="row">
                                                            <div class="col-sm-3 text-muted">
                                                                Meta Title
                                                            </div>
                                                            <div class="col-sm-9">
                                                                {{$product->meta_title ?? 'N/A'}}
                                                            </div>
                                                        </li>
                                                        <li class="row">
                                                            <div class="col-sm-3 text-muted">
                                                                Meta Description
                                                            </div>
                                                            <div class="col-sm-9">
                                                                {{$product->meta_description ?? 'N/A'}}
                                                            </div>
                                                        </li>

                                                        <li class=" row">
                                                            <div class="col-sm-3 text-muted">
                                                                Meta Author
                                                            </div>
                                                            <div class="col-sm-9">
                                                                {{$product->meta_author ?? 'N/A'}}
                                                            </div>
                                                        </li>
                                                        <li class="p-b-20 row">
                                                            <div class="col-sm-3 text-muted">
                                                                Meta Keywords
                                                            </div>
                                                            <div class="col-sm-9">
                                                                {{$product->meta_keyword ?? 'N/A'}}
                                                            </div>
                                                        </li>
                                                        <li class="p-b-20 row">
                                                            <div class="col-sm-3 text-muted">
                                                                Alt Text
                                                            </div>
                                                            <div class="col-sm-9">
                                                                {{$product->alt_text ?? 'N/A'}}
                                                            </div>
                                                        </li>
                                                        <li class="p-b-20 row">
                                                            <div class="col-sm-3 text-muted">
                                                                Schema Text
                                                            </div>
                                                            <div class="col-sm-9">
                                                                {{$product->schema_text ?? 'N/A'}}
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="mt-5">
                                <div class="row">
                                    <div class="col-md-2 text-center border br-7 py-3 px-4 m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M21.5,5h-4C17.223877,5,17,5.223877,17,5.5S17.223877,6,17.5,6H21v12H10.7069702l1.6464844-1.6464844c0.1871948-0.1937866,0.1871948-0.5009766,0-0.6947021c-0.1918335-0.1986694-0.5083618-0.2041626-0.7069702-0.0122681l-2.5,2.5c-0.000061,0-0.0001221,0.000061-0.0001221,0.0001221c-0.1951904,0.1951904-0.1951294,0.5117188,0.0001221,0.7068481l2.5,2.5C11.7401123,21.4474487,11.8673706,21.5001831,12,21.5c0.1325684,0,0.2597046-0.0526733,0.3533936-0.1464233c0.1953125-0.1952515,0.1953125-0.5118408,0.0001221-0.7070923L10.7069702,19h10.7936401C21.7765503,18.9998169,22.0001831,18.776001,22,18.5V5.4993896C21.9998169,5.2234497,21.776001,4.9998169,21.5,5z M5.5,18H3V6h10.2930298l-1.6465454,1.6464844c-0.09375,0.09375-0.1464233,0.2208862-0.1464233,0.3534546C11.5,8.276062,11.723877,8.499939,12,8.5c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l2.5-2.5c0.000061-0.000061,0.0001221-0.000061,0.0001831-0.0001221c0.1951294-0.1952515,0.1950684-0.5117188-0.0001831-0.7068481l-2.5-2.5c-0.1937256-0.1871338-0.5009155-0.1871338-0.6947021,0c-0.1986084,0.1918335-0.2041016,0.5083618-0.0122681,0.7069702L13.2930298,5H2.4993896C2.2234497,5.0001831,1.9998169,5.223999,2,5.5v13.0005493C2.0001831,18.7765503,2.223999,19.0001831,2.5,19h3C5.776123,19,6,18.776123,6,18.5S5.776123,18,5.5,18z"/></svg>
                                        <p class="mb-0 mt-2">10Days <br> Replacement</p>
                                    </div>
                                    <div class="col-md-2 text-center border br-7 py-3 px-4 m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M14.5,11.5h-2v-2C12.5,9.2,12.3,9,12,9s-0.5,0.2-0.5,0.5v2h-2C9.2,11.5,9,11.7,9,12s0.2,0.5,0.5,0.5h2v2c0,0,0,0,0,0c0,0.3,0.2,0.5,0.5,0.5c0,0,0,0,0,0c0.3,0,0.5-0.2,0.5-0.5v-2h2c0.3,0,0.5-0.2,0.5-0.5S14.8,11.5,14.5,11.5z M20,3.8c-0.1-0.3-0.3-0.4-0.6-0.4c-2.5,0.5-5,0-7.1-1.5c-0.2-0.1-0.4-0.1-0.6,0c-2.1,1.4-4.6,2-7.1,1.5c0,0-0.1,0-0.1,0C4.2,3.4,4,3.6,4,3.9v8c0,2.9,1.4,5.7,3.8,7.4l3.9,2.8c0.1,0.1,0.2,0.1,0.3,0.1c0.1,0,0.2,0,0.3-0.1l3.9-2.8c2.4-1.7,3.8-4.5,3.8-7.4v-8C20,3.8,20,3.8,20,3.8z M19,11.9c0,2.6-1.3,5.1-3.4,6.6L12,21.1l-3.6-2.6c-2.1-1.5-3.4-4-3.4-6.6V4.5c2.4,0.4,4.9-0.2,7-1.5c2.1,1.3,4.6,1.9,7,1.5V11.9z"/></svg>
                                        <p class="mb-0 mt-2">1yr <br> Warranty</p>
                                    </div>
                                    <div class="col-md-2 text-center border br-7 py-3 px-4 m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M21.5,11.5c-0.276123,0-0.5,0.223877-0.5,0.5c-0.0076294,3.3253174-1.8441162,6.376709-4.7788086,7.9404297c-4.3968506,2.3427734-9.8604126,0.6776123-12.203125-3.7192383C1.675293,11.8243408,3.3404541,6.3607788,7.7373047,4.0180664C11.8783569,1.8115845,16.9633789,3.1623535,19.4984741,7H16.5C16.223877,7,16,7.223877,16,7.5S16.223877,8,16.5,8h4c0.0001831,0,0.0003662,0,0.0006104,0C20.7765503,7.9998169,21.0001831,7.776001,21,7.5v-4C21,3.223877,20.776123,3,20.5,3S20,3.223877,20,3.5v2.4971924C18.1317139,3.5110474,15.1925659,2.0039673,12.0252686,2C6.5024414,1.993042,2.0196533,6.4645386,2.0126343,11.9873657C2.0056763,17.5101929,6.4771729,21.993042,12,22c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,11.723877,21.776123,11.5,21.5,11.5z"/></svg>
                                        <p class="mb-0 mt-2">Easy <br> Return</p>
                                    </div>
                                </div>
                            </div>--}}

                        </div>
                    </div>

                    {{--<div class="row mt-5">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading border-bottom-0">
                                    <div class="tabs-menu">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li>
                                                <a class="active me-2 my-sm-0 my-1 text-body" data-bs-toggle="tab" href="#tab1">Specifications</a>
                                            </li>
                                            <li>
                                                <a class="me-2 my-sm-0 my-1 text-body" data-bs-toggle="tab" href="#tab2">Description</a>
                                            </li>
                                            <li>
                                                <a class="text-body me-2 my-sm-0 my-1" data-bs-toggle="tab" href="#tab3">Reviews</a>
                                            </li>
                                            <li>
                                                <a class="text-body my-sm-0 my-1" data-bs-toggle="tab" href="#tab4">Seo Information</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <h4 class="mb-5 mt-3">General</h4>
                                            <ul class="list-unstyled mb-0">
                                                <li class="row">
                                                    <div class="col-sm-3 text-muted">
                                                        Category
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->category->name}}
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-sm-3 text-muted">
                                                        Sub Category Name
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->subCategory->name}}
                                                    </div>
                                                </li>

                                                <li class=" row">
                                                    <div class="col-sm-3 text-muted">
                                                        Brand Name
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->brand->name}}
                                                    </div>
                                                </li>
                                                <li class="p-b-20 row">
                                                    <div class="col-sm-3 text-muted">
                                                        Unit Name
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->unit->name}}
                                                    </div>
                                                </li>
                                                <li class="p-b-20 row">
                                                    <div class="col-sm-3 text-muted">
                                                        Product Color
                                                    </div>
                                                    <div class="col-sm-3">
                                                        @foreach($product->colors as $color)
                                                            <span class="me-2 p-1 rounded-3" style="background-color: {{$color->color->code}}">{{$color->color->name.' '}} </span>
                                                        @endforeach
                                                    </div>
                                                </li>
                                                <li class="p-b-20 row">
                                                    <div class="col-sm-3 text-muted">
                                                        Product Size
                                                    </div>
                                                    <div class="col-sm-3">
                                                        @foreach($product->sizes as $size)
                                                            <span class="me-2 p-1 rounded-3">{{$size->size->code.' '}} </span>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <ul class="list-unstyled mb-0">
                                                <li class="row">
                                                    <div class="col-sm-3 text-muted">
                                                        Short Description
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p>{{$product->short_description}}</p>
                                                    </div>
                                                </li>
                                                <hr>
                                                <li class=" row">
                                                    <div class="col-sm-3 text-muted">
                                                        Long Description
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {!! $product->long_description !!}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <ul class="comment-section-main">
                                                <li>
                                                    <div class="media mb-5 cnsl">
                                                        <div class=" me-3">
                                                            <a href="#"><img alt="64x64" class="media-object rounded-circle thumb-sm" src="assets/images/users/5.jpg"></a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="name-time-container d-flex">
                                                                <h5 class="mt-0 mb-0 me-2">David Neilson</h5><svg class="mx-2 me-1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.999939,6.5c-0.276123,0-0.5,0.223877-0.5,0.5v4.6914062l-2.7059937,1.3623047c-0.168457,0.0848999-0.2747803,0.2573853-0.2749634,0.4460449C8.5187988,13.7758789,8.7424927,13.9998169,9.0185547,14c0.078064,0.0003662,0.1550903-0.0180664,0.2245483-0.0537109l2.9814453-1.5C12.3933105,12.3615112,12.4998169,12.1888428,12.499939,12V7C12.499939,6.723877,12.276123,6.5,11.999939,6.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path></svg> <span class="time-main text-muted">2h ago</span>
                                                            </div>
                                                            <div class="text-warning mb-0">
                                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <div class="comment-main-action d-flex">
                                                                <p class="font-13 text-muted mb-0 comment-main">Weh du dann die vom von und ergötzt denkst sanken..</p>
                                                            </div><a href="#"><span class="badge btn-custom rounded-pill">Reply</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="media mb-5">
                                                        <div class=" me-3">
                                                            <a href="#"><img alt="64x64" class="media-object rounded-circle thumb-sm" src="assets/images/users/5.jpg"></a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="name-time-container d-flex">
                                                                <h5 class="mt-0 mb-0 me-2">Nikki Taylor</h5><svg class="mx-2 me-1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.999939,6.5c-0.276123,0-0.5,0.223877-0.5,0.5v4.6914062l-2.7059937,1.3623047c-0.168457,0.0848999-0.2747803,0.2573853-0.2749634,0.4460449C8.5187988,13.7758789,8.7424927,13.9998169,9.0185547,14c0.078064,0.0003662,0.1550903-0.0180664,0.2245483-0.0537109l2.9814453-1.5C12.3933105,12.3615112,12.4998169,12.1888428,12.499939,12V7C12.499939,6.723877,12.276123,6.5,11.999939,6.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path></svg> <span class="time-main text-muted">1h ago</span>
                                                            </div>
                                                            <div class="text-warning mb-0">
                                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <div class="comment-main-action d-flex">
                                                                <p class="font-13 text-muted mb-0 comment-main"><span class="text-teritary">@David  Neilson</span> De tout plus o amer coups un eau. Confiture impassibles un de bords fumant poissons.</p>
                                                            </div><a href="javascript:void(0)"><span class="badge btn-custom rounded-pill">Reply</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="media mb-5">
                                                        <div class=" me-3">
                                                            <a href="#"><img alt="64x64" class="media-object rounded-circle thumb-sm" src="assets/images/users/5.jpg"></a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="name-time-container d-flex">
                                                                <h5 class="mt-0 mb-0 me-2">Halsey Glenn</h5><svg class="mx-2 me-1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.999939,6.5c-0.276123,0-0.5,0.223877-0.5,0.5v4.6914062l-2.7059937,1.3623047c-0.168457,0.0848999-0.2747803,0.2573853-0.2749634,0.4460449C8.5187988,13.7758789,8.7424927,13.9998169,9.0185547,14c0.078064,0.0003662,0.1550903-0.0180664,0.2245483-0.0537109l2.9814453-1.5C12.3933105,12.3615112,12.4998169,12.1888428,12.499939,12V7C12.499939,6.723877,12.276123,6.5,11.999939,6.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path></svg> <span class="time-main text-muted">30min ago</span>
                                                            </div>
                                                            <div class="text-warning mb-0">
                                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <div class="comment-main-action d-flex">
                                                                <p class="font-13 text-muted mb-0 comment-main"><span class="text-teritary">@Nikki  Taylor</span> Condemned reverie shun friends yet he domestic bade, the aye longed fondly.</p>
                                                            </div><a href="javascript:void(0)"><span class="badge btn-custom rounded-pill">Reply</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-0">
                                                    <div class="media mb-0">
                                                        <div class=" me-3">
                                                            <a href="#"><img alt="64x64" class="media-object rounded-circle thumb-sm" src="assets/images/users/15.jpg"></a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="name-time-container d-flex">
                                                                <h5 class="mt-0 mb-0 me-2">Jon Fincher</h5><svg class="mx-2 me-1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.999939,6.5c-0.276123,0-0.5,0.223877-0.5,0.5v4.6914062l-2.7059937,1.3623047c-0.168457,0.0848999-0.2747803,0.2573853-0.2749634,0.4460449C8.5187988,13.7758789,8.7424927,13.9998169,9.0185547,14c0.078064,0.0003662,0.1550903-0.0180664,0.2245483-0.0537109l2.9814453-1.5C12.3933105,12.3615112,12.4998169,12.1888428,12.499939,12V7C12.499939,6.723877,12.276123,6.5,11.999939,6.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path></svg> <span class="time-main text-muted">3h ago</span>
                                                            </div>
                                                            <div class="text-warning mb-0">
                                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <div class="comment-main-action d-flex">
                                                                <p class="font-13 text-muted mb-0 comment-main">Labore tempor vero stet tempor et dolores ipsum.</p>
                                                            </div><a href="javascript:void(0)"><span class="badge btn-custom rounded-pill">Reply</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <h4 class="mb-5 mt-3">Seo Information</h4>
                                            <ul class="list-unstyled mb-0">
                                                <li class="row">
                                                    <div class="col-sm-3 text-muted">
                                                        Meta Title
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->meta_title ?? 'N/A'}}
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-sm-3 text-muted">
                                                        Meta Description
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->meta_description ?? 'N/A'}}
                                                    </div>
                                                </li>

                                                <li class=" row">
                                                    <div class="col-sm-3 text-muted">
                                                        Meta Author
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->meta_author ?? 'N/A'}}
                                                    </div>
                                                </li>
                                                <li class="p-b-20 row">
                                                    <div class="col-sm-3 text-muted">
                                                        Meta Keywords
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->meta_keyword ?? 'N/A'}}
                                                    </div>
                                                </li>
                                                <li class="p-b-20 row">
                                                    <div class="col-sm-3 text-muted">
                                                        Alt Text
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->alt_text ?? 'N/A'}}
                                                    </div>
                                                </li>
                                                <li class="p-b-20 row">
                                                    <div class="col-sm-3 text-muted">
                                                        Schema Text
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {{$product->schema_text ?? 'N/A'}}
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>

            {{--<div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">Add Review</h5>
                            <form action="https://laravel8.spruko.com/noa/index" class="form-horizontal m-t-20">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" placeholder="Username*" required="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" placeholder="Email*" required="" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <textarea class="form-control" rows="5">Your Review*</textarea>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-primary btn-rounded waves-effect waves-light" href="#">Submit</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>--}}

        </div><!-- COL-END -->

    </div>
@endsection

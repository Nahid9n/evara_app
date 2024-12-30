@extends('website.master')
@section('title', ucwords($product->name))
@section('body')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span></span> {{$product->category->name}}
                <span></span> {{ truncateWords($product->name, 14) }}
            </div>
        </div>
    </div>
    @if(Session::get('message'))
        <div class="container">
            <p class="text-center text-danger p-3">
                {{ Session::get('message') }}
            </p>
        </div>
    @endif
{{--    @dd($tags = \App\Models\ProductTag::where('product_id',$product->id)->get())--}}
    <section class="mt-2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
{{--                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>--}}
                                    <div class="product-image-slider">
                                        @foreach($product->productImages as $productImage)
                                            <figure class="border-radius-10">
                                                <img src="{{asset($productImage->image)}}"
                                                     alt="{{$productImage->alt_text}}" class="img-fluid" style="width:100%; height:auto;"/>
                                            </figure>
                                        @endforeach
                                        <figure class="border-radius-10">
                                            <img src="{{asset($product->image)}}" alt="{{$product->name}}" class="img-fluid" style="width:100%; height:auto;"/>
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset($product->back_image)}}" alt="{{$product->name}}" class="img-fluid" style="width:100%; height:auto;"/>
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        @foreach($product->productImages as $productImage)
                                            <div><img src="{{asset($productImage->image)}}" alt="{{$productImage->alt_text}}" width="100" height="100"/></div>
                                        @endforeach
                                        <div><img src="{{asset($product->image)}}" alt="{{$product->name}}" width="100" height="100"/></div>
                                        <div><img src="{{asset($product->back_image)}}" alt="{{$product->name}}" width="100" height="100"/></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{ $product->name }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <a href="{{route('product-brand',$product->brand->slug)}}"><span> Brands: {{ $product->brand->name }} </span></a>
                                        </div>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            @if(isset($product->discount_value))
                                                <ins>
                                                    <span class="text-brand">Tk.{{ $product->regular_price - (($product->regular_price * $product->discount_value)/100) }} </span>
                                                </ins>
                                                <ins>
                                                    <span class="old-price font-md ml-15">Tk.{{ $product->regular_price }} </span>
                                                </ins>
                                                <span class="save-price p-1 bg-success rounded-3 font-md ml-15">{{ $product->discount_value }} @if(!empty($product->discount_type)) {{ $product->discount_type == 1 ? '%': '৳‎' }} Off @endif</span>
                                            @else
                                                <ins>
                                                    <span class="text-brand">Tk.{{ $product->selling_price }} </span>
                                                </ins>
                                                <ins>
                                                    <span class="old-price font-md ml-15">Tk.{{ $product->regular_price }}</span>
                                                </ins>
                                            @endif
{{--                                            @dd($product)--}}
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        @if(isset($discount->discount_amount))
                                            <p>{{ $discount->title_one }}</p>
                                            <p>{{ $discount->title_two }}</p>
                                            <p>{{ $discount->title_three }}</p>
                                            <p>{{ $discount->description }}</p>
                                        @else
                                            <p>{{ $product->short_description }}</p>
                                        @endif
                                    </div>
                                    <form action="{{route('cart.ad')}}" method="post" class="addTocart">
                                        @csrf
                                        <input hidden type="text" name="product_id" value="{{ $product->id }}">
                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <ul class="list-filter color-filter">
                                                <li>
                                                    <select class="p-2" name="color" id="">
                                                        @foreach($product->colors as $key => $color)
                                                            <option value="{{$color->color->name}}" style="background-color: {{ $color->color->code }}">{{ $color->color->name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Size</strong>
                                            <ul class="list-filter size-filter font-small">
                                                <li>
                                                    <select class="p-2" name="size" id="">
                                                        @foreach($product->sizes as $key1 => $size)
                                                            <option value="{{$size->size->name}}" >{{ $size->size->name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="">
                                            <div class="row">
                                                <input type="number" name="qty" class=" w-25 " value="1" min="1"  max="{{ $product->stock_amount }}"/>
                                            </div>
                                            <div class="product-extra-link2 my-2">
                                                <button type="submit" class="button button-add-to-cart btn-sm">Add to cart</button>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up wishlist" id="wishlist{{$key}}"  href="#{{--{{ route('wishlist.ad',$product->id) }}--}}" data-value="{{$product->id}}"><i class="fi-rs-heart"></i></a>

                                            </div>
                                        </div>
                                    </form>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                        <li class="mb-5">Tags:
                                            @foreach($product->tagss as $tag)
                                            <a href="{{route('product-by-tag',$tag->tag->slug)}}" class="bg-dark p-1 rounded-2 text-white" rel="tag">{{ $tag->tag->name }}</a>
                                            @endforeach

                                        </li>
                                        <li>Availability:<span class="in-stock text-success ml-5">{{ $product->stock_amount }} Items In Stock</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 m-auto entry-main-content">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Description</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Reviews</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        {!! $product->long_description !!}
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <!--Comments-->
                                        <div class="comments-area style-2">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img
                                                                        src="{{asset('/')}}website/assets/imgs/page/avatar-6.jpg"
                                                                        alt="">
                                                                    <h6><a href="#">Jacky Chan</a></h6>
                                                                    <p class="font-xxs">Since 2012</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Thank you very fast shipping from Poland only 3days.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12
                                                                                pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply <i
                                                                                    class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img
                                                                        src="{{asset('/')}}website/assets/imgs/page/avatar-7.jpg"
                                                                        alt="">
                                                                    <h6><a href="#">Ana Rosie</a></h6>
                                                                    <p class="font-xxs">Since 2008</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Great low price and works well.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12
                                                                                pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply <i
                                                                                    class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img
                                                                        src="{{asset('/')}}website/assets/imgs/page/avatar-8.jpg"
                                                                        alt="">
                                                                    <h6><a href="#">Steven Keny</a></h6>
                                                                    <p class="font-xxs">Since 2010</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Authentic and Beautiful, Love these way more than ever
                                                                        expected They are Great earphones</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12
                                                                                pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply <i
                                                                                    class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%;"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%;"
                                                             aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%;"
                                                             aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%
                                                        </div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%;"
                                                             aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%
                                                        </div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                            <div class="product-rate d-inline-block mb-30">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment"
                                                                      id="comment" cols="30" rows="9"
                                                                      placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name" id="name"
                                                                           type="text" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email" id="email"
                                                                           type="email" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website" id="website"
                                                                           type="text" placeholder="Website">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit
                                                                Review
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img
                                                    src="{{asset('/')}}website/assets/imgs/theme/icons/icon-facebook.svg"
                                                    alt=""></a></li>
                                        <li class="social-twitter"><a href="#"><img
                                                    src="{{asset('/')}}website/assets/imgs/theme/icons/icon-twitter.svg"
                                                    alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img
                                                    src="{{asset('/')}}website/assets/imgs/theme/icons/icon-instagram.svg"
                                                    alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img
                                                    src="{{asset('/')}}website/assets/imgs/theme/icons/icon-pinterest.svg"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Related products</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach($category_products as $category_product)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="" tabindex="0">
                                                            <img class="default-img"
                                                                 src="{{asset( asset($category_product->image) )}}"
                                                                 alt="">
                                                            <img class="hover-img"
                                                                 src="{{asset( $category_product->image )}}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">25%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="#" tabindex="0">{{ $category_product->name }}</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>Tk. {{ $category_product->selling_price }} </span>
                                                        <span class="old-price">Tk. {{ $category_product->regular_price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="banner-img banner-big wow fadeIn f-none animated mt-50">
                            <img class="border-radius-10" src="{{asset('/')}}website/assets/imgs/banner/banner-4.png" alt="">
                            <div class="banner-text">
                                <h4 class="mb-15 mt-40">Repair Services</h4>
                                <h2 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('website.master')
@section('title',$setting->title)
@section('body')
    <style>
        .productartheight{
            height: 500px;
        }
        @media  (max-width: 768px){
            .imageHeight{
                width: 50%;
                height: auto;
            }
        }
        @media  (max-width: 575px){
            .imageHeight{
                width: 70%;
                height: auto;
            }
            .product-cart-wrap{
                height: 400px;
            }
        }
        .short-popup {
            position: fixed;
            bottom: 20px;
            width: 300px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1;
        }
        .short-popup.left {
            left: 20px;
        }
        .short-popup.right {
            right: 20px;
        }

        .close-popup {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: transparent;
            border: none;
            font-size: 25px;
            cursor: pointer;
            color: red;
        }
        ​@media only screen and (max-width: 600px) {
            .sectionContainerBackground {
                background-color: lightblue;
            }
        }
    </style>
    @if($shortPopup)
    <div class="short-popup bg-transparent">
        @if($shortPopup->url)
        <a href="{{$shortPopup->url}}">
            <img src="{{asset($shortPopup->short_popup_image)}}" alt="Short Popup Image">
        </a>
        @else
            <img src="{{asset($shortPopup->short_popup_image)}}" alt="Short Popup Image">
        @endif
        <button class="close-popup">&times;</button>
    </div>
    @endif
    <section class="home-slider pt-2">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @foreach ($product_offers as $product_offer)
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{ $product_offer->title_one }}</h4>
                                    <h2 class="animated fw-900">{{ $product_offer->title_two }}</h2>
                                    <h1 class="animated fw-900 text-brand">{{ $product_offer->title_three }}</h1>
                                    <p class="animated">{{ $product_offer->description }}</p>
                                    <a class="animated btn btn-brush btn-brush-2" href="{{route('product-detail',$product_offer->product->slug ?? '')}}"> Shop Now  <i class="fi-rs-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1 img-fluid w-100 h-auto" src="{{ asset($product_offer->image) }}" alt="" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    {{-- Banner Section --}}
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="row">
                @foreach($banners as $banner)
                    <div class="col-md-6">
                        <div class="banner-img banner-big wow fadeIn animated f-none">
                            <a href="{{$banner->url}}">
                                <img class="img-fluid" src="{{asset($banner->image ?? '')}}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                @foreach($features as $feature)
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset($feature->image)}}" alt="">
                        <h4 class="bg-1">{{$feature->name}}</h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="container my-4">
        <section class="sectionContainerBackground rounded-3" style="width: 100%; height: 250px; background-image: url('{{ asset('/Black Yellow Bold Bag Fashion Sale Banner.jpg') }}'); background-size:cover ; background-position: center; background-repeat: no-repeat;">
            <!-- Section Content -->
        </section>
        <div class="my-2 text-center">
            <h1 class="fw-bold my-4">Featured Products</h1>
            <h5 class="fw-bold my-2"> Shopping For Happy Life Mart</h5>
        </div>
        <div class="container text-center">
            <div class="row product-grid-4">
                @foreach($products as $key => $product)
                    @php
                        $rand = rand(0,99999999999999)
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="product-cart-wrap mb-30 productartheight"  style="height: auto;">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product-detail',$product->slug) }}">
                                        @if($product->image != '')
                                            <img class="default-img imageHeight" src="{{asset($product->image)}}" width="100" alt="">
                                        @else
                                            <img src="{{asset('/')}}no_image.jpg" class="p-0 default-img imageHeight" width="100" alt="" />
                                        @endif
                                        @if($product->back_image != '')
                                            <img class="hover-img imageHeight" src="{{asset($product->back_image)}}" width="100" alt="">
                                        @else
                                            <img src="{{asset('/')}}no_image.jpg" class="hover-img imageHeight" width="100" alt="" />
                                        @endif
                                    </a>
                                </div>
                                <div class="product-action-1 d-flex justify-content-center">
                                    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#latestViewModal{{$rand}}"><i class="fi-rs-eye"></i></a>
                                    <form action="{{route('cart.ad')}}" method="post" class="addTocart" id="addToCart{{$rand}}">
                                        @csrf
                                        <input hidden type="text" name="product_id" value="{{ $product->id }}">
                                        <div hidden class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <ul class="list-filter color-filter">
                                                <li>
                                                    <select class="form-control" hidden name="color" id="">
                                                        @foreach($product->colors as $key => $color)
                                                            <option {{$key == 0 ? 'selected':''}} value="{{$color->color->name}}" style="background-color: {{ $color->color->code }}">{{ $color->color->name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div hidden class="attr-detail attr-size">
                                            <strong class="mr-10">Size</strong>
                                            <ul class="list-filter size-filter font-small">
                                                <li>
                                                    <select class="form-control" hidden name="size" id="">
                                                        @foreach($product->sizes as $key1 => $size)
                                                            <option {{$key == 0 ? 'selected':''}} value="{{$size->size->name}}" >{{ $size->size->name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div hidden class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="">
                                            <div class="row">
                                                <input type="number" hidden name="qty" class="form-control w-100" value="1" min="1"  max="{{ $product->stock_amount }}"/>
                                            </div>
                                        </div>
                                        <button aria-label="Add To Cart" class="action-btn hover-up me-1"><i class="fi-rs-shopping-bag-add"></i></button>
                                    </form>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up wishlist" id="wishlist{{$key}}"  href="#{{ route('wishlist.ad',$product->id) }}" data-value="{{$product->id}}"><i class="fi-rs-heart"></i></a>
                                </div>
                                <!-- Define the badges for each product based on product fields -->
                                @php
                                    $badges = [];
                                    if ($product->discount_banner != 2) {
                                        if ($product->discount_banner == 'save-percentage'){
                                            $badges[] = 'Save('.$product->discount_value.'%)';
                                        }
                                        if ($product->discount_banner == 'save-tk'){
                                            $badges[] = 'Save('.$product->discount_value.'Tk)';
                                        }
                                        if ($product->discount_banner == 'discount-percentage'){
                                            $badges[] = 'Discount('.$product->discount_value.'%)';
                                        }
                                        if ($product->discount_banner == 'discount-tk'){
                                            $badges[] = 'Discount('.$product->discount_value.'Tk)';
                                        }
                                    }
                                    if ($product->free_delivery == 1) {
                                        $badges[] = 'Free Delivery';
                                    }
                                @endphp
                                <div class="product-badges product-card product-badges-position  product-badges-mrg" data-product-id="{{ $product->id }}" data-badges="{{ json_encode($badges) }}">
                                    @if(!empty($badges))
                                        <span class="hot bg-primary fw-bold badge" id="product-badge-{{ $product->id }}"></span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{route('product-category',$product->category->slug)}}">{{$product->category->name}}</a>
                                </div>
                                <h2><a href="{{ route('product-detail',$product->slug) }}">{{ \Illuminate\Support\Str::limit($product->name, 85)}}</a></h2>
                                <div class="product-price">

                                    @if($product->discount_value)
                                        <span>
                                        ৳ {{ $product->discount_type == 0 ? ($product->regular_price - $product->discount_value):'' }}
                                            {{ $product->discount_type == 1 ? ($product->regular_price - (($product->regular_price * $product->discount_value) / 100)):'' }}
                                    </span>
                                    @else
                                        <span class="">৳ {{ $product->selling_price }}</span>
                                    @endif
                                    <span class="old-price">৳ {{ $product->regular_price }}</span>
                                    @if($product->discount_value)
                                        <small>( {{ $product->discount_value }} {{ $product->discount_type == 0 ? 'Tk':'' }} {{ $product->discount_type == 1 ? '%':'' }}  Off)</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade custom-modal" id="latestViewModal{{$rand}}" tabindex="-1" aria-labelledby="latestViewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="detail-gallery">
                                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                                <!-- MAIN SLIDES -->
                                                <div class="product-image-slider">
                                                    @foreach($product->productImages as $productImage)
                                                        <figure class="border-radius-10">
                                                            <img src="{{asset($productImage->image)}}"
                                                                 alt="product image" class="img-fluid" style="width:100%; height:550px;"/>
                                                        </figure>
                                                    @endforeach
                                                    <figure class="border-radius-10">
                                                        <img src="{{asset($product->image)}}" alt="product image" class="img-fluid" style="width:100%; height:550px;"/>
                                                    </figure>
                                                    <figure class="border-radius-10">
                                                        <img src="{{asset($product->back_image)}}" alt="product image" class="img-fluid" style="width:100%; height:550px;"/>
                                                    </figure>
                                                </div>
                                                <!-- THUMBNAILS -->
                                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                                    @foreach($product->productImages as $productImage)
                                                        <div><img src="{{asset($productImage->image)}}" alt="product image" width="100" height="80"/></div>
                                                    @endforeach
                                                    <div><img src="{{asset($product->image)}}" alt="product image" width="100" height="80"/></div>
                                                    <div><img src="{{asset($product->back_image)}}" alt="product image" width="100" height="80"/></div>
                                                </div>
                                            </div>
                                            <!-- End Gallery -->
                                            <div class="social-icons single-share">
                                                <ul class="text-grey-5 d-inline-block">
                                                    <li><strong class="mr-10">Share this:</strong></li>
                                                    <li class="social-facebook"><a href="#"><img src="{{asset('/')}}website/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                                    <li class="social-twitter"> <a href="#"><img src="{{asset('/')}}website/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                                    <li class="social-instagram"><a href="#"><img src="{{asset('/')}}website/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                                    <li class="social-linkedin"><a href="#"><img src="{{asset('/')}}website/assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="detail-info">
                                                <h3 class="title-detail mt-30">{{ truncateWords($product->name, 14) }}</h3>
                                                <div class="product-detail-rating">
                                                    <div class="pro-details-brand">
                                                        <span> Brands: <a href="">{{ $product->brand->name }}</a></span>
                                                        @if($product->stock_amount > 0)
                                                            <p><span class="in-stock bg-success text-dark p-1">{{ $product->stock_amount }} In Stock</span></p>
                                                        @else
                                                            <p><span class="in-stock bg-danger text-success p-1">Stock Out</span></p>
                                                        @endif
                                                    </div>
                                                    <div class="product-rate-cover text-end">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%"></div>
                                                        </div>
                                                        <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix product-price-cover">
                                                    <div class="product-price primary-color float-left">
                                                        @if($product->discount_value)
                                                            <ins><span class="text-brand">৳ {{ $product->discount_type == 0 ? ($product->regular_price - $product->discount_value):'' }}
                                                                    {{ $product->discount_type == 1 ? ($product->regular_price - (($product->regular_price * $product->discount_value) / 100)):'' }}
                                                                        </span>
                                                            </ins>
                                                        @else
                                                            <ins><span class="text-brand">৳ {{ $product->selling_price }}
                                                                        </span>
                                                            </ins>
                                                        @endif
                                                        <ins><span class="old-price font-md ml-15">৳ {{ $product->regular_price }}</span></ins>
                                                        @if($product->discount_value)
                                                            <small class="save-price  font-md color3 ml-15">( {{ $product->discount_value }} {{ $product->discount_type == 0 ? 'Tk':'' }} {{ $product->discount_type == 1 ? '%':'' }}  Off)</small>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                                <div class="short-desc mb-30">
                                                    <p class="font-sm">{{ $product->short_description }}</p>
                                                </div>

                                                <form action="{{route('cart.ad')}}" method="post" class="addTocart">
                                                    @csrf
                                                    <input hidden type="text" name="product_id" value="{{ $product->id }}">
                                                    <div class="attr-detail attr-color mb-15">
                                                        <strong class="mr-10">Color</strong>
                                                        <ul class="list-filter color-filter">
                                                            <li>
                                                                <select class="form-control" name="color" id="">
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
                                                                <select class="form-control" name="size" id="">
                                                                    @foreach($product->sizes as $key1 => $size)
                                                                        <option value="{{$size->size->name}}" >{{ $size->size->name ?? '' }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                    <div class="detail-extralink">
                                                        <div class="row">
                                                            <input type="number" name="qty" class="form-control w-100" value="1" min="1"  max="{{ $product->stock_amount }}"/>
                                                        </div>
                                                        <div class="product-extra-link2">
                                                            <button type="submit" class="button button-add-to-cart btn-sm mx-2">Add to cart</button>
                                                            <a aria-label="Add To Wishlist" class="action-btn hover-up wishlist" id="wishlist{{$key}}"  href="#{{ route('wishlist.ad',$product->id) }}" data-value="{{$product->id}}"><i class="fi-rs-heart"></i></a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <ul class="product-meta font-xs color-grey mt-50">
                                                    <li class="mb-5">SKU: <a href="#">{{$product->code}}</a></li>
                                                    <li class="mb-5">Tags: {{$product->tags}}</li>
                                                </ul>
                                            </div>
                                            <!-- Detail Info -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <h5 class="text-center"><a class="animated btn btn-brush btn-brush-1" href="{{route('product-all')}}">See More <i class="fi-rs-arrow-right"></i></a></h5>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Featured</span> Categories</h3>
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                    @foreach($categories as $category)
                        <div class="card-1 d-grid justify-content-center">
                            <figure class="img-hover-scale text-center overflow-hidden">
                                <a href="{{route('product-category',$category->slug)}}">
                                    @if($category->image != '')
                                        <img src="{{ asset($category->image)}}" class="p-0" width="auto" height="70" alt="a" />
                                    @else
                                        <img src="{{asset('/')}}no_image.jpg" class="p-0 imageHeight" width="auto" height="70" alt="a" />
                                    @endif
                                </a>
                            </figure>
                            <h5><a class="category_name" href="{{route('product-category',$category->slug)}}"><small>{{ $category->name }}</small></a></h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20">
                <span>Featured</span> Brands
                <a class="d-grid justify-content-end" style="font-size: 16px;" href="{{route('all-brand')}}">See All</a>
            </h3>
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                    @foreach($brands as $brand)
                        <div class="card-1 d-grid justify-content-center">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="{{route('product-brand',$brand->slug)}}">
                                    @if($brand->image != '')
                                        <img src="{{ asset($brand->image)}}" class="p-0" width="auto" height="70" alt="a" />
                                    @else
                                        <img src="{{asset('/')}}no_image.jpg" class="p-0" width="auto" height="70" alt="a" />
                                    @endif
                                </a>
                            </figure>
                            <h5><a class="category_name" href="{{route('product-brand',$brand->slug)}}"><small>{{ $brand->name }}</small></a></h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Offer</span> Products</h3>
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                    @foreach($product_offers as $product_offer)
                        <div class="card-1 d-grid justify-content-center">
                            <figure class="img-hover-scale overflow-hidden">
                                <h5><a class="category_name rounded-3 p-2" href="{{route('product-detail',$product_offer->product->slug ?? '')}}"><small>{{ $product_offer->title_one }}</small></a></h5>
                                <a href="{{route('product-detail',$product_offer->product->slug ?? '')}}">
                                    @if($product_offer->image != '')
                                        <img src="{{ asset($product_offer->image) }}" class="p-0" width="auto" height="70" alt="a" />
                                    @else
                                        <img src="{{asset('/')}}no_image.jpg" class="p-0" width="auto" height="70" alt="a" />
                                    @endif
                                </a>
                            </figure>
                            <a style="font-size: 8px;" class="animated btn btn-brush btn-brush-1" href="{{route('product-detail',$product_offer->product->slug ?? '')}}"> Shop Now  <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                    @foreach($latestProducts as $key => $latestProduct)
                        <div class="item product-cart-wrap small hover-up" style="margin: 1px">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product-detail',$latestProduct->slug)}}">
                                        @if($latestProduct->image != '')
                                            <img class="default-img imageHeight" src="{{asset($latestProduct->image)}}" width="100" alt="">
                                        @else
                                            <img src="{{asset('/')}}no_image.jpg" class="p-0 default-img imageHeight" width="100" alt="" />
                                        @endif
                                        @if($latestProduct->back_image != '')
                                            <img class="hover-img imageHeight" src="{{asset($latestProduct->back_image)}}" width="100" alt="">
                                        @else
                                            <img src="{{asset('/')}}no_image.jpg" class="hover-img imageHeight" width="100" alt="" />
                                        @endif
                                    </a>
                                </div>
                                <div class="product-action-1  d-flex justify-content-center">
                                    <form action="{{route('cart.ad')}}" method="post" class="addTocart" id="addToCart{{$rand}}">
                                        @csrf
                                        <input hidden type="text" name="product_id" value="{{ $latestProduct->id }}">
                                        <div hidden class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <ul class="list-filter color-filter">
                                                <li>
                                                    <select class="form-control" hidden name="color" id="">
                                                        @foreach($latestProduct->colors as $key => $color)
                                                            <option {{$key == 0 ? 'selected':''}} value="{{$color->color->name}}" style="background-color: {{ $color->color->code }}">{{ $color->color->name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div hidden class="attr-detail attr-size">
                                            <strong class="mr-10">Size</strong>
                                            <ul class="list-filter size-filter font-small">
                                                <li>
                                                    <select class="form-control" hidden name="size" id="">
                                                        @foreach($latestProduct->sizes as $key1 => $size)
                                                            <option {{$key1 == 0 ? 'selected':''}} value="{{$size->size->name}}" >{{ $size->size->name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div hidden class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="">
                                            <div class="row">
                                                <input type="number" hidden name="qty" class="form-control w-100" value="1" min="1"  max="{{ $latestProduct->stock_amount }}"/>
                                            </div>
                                        </div>
                                        <button aria-label="Add To Cart" class="action-btn hover-up me-1"><i class="fi-rs-shopping-bag-add"></i></button>
                                    </form>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up wishlist" id="wishlist{{$key}}"  href="#{{ route('wishlist.ad',$latestProduct->id) }}" data-value="{{$latestProduct->id}}"><i class="fi-rs-heart"></i></a>
                                </div>
                                @php
                                    $badgess = [];
                                    if ($latestProduct->discount_banner != 2) {
                                        if ($latestProduct->discount_banner == 'save-percentage'){
                                            $badgess[] = 'Save('.$latestProduct->discount_value.'%)';
                                        }
                                        if ($latestProduct->discount_banner == 'save-tk'){
                                            $badgess[] = 'Save('.$latestProduct->discount_value.'Tk)';
                                        }
                                        if ($latestProduct->discount_banner == 'discount-percentage'){
                                            $badgess[] = 'Discount('.$latestProduct->discount_value.'%)';
                                        }
                                        if ($latestProduct->discount_banner == 'discount-tk'){
                                            $badgess[] = 'Discount('.$latestProduct->discount_value.'Tk)';
                                        }
                                    }
                                    if ($latestProduct->free_delivery == 1) {
                                        $badgess[] = 'Free Delivery';
                                    }
                                @endphp
                                <div class="product-badges product-card product-badges-position  product-badges-mrg" data-product-id="{{ $latestProduct->id }}" data-badges="{{ json_encode($badgess) }}">
                                    <span class="hot bg-primary fw-bold badge" id="product-badge-{{ $latestProduct->id }}">new</span>
                                </div>
                                <div class="product-badges product-badges-position-right text-center product-badges-mrg">
                                    <span class="hot p-1 rounded-3 {{ $latestProduct->stock_amount >= 5 ? 'bg-success':'bg-danger text-white' }}"> {{ $latestProduct->stock_visibility == 1 ? $latestProduct->stock_amount:''}} {{ $latestProduct->stock_amount >= 5 ? 'In Stock ':'Stock Out' }}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{route('product-category',$latestProduct->category->slug)}}">{{$latestProduct->category->name}}</a>
                                </div>
                                <h2 class="text-start"><a href="{{route('product-detail', $latestProduct->slug)}}">{{ \Illuminate\Support\Str::limit($latestProduct->name,60) }}</a></h2>
                                <div class="product-price text-start">
                                    @if($latestProduct->discount_value)
                                        <span>
                                        ৳ {{ $latestProduct->discount_type == 0 ? ($latestProduct->regular_price - $latestProduct->discount_value):'' }}
                                            {{ $latestProduct->discount_type == 1 ? number_format(($latestProduct->regular_price - (($latestProduct->regular_price * $latestProduct->discount_value) / 100)),2):'' }}
                                    </span>
                                    @else
                                        <span class="">৳ {{ $latestProduct->selling_price }}</span>
                                    @endif
                                    @if($latestProduct->selling_price != $latestProduct->regular_price)
                                    <span class="old-price">৳ {{ $latestProduct->regular_price }}</span>
                                    @endif
                                    @if($latestProduct->discount_value)
                                        <small>(  {{ $latestProduct->discount_type == 0 ? '৳ ':'' }}{{ $latestProduct->discount_value }} {{ $latestProduct->discount_type == 1 ? '%':'' }}  Off)</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="mb-50">
        <div class="container">
            <div class="row">
                @foreach($ad12s as $ad12)
                <div class="col-12">
                    <a href="{{ route('product-detail',$ad12->product->slug ?? '') }}">
                        <div class="banner-bg wow fadeIn animated">
                            <a href="{{ route('product-detail',$ad12->product->slug ?? '') }}">
                                <img class="img-fluid" src="{{asset($ad12->image ?? '')}}" alt="">
                            </a>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.short-popup').fadeIn();
            }, 5000);
            $(document).on('click', '.close-popup', function() {
                $('.short-popup').fadeOut();
            });
        });
    </script>

@endpush

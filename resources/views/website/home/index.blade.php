@extends('website.master')
@section('title','Popular E-commerce Website in Bangladesh')
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
    </style>
    <section class="home-slider position-relative pt-2">
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
                                    <a class="animated btn btn-brush btn-brush-3" href="{{route('product-detail',$product_offer->product->slug ?? '')}}"> Shop Now </a>
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
    <section class="position-relative pt-2">
        <div class="container">
            <div class="row my-2">
                <div class="col-md-4">
                    <img src="{{asset('/')}}Black Yellow Bold Bag Fashion Sale Banner.jpg" alt="" style="width: 100%; height: 200px">
                </div>
                <div class="col-md-4">
                    <img src="{{asset('/')}}Black Yellow Bold Bag Fashion Sale Banner.jpg" alt="" style="width: 100%; height: 200px">
                </div>
                <div class="col-md-4">
                    <img src="{{asset('/')}}Black Yellow Bold Bag Fashion Sale Banner.jpg" alt="" style="width: 100%; height: 200px">
                </div>

            </div>

        </div>
    </section>

    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
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
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
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
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                    @foreach($highlights as $key => $highlight)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{$key == 0 ? 'active':''}}" id="" data-bs-toggle="tab" data-bs-target="#tab-{{$key}}" type="button" role="tab" aria-controls="tab-three" aria-selected="false">{{$highlight->name}}</button>
                    </li>
                    @endforeach
                </ul>
                <a href="{{route('product-all')}}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                @foreach($highlights as $k => $highlight)

                <div class="tab-pane fade show {{$k == 0 ? 'active':''}}" id="tab-{{$k}}" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach($highlight->productHighlight as $key => $product)
                            @php($rand = rand(0,99999999999999))
                            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="product-cart-wrap mb-30 productartheight"  style="height: auto; border: 1px solid black;">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product-detail',$product->product->slug) }}">
                                                @if($product->product->image != '')
                                                    <img class="default-img imageHeight" src="{{asset($product->product->image)}}" width="100" alt="">
                                                @else
                                                    <img src="{{asset('/')}}no_image.jpg" class="p-0 default-img imageHeight" width="100" alt="" />
                                                @endif
                                                @if($product->product->back_image != '')
                                                    <img class="hover-img imageHeight" src="{{asset($product->product->back_image)}}" width="100" alt="">
                                                @else
                                                    <img src="{{asset('/')}}no_image.jpg" class="hover-img imageHeight" width="100" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#latestViewModal{{$rand}}"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up wishlist" id="wishlist{{$key}}"  href="#{{ route('wishlist.ad',$product->product->id) }}" data-value="{{$product->product->id}}"><i class="fi-rs-heart"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position  product-badges-mrg">
                                            <span class="hot bg-primary fw-bold">25%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('product-category',$product->product->category->slug)}}">{{$product->product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{ route('product-detail',$product->product->slug) }}">{{ \Illuminate\Support\Str::limit($product->product->name, 85)}}</a></h2>
                                        <div class="product-price">
                                            <span>৳ {{$product->product->selling_price}}</span>
                                            <span class="old-price">৳ {{$product->product->regular_price}}</span>
                                        </div>
                                        <div class="">
                                            <span class="p-1 rounded-3 {{ $product->product->stock_amount >= 11 ? 'bg-success':'bg-danger text-white' }}">{{ $product->product->stock_amount >= 11 ? $product->product->stock_amount:'' }} {{ $product->product->stock_amount >= 11 ? 'In Stock ':' Out Stock' }}</span>
                                        </div>
                                        <div class="" style="">
                                            <form action="{{route('cart.ad')}}" method="post" class="addTocart">
                                                @csrf
                                                <input hidden type="text" name="product_id" value="{{ $product->product->id }}">
                                                <div hidden class="attr-detail attr-color mb-15">
                                                    <strong class="mr-10">Color</strong>
                                                    <ul class="list-filter color-filter">
                                                        <li>
                                                            <select class="form-control" hidden name="color" id="">
                                                                @foreach($product->product->colors as $key => $color)
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
                                                                @foreach($product->product->sizes as $key1 => $size)
                                                                    <option {{$key == 0 ? 'selected':''}} value="{{$size->size->name}}" >{{ $size->size->name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div hidden class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                <div class="">
                                                    <div class="row">
                                                        <input type="number" hidden name="qty" class="form-control w-100" value="1" min="1"  max="{{ $product->product->stock_amount }}"/>
                                                    </div>
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-sm btn-success" style="border-radius: 100%"><i class="fi-rs-shopping-bag-add text-white"></i></button>
                                                    </div>
                                                </div>
                                            </form>
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
                                                            @foreach($product->product->productImages as $productImage)
                                                                <figure class="border-radius-10">
                                                                    <img src="{{asset($productImage->image)}}"
                                                                         alt="product image" class="img-fluid" style="width:100%; height:550px;"/>
                                                                </figure>
                                                            @endforeach
                                                            <figure class="border-radius-10">
                                                                <img src="{{asset($product->product->image)}}" alt="product image" class="img-fluid" style="width:100%; height:550px;"/>
                                                            </figure>
                                                            <figure class="border-radius-10">
                                                                <img src="{{asset($product->product->back_image)}}" alt="product image" class="img-fluid" style="width:100%; height:550px;"/>
                                                            </figure>
                                                        </div>
                                                        <!-- THUMBNAILS -->
                                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                                            @foreach($product->product->productImages as $productImage)
                                                                <div><img src="{{asset($productImage->image)}}" alt="product image" width="100" height="80"/></div>
                                                            @endforeach
                                                                <div><img src="{{asset($product->product->image)}}" alt="product image" width="100" height="80"/></div>
                                                                <div><img src="{{asset($product->product->back_image)}}" alt="product image" width="100" height="80"/></div>
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
                                                        <h3 class="title-detail mt-30">{{ truncateWords($product->product->name, 14) }}</h3>
                                                        <div class="product-detail-rating">
                                                            <div class="pro-details-brand">
                                                                <span> Brands: <a href="">{{ $product->product->brand->name }}</a></span>
                                                                @if($product->product->stock_amount > 0)
                                                                    <p><span class="in-stock bg-success text-dark p-1">{{ $product->product->stock_amount }} In Stock</span></p>
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
                                                                <ins><span class="text-brand">{{$product->product->selling_price}}</span></ins>
                                                                <ins><span class="old-price font-md ml-15">{{$product->product->regular_price}}</span></ins>
                                                                <span class="save-price  font-md color3 ml-15">25% Off</span>
                                                            </div>
                                                        </div>
                                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                                        <div class="short-desc mb-30">
                                                            <p class="font-sm">{{ $product->product->short_description }}</p>
                                                        </div>

                                                        <form action="{{route('cart.ad')}}" method="post" class="addTocart">
                                                            @csrf
                                                            <input hidden type="text" name="product_id" value="{{ $product->product->id }}">
                                                            <div class="attr-detail attr-color mb-15">
                                                                <strong class="mr-10">Color</strong>
                                                                <ul class="list-filter color-filter">
                                                                    <li>
                                                                        <select class="form-control" name="color" id="">
                                                                            @foreach($product->product->colors as $key => $color)
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
                                                                            @foreach($product->product->sizes as $key1 => $size)
                                                                                <option value="{{$size->size->name}}" >{{ $size->size->name ?? '' }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                            <div class="detail-extralink">
                                                                <div class="row">
                                                                    <input type="number" name="qty" class="form-control w-100" value="1" min="1"  max="{{ $product->product->stock_amount }}"/>
                                                                </div>
                                                                <div class="product-extra-link2">
                                                                    <button type="submit" class="button button-add-to-cart btn-sm mx-2">Add to cart</button>
                                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up wishlist" id="wishlist{{$key}}"  href="#{{ route('wishlist.ad',$product->product->id) }}" data-value="{{$product->product->id}}"><i class="fi-rs-heart"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <ul class="product-meta font-xs color-grey mt-50">
                                                            <li class="mb-5">SKU: <a href="#">{{$product->product->code}}</a></li>
                                                            <li class="mb-5">Tags: {{$product->product->tags}}</li>
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
                @endforeach
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            @foreach($ad04s as $ad04)
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{asset($ad04->product->image ?? '')}}" height="300px" width="100%" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">{{$ad04->title}}</h4>
                    <h1 class="fw-600 mb-20">{{$ad04->sub_title}}</h1>
                    <a href="{{ route('product-detail',$ad04->product->slug ?? '') }}" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                @foreach ($product_offers as $product_offer)
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ asset($product_offer->image) }}" height="200px" width="300px" alt="">
                        <div class="banner-text">
                            <span>{{ $product_offer->title_one }}</span>
                            <h4>{{ $product_offer->title_two }} <br>{{ $product_offer->title_three }}</h4>
                            <a class="btn btn-success" href="{{route('product-detail', $product_offer->product->slug ?? '' )}}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach($vendor_products as $vendor_product)
                    <div class="product-cart-wrap small hover-up" style="height: 410px; border: 1px solid black; margin: 1px">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('product-detail',$vendor_product->slug)}}">
                                    @if($vendor_product->image != '')
                                        <img class="default-img imageHeight" src="{{asset($vendor_product->image)}}" height="200" alt="">
                                    @else
                                        <img src="{{asset('/')}}no_image.jpg" class="p-0 default-img imageHeight" height="200" alt="" />
                                    @endif
                                    @if($vendor_product->back_image != '')
                                        <img class="hover-img imageHeight" src="{{asset($vendor_product->back_image)}}" height="200" alt="">
                                    @else
                                        <img src="{{asset('/')}}no_image.jpg" class="hover-img imageHeight" height="200" alt="" />
                                    @endif
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">25%</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{route('product-detail', $vendor_product->slug)}}">{{ \Illuminate\Support\Str::limit($vendor_product->name,60) }}</a></h2>
                            <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                            </div>
                            <div class="product-price">
                                <span>৳ {{$vendor_product->selling_price}} </span>
                                <span class="old-price">৳ {{$vendor_product->regular_price}} </span>
                            </div>
                            <div class="">
                                <form action="{{route('cart.ad')}}" method="post" class="addTocart">
                                    @csrf
                                    <input hidden type="text" name="product_id" value="{{ $vendor_product->id }}">
                                    <div hidden class="attr-detail attr-color mb-15">
                                        <strong class="mr-10">Color</strong>
                                        <ul class="list-filter color-filter">
                                            <li>
                                                <select class="form-control" hidden name="color" id="">
                                                    @foreach($vendor_product->colors as $key => $color)
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
                                                    @foreach($vendor_product->sizes as $key1 => $size)
                                                        <option {{$key == 0 ? 'selected':''}} value="{{$size->size->name}}" >{{ $size->size->name ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                    <div hidden class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="">
                                        <div class="row">
                                            <input type="number" hidden name="qty" class="form-control w-100" value="1" min="1"  max="{{ $vendor_product->stock_amount }}"/>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-sm btn-success" style="border-radius: 100%"><i class="fi-rs-shopping-bag-add text-white"></i></button>
                                        </div>
                                    </div>
                                </form>
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
                    <div class="banner-bg wow fadeIn animated" style="background-image: url({{asset($ad12->image)}})">
                        <div class="banner-content">
                            <h5 class="text-grey-4 mb-15">{{$ad12->title}}</h5>
                            <h2 class="fw-600"><span class="text-brand">{{$ad12->sub_title}}</span> {{$ad12->discount}}%</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

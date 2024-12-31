@extends('website.master')
@section('title', 'Product Brand Page')
@section('body')
    <section class="mt-2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-6 my-2">
                    <select name="category" class="p-2" id="categoryFilter">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-6 my-2">
                    <div class="" id="">
                        <select name="" class="p-2" id="subCategoryId">
                            <option value="">please select a category</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-6 my-2">
                    <select name="" class="p-2" id="brandFilter">
                        <option value="">All Brands</option>
                        @foreach($brands as $brand)
                            <option {{$brandSlug == $brand->slug ? 'selected':''}} value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1 col-6 my-2">
                    <select name="" class="p-2" id="colorFilter">
                        <option value="">All Colors</option>
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1 col-6 my-2">
                    <select name="" class="p-2" id="sizeFilter">
                        <option value="">All Sizes</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1 col-6 my-2">
                    <select name="" class="p-2" id="sortByFilter">
                        <option value="">Sort By</option>
                        <option value="latest">Latest</option>
                        <option value="oldest">Oldest</option>
                        <option value="a-to-z">A to Z</option>
                        <option value="z-to-a">Z to A</option>
                        <option value="low-to-high">Low to High</option>
                        <option value="high-to-low">High to Low</option>
                    </select>
                </div>
                <div class="col-md-3 col-12 my-2 d-flex">
                    <input type="number" id="min_price" placeholder="Min Price">
                    <input type="number" id="max_price" placeholder="Max Price">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row product-grid-3" id="filterProducts">
                        @foreach($products as $key => $product)
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
                                        <div class="product-action-1 d-flex">
{{--                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#latestViewModal{{ $rand = rand() }}"><i class="fi-rs-eye"></i></a>--}}
                                            <form action="{{route('cart.ad')}}" method="post" class="addTocart" id="addToCart{{$key}}">
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
                                            <span class="hot bg-primary fw-bold badge" id="product-badge-{{ $product->id }}">new</span>
                                        </div>
                                        <div class="product-badges product-badges-position-right text-center product-badges-mrg">
                                            <span class="hot p-1 rounded-3 {{ $product->stock_amount >= 11 ? 'bg-success text-dark':'bg-danger text-white' }}"> {{ $product->stock_visibility == 1 ? $product->stock_amount :''}} {{ $product->stock_amount >= 11 ? 'In Stock ':'Stock Out' }}</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('product-category',$product->category->slug)}}">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="{{ route('product-detail',$product->slug) }}">{{ \Illuminate\Support\Str::limit($product->name, 85)}}</a></h2>
                                        <div class="product-price">
                                            <span>৳ {{$product->selling_price}}</span>
                                            <span class="old-price">৳ {{$product->regular_price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="modal fade custom-modal" id="latestViewModal{{$rand}}" tabindex="-1" aria-labelledby="latestViewModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
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
                                                                <span> Brands: <a href="shop-grid-right.html">{{ $product->brand->name }}</a></span>
                                                                @if($product->stock_amount > 0)
                                                                    <p><span class="in-stock bg-success text-dark p-1">{{ $product->stock_amount }} In Stock</span></p>
                                                                @else
                                                                    <p><span class="in-stock bg-danger text-success p-1">Stock Out</span></p>
                                                                @endif
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
                                                                <ins><span class="text-brand">{{$product->selling_price}}</span></ins>
                                                                <ins><span class="old-price font-md ml-15">{{$product->regular_price}}</span></ins>
                                                                <span class="save-price  font-md color3 ml-15">25% Off</span>
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
                                                            <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- Detail Info -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                        @endforeach
                    </div>
                    <!-- Load More Button -->
                    <div class="text-center mt-4">
                        <button id="load-more" class="btn btn-primary">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            let offset = {{ $products->count() }}; // Start from the number of products already loaded.

            $('#load-more').click(function() {
                $.ajax({
                    url: '{{route('product.loadMore')}}',
                    method: 'GET',
                    data: { offset: offset },
                    success: function(response) {
                        if(response.number > 0) {
                            $('#filterProducts').append(response.view);
                            offset = offset + response.number;
                        } else {
                            $('#load-more').hide(); // Hide button if no more products are available
                        }
                    },
                    error: function() {
                        alert('Error loading products.');
                    }
                });
            });
        });
    </script>
@endpush

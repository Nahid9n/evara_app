@extends('website.master')
@section('title', 'Product SubCategory Page')
@section('body')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section class="mt-2 mb-2">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <a class="shop-filter-toogle" href="#">
                        <span class="fi-rs-filter mr-5"></span>
                        Filters
                        <i class="fi-rs-angle-small-down angle-down"></i>
                        <i class="fi-rs-angle-small-up angle-up"></i>
                    </a>
                    <div class="shop-product-fillter-header">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                <h5 class="section-title style-1 wow fadeIn animated">Category</h5>
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <input type="checkbox" id="{{ $category->id }}" onclick="filter(); setSubCategory({{ $category->id }})" {{$categorySlug == $category->slug ? 'checked':''}} class="form-check-input categoryCheckBox"  value="{{ $category->id }}">
                                        <label class="form-check-label">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5" id="subCategoryId">
                                <h5 class="section-title style-1 wow fadeIn animated">Select Your Choice</h5>
                                @foreach($subcategories as $subcategory)
                                    <div class="form-check">
                                        <input type="checkbox" id="{{ $subcategory->id }}" onclick="filter()" class="form-check-input subCategoryCheckBox" {{$subCategorySlug == $subcategory->slug ? 'checked':''}}  value="{{ $subcategory->id }}">
                                        <label class="form-check-label">{{ $subcategory->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                <h5 class="section-title style-1 wow fadeIn animated">Brand</h5>
                                @foreach($brands as $brand)
                                    <div class="form-check">
                                        <input type="checkbox" id="{{ $brand->id }}" onclick="filter()" class="form-check-input brandCheckBox" value="{{ $brand->id }}">
                                        <label class="form-check-label">{{ $brand->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                <h5 class="section-title style-1 wow fadeIn animated">Color</h5>
                                @foreach($colors as $color)
                                    <div class="form-check">
                                        <input type="checkbox" id="{{ $color->id }}" onclick="filter()" class="form-check-input colorCheckBox" value="{{ $color->id }}">
                                        <label class="form-check-label">{{ $color->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                <h5 class="section-title style-1 wow fadeIn animated">sizes</h5>
                                @foreach($sizes as $size)
                                    <div class="form-check">
                                        <input type="checkbox" id="{{ $size->id }}" onclick="filter()" class="form-check-input sizeCheckBox" value="{{ $size->id }}">
                                        <label class="form-check-label">{{ $size->code }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                                <h5 class="widget-title mb-10">Fill by price</h5>
                                <div class="form-group col-md-12">
                                    <div class="range-group">
                                        <input type="range" class="form-range-control bg-secondary" id="maxRange" min="0" max="10000" value="" onmousemove="inputRange1.value=value" onchange="filter()">
                                        <output class="border range-group-text br-5 p-2 ms-4" id="inputRange1"></output>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="col-lg-2 col-md-4 mb-lg-0 mb-md-5 mb-sm-5">
                               <h5 class="mb-20">By Review</h5>
                               <div class="product-rate-cover">
                                   <div class="product-rate d-inline-block">
                                       <div class="product-rating" style="width:100%">
                                       </div>
                                   </div>
                                   <span class="font-small ml-5 text-muted"> (25)</span>
                               </div>
                               <div class="product-rate-cover">
                                   <div class="product-rate d-inline-block">
                                       <div class="product-rating" style="width:80%">
                                       </div>
                                   </div>
                                   <span class="font-small ml-5 text-muted"> (25)</span>
                               </div>
                               <div class="product-rate-cover">
                                   <div class="product-rate d-inline-block">
                                       <div class="product-rating" style="width:60%">
                                       </div>
                                   </div>
                                   <span class="font-small ml-5 text-muted"> (25)</span>
                               </div>
                               <div class="product-rate-cover">
                                   <div class="product-rate d-inline-block">
                                       <div class="product-rating" style="width:40%">
                                       </div>
                                   </div>
                                   <span class="font-small ml-5 text-muted"> (25)</span>
                               </div>
                               <div class="product-rate-cover">
                                   <div class="product-rate d-inline-block">
                                       <div class="product-rating" style="width:20%">
                                       </div>
                                   </div>
                                   <span class="font-small ml-5 text-muted"> (25)</span>
                               </div>
                           </div>--}}

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shop-product-fillter">
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3" id="filterProducts">
                        @foreach($products as $key => $product)
                            <div class="col-lg-3 col-md-4 col-12 shadow mb-2">
                                <div class="product-cart-wrap mb-30 h-100" style="height: 500px">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product-detail',$product->slug) }}">
                                                <img class="default-img" src="{{asset($product->image)}}" height="300" alt="">
                                                <img class="hover-img" src="{{asset($product->back_image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#featuredViewModal{{$key}}"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up wishlist" id="wishlist{{$key}}"  href="#{{ route('wishlist.ad',$product->id) }}" data-value="{{$product->id}}"><i class="fi-rs-heart"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">25%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ route('product-detail',$product->slug) }}">{{ truncateWords($product->name, 14) }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>{{$product->selling_price}} </span>
                                            <span class="old-price">{{$product->regular_price}}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ route('product-detail',$product->slug) }}"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                        <div class="product-category">
                                            <a href="{{route('product-category',$product->category->slug)}}">category : {{$product->category->name}}</a><br>
                                            <a href="{{route('product-brand',$product->brand->slug)}}">brand : {{$product->brand->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom-modal" id="featuredViewModal{{$key}}" tabindex="-1" aria-labelledby="latestViewModalLabel" aria-hidden="true">
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
                                                                            <option label="" selected disabled>select color</option>
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
                                                                            <option label="" selected disabled>select size</option>
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
                            </div>
                        @endforeach
                        <div class="pagination-area text-center mt-15 mb-sm-5 mb-lg-0">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection



@if(\Request::route()->getname() == "home")

<!-- Modal -->
<div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="deal" style="background-image: url('{{asset('/')}}website/assets/imgs/banner/menu-banner-7.png')">
                    <div class="deal-top">
                        <h2 class="text-brand">Deal of the Day</h2>
                        <h5>Limited quantities.</h5>
                    </div>
                    <div class="deal-content">
                        <h6 class="product-title"><a href="shop-product-right.html">Summer Collection New Morden Design</a></h6>
                        <div class="product-price"><span class="new-price">$139.00</span><span class="old-price">$160.99</span></div>
                    </div>
                    <div class="deal-bottom">
                        <p>Hurry Up! Offer End In:</p>
                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"><span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span></div>
                        <a href="shop-grid-right.html" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
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
                                <figure class="border-radius-10">
                                    <img src="{{asset('/')}}website/assets/imgs/shop/product-16-2.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('/')}}website/assets/imgs/shop/product-16-1.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('/')}}website/assets/imgs/shop/product-16-3.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('/')}}website/assets/imgs/shop/product-16-4.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('/')}}website/assets/imgs/shop/product-16-5.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('/')}}website/assets/imgs/shop/product-16-6.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('/')}}website/assets/imgs/shop/product-16-7.jpg" alt="product image">
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails pl-15 pr-15">
                                <div><img src="{{asset('/')}}website/assets/imgs/shop/thumbnail-3.jpg" alt="product image"></div>
                                <div><img src="{{asset('/')}}website/assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                <div><img src="{{asset('/')}}website/assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                <div><img src="{{asset('/')}}website/assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                <div><img src="{{asset('/')}}website/assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                <div><img src="{{asset('/')}}website/assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                <div><img src="{{asset('/')}}website/assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
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
                            <h3 class="title-detail mt-30">Colorful Pattern Shirts HD450</h3>
                            <div class="product-detail-rating">
                                <div class="pro-details-brand">
                                    <span> Brands: <a href="shop-grid-right.html">Bootstrap</a></span>
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
                                    <ins><span class="text-brand">$120.00</span></ins>
                                    <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                    <span class="save-price  font-md color3 ml-15">25% Off</span>
                                </div>
                            </div>
                            <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                            <div class="short-desc mb-30">
                                <p class="font-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi,!</p>
                            </div>

                            <div class="attr-detail attr-color mb-15">
                                <strong class="mr-10">Color</strong>
                                <ul class="list-filter color-filter">
                                    <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                    <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                    <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                    <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                    <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                    <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                    <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                </ul>
                            </div>
                            <div class="attr-detail attr-size">
                                <strong class="mr-10">Size</strong>
                                <ul class="list-filter size-filter font-small">
                                    <li><a href="#">S</a></li>
                                    <li class="active"><a href="#">M</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">XXL</a></li>
                                </ul>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="detail-extralink">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>

                                </div>
                            </div>
                            <ul class="product-meta font-xs color-grey mt-50">
                                <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
                            </ul>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<header class="header-area header-style-1 header-height-2 " style="background-color: #fcfcfc">
    <div class="header-top header-top-ptb-1 d-none d-lg-block" style="background-color: #000000">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><i class="fi-rs-smartphone text-white"></i> <a href="#" class="text-white">{{$setting->contact_phone}}</a></li>
                            <li><i class="fi-rs-marker text-white"></i><a  href="" class="text-white">Our location</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li class="text-white">Get great devices up to 50% off <a href="shop-grid-right.html">View details</a></li>
                                <li class="text-white">Supper Value Deals - Save more with coupons</li>
                                <li class="text-white">Trendy 25silver jewelry, save up 35% off today <a href="shop-grid-right.html">Shop now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>
                                <a class="language-dropdown-active text-white" href="#"> <i class="fi-rs-world"></i> English <i
                                        class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li><a href="#"><img src="{{asset('/')}}website/assets/imgs/theme/flag-fr.png"
                                                         alt="">Français</a></li>
                                    <li><a href="#"><img src="{{asset('/')}}website/assets/imgs/theme/flag-dt.png"
                                                         alt="">Deutsch</a></li>
                                    <li><a href="#"><img src="{{asset('/')}}website/assets/imgs/theme/flag-ru.png"
                                                         alt="">Pусский</a></li>
                                </ul>
                            </li>
                            @if(Session::get('vendor_id'))
                                <li>
                                    <a class="language-dropdown-active text-white" href="#"> <i
                                            class="fi-rs-user"></i> {{Session::get('vendor_name')}} <i
                                            class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="{{ route('vendor.dashboard') }}" class=" text-white"><i class="fi-rs-home"></i>Dashboard</a></li>
                                        <li><a href="{{route('vendor.logout')}}" class="text-white"><i class="fi-rs-lock"></i>Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                @if(auth()->check())
                                    <li>
                                        <a class="language-dropdown-active text-white" href="#"> <i
                                                class="fi-rs-user"></i> {{auth()->user()->name}} <i
                                                class="fi-rs-angle-small-down"></i></a>
                                        <ul class="language-dropdown">
                                            <li><a href="{{ route('customer.dashboard') }}"><i class="fi-rs-home"></i>Dashboard</a></li>
                                            <li><a href="{{route('customer-logout')}}"><i class="fi-rs-lock"></i>Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="text-white"><i class="fi-rs-user"></i><a class="text-white" href="{{route('login-register')}}">Log In / Sign Up</a>
                                    </li>
                                @endif
                            @endif

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block sticky-bar">
        <div class="container">
            <p class="text-success text-center">{{session('message')}}</p>
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{route('home')}}"><img src="{{asset($setting->logo_png)}}" alt="{{$setting->company_name}}"></a>
                </div>
                <div class="header-right">

                    <div class="search-style-2">
                        <form action="#">
                            <input class="searchText" type="text" placeholder="Search for items..."/>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{ route('wishlist.index') }}">
                                    <img class="svgInject" alt="Evara" src="{{asset('/')}}website/assets/imgs/theme/icons/icon-heart.svg">
                                    @if($wishlists != '')
                                        <span class="pro-count blue" id="wishlistCartCount"><small>{{ count($wishlists) }}</small></span>
                                    @else
                                        <span class="pro-count blue" id="wishlistCartCount"><small>0</small></span>
                                    @endif
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('cart.index') }}">
                                    <img alt="Evara" src="{{asset('/')}}website/assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count blue" id="CartItemCount">
                                        @if(auth()->check())
                                        <small>{{ \App\Models\Cart::where('customer_id',auth()->user()->id)->count() }}</small>
                                        @else
                                            <small>0</small>
                                        @endif
                                    </span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2" id="cartItems">
                                    {{-- div append here ajaxcartitem blade --}}
                                    <ul>
                                        @if(auth()->check())
                                        @php( $sum = 0 )
                                        @php($cartItems = \App\Models\Cart::where('customer_id',auth()->user()->id)->latest()->take(5)->get())
                                        @php($seeALlCartItems = \App\Models\Cart::where('customer_id',auth()->user()->id)->count())
                                        @foreach($cartItems as $cartItem)
                                            <li>
                                                <div class="row">
                                                    <div class="col-2">
                                                        <a href="">
                                                            <img alt="Evara" src="{{asset($cartItem->image)}}">
                                                        </a>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="shopping-cart-title">
                                                            <h4><a href="">{{ $cartItem->name }}</a></h4>
                                                            <h5>
                                                                <span>{{ $cartItem->qty }} × {{ $cartItem->product->selling_price }}</span>
                                                                <span> = {{$total = $cartItem->qty * $cartItem->product->selling_price }}</span>

                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="shopping-cart-delete">
                                                            <a href="{{route('cart.delete', $cartItem->id)}}" onclick="return confirm('Are you sure to remove this..')"><i class="fi-rs-cross-small"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @php($sum = $sum + $total)
                                        @endforeach

                                        @if($seeALlCartItems > 4)
                                        <li class="justify-content-center">
                                            <a href="{{ route('cart.index') }}">See All</a></li>
                                        @endif

                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>TK. {{ $sum }}</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('cart.index') }}" class="outline">View cart</a>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{route('home')}}"><img src="{{asset($setting->logo_png)}}" alt="{{$setting->company_name}}"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            <ul>
                                @foreach($categories as $category)
                                    <li class="{{ count($category->subCategory) > 0 ? 'has-children' : '' }}">
                                        <a href="{{route('product-category',$category->slug)}}"><i class="evara-font-dress"></i>{{$category->name}}</a>
                                        @if(count($category->subCategory) > 0)
                                            <div class="dropdown-menu">
                                                <ul class="mega-menu d-lg-flex">
                                                    <li class="mega-menu-col col-lg-7">
                                                        <ul class="d-lg-flex">
                                                            <li class="mega-menu-col col-lg-6">
                                                                <ul>
                                                                    @foreach($category->subCategory as $subCategory)
                                                                        <li><a class="dropdown-item nav-link nav_item" href="{{route('product-sub-category', $subCategory->slug)}}">{{$subCategory->name}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>

                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <div class="more_categories">Show more...</div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li>
                                    <a class="active" href="{{route('home')}}">Home</a>
                                </li>
                                <li>
                                    <a class="active" href="{{route('product-all')}}">Products</a>
                                </li>
                                <li><a href="#">policies<i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach($pages as $page)
                                        <li>
                                            <a href="{{route('page.details',$page->slug)}}">{{$page->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a class="active" href="{{route('coupons')}}">Coupons</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-headset"></i><span>Hotline</span> 1900 - 888 </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="{{ route('wishlist.index') }}">
                                <img class="svgInject" alt="Evara" src="{{asset('/')}}website/assets/imgs/theme/icons/icon-heart.svg">
                                <span class="pro-count blue" id="wishlistCartCount">
                                    @if($wishlists != '')
                                        <small>{{ count($wishlists) }}</small>
                                    @else
                                        <small>0</small>
                                    @endif

                                </span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{ route('cart.index') }}">
                                <img alt="Evara" src="{{asset('/')}}website/assets/imgs/theme/icons/icon-cart.svg">
                                <span class="pro-count blue" id="CartItemCount">
                                    @if(auth()->check())
                                        <small>{{ \App\Models\Cart::where('customer_id',auth()->user()->id)->count() }}</small>
                                    @else
                                        <small>0</small>
                                    @endif
                                </span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2" id="cartItems">
                                {{-- div append here ajaxcartitem blade --}}
                                <ul>
                                    @if(auth()->check())
                                    @php( $sum = 0 )
                                    @php($cartItems = \App\Models\Cart::where('customer_id',auth()->user()->id)->latest()->take(5)->get())
                                    @php($seeALlCartItems = \App\Models\Cart::where('customer_id',auth()->user()->id)->count())
                                    @foreach($cartItems as $cartItem)
                                        <li>
                                            <div class="row">
                                                <div class="col-2">
                                                    <a href="">
                                                        <img alt="Evara" src="{{asset($cartItem->image)}}">
                                                    </a>
                                                </div>
                                                <div class="col-9">
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="">{{ $cartItem->name }}</a></h4>
                                                        <h5>
                                                            <span>{{ $cartItem->qty }} × {{ $cartItem->product->selling_price }}</span>
                                                            <span> = {{$total = $cartItem->qty * $cartItem->product->selling_price }}</span>

                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="shopping-cart-delete">
                                                        <a href="{{route('cart.delete', $cartItem->id)}}" onclick="return confirm('Are you sure to remove this..')"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @php($sum = $sum + $total)
                                    @endforeach
                                    @if($seeALlCartItems > 4)
                                        <li class="justify-content-center">
                                            <a href="{{ route('cart.index') }}">See All</a></li>
                                    @endif
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>TK. {{ $sum }}</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="{{ route('cart.index') }}" class="outline">View cart</a>
                                        <a href="{{ route('checkout') }}">Checkout</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="index-2.html"><img src="assets/imgs/theme/logo.svg" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input class="searchText" type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="{{route('product-category',$category->slug)}}"><i class="evara-font-dress"></i>{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class=""><a href="{{route('home')}}">Home</a></li>
                        <li class=""><a href="{{route('product-all')}}">Products</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a class="active" href="#">Policies</a>
                            <ul class="dropdown">
                                @foreach($pages as $page)
                                    <li>
                                        <a href="{{route('page.details',$page->slug)}}">{{$page->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class=""><a href="{{route('coupons')}}">Coupon</a></li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info">
                    @if(auth()->check())
                        <a class="language-dropdown-active" href="#"> <i
                                class="fi-rs-user"></i> {{auth()->user()->name}} </a>
                        <ul class="language-dropdown">
                            <li><a href="{{ route('customer.dashboard') }}"><i class="fi-rs-home"></i> Dashboard</a></li>
                            <li><a href="{{route('customer-logout')}}"><i class="fi-rs-lock"></i> Logout</a>
                            </li>
                        </ul>
                    @else
                        <a href="{{route('login-register')}}">Log In / Sign Up </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

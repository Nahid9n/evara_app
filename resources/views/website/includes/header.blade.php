

@if(\Request::route()->getname() == "home")
@if($popup)
<!-- Modal -->
<div  class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn-close" id="close-popup" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="deal" style="background-image: url('{{asset($popup->popup_image)}}')">
                    <div class="deal-top">
                        <h2 class="text-brand">{{$popup->title}}</h2>
                        <h5 class="product-title fw-bold">{{$popup->description}}</h5>
                    </div>
                    <div class="deal-bottom">
                        @if($popup->url)
                        <a href="{{$popup->url}}" class="btn hover-up fw-bold btn-primary" style="color: black;">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif

<header class="header-area header-style-1 header-height-2 text-white" style="background-color: #8eb4f4; border-bottom: 1px solid black;">
    <div class="header-top header-top-ptb-1 d-none d-lg-block" style="background-color: #111111">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><i class="fi-rs-smartphone text-white"></i> <a href="#" class="text-white">{{$setting->contact_phone}}</a></li>
                            <li><i class="fi-rs-marker text-white"></i><a  href="" class="text-white">Our location</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                @foreach($newsTops as $news)
                                <li class="text-white">{{$news->news}} @if($news->url) <a href="{{$news->url}}"> View details</a> @endif</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
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
                                    @if(auth()->user()->role == 'customer')
                                    <li>
                                        <a class="language-dropdown-active text-white" href="#"> <i
                                                class="fi-rs-user"></i> {{auth()->user()->name}} <i
                                                class="fi-rs-angle-small-down"></i></a>
                                        <ul class="language-dropdown">
                                            <li><a href="{{ route('customer.dashboard') }}"><i class="fi-rs-home"></i>Dashboard</a></li>
                                            <li><a href="{{route('customer-logout')}}" onclick="return confirm('are you sure to logout ?')"><i class="fi-rs-lock"></i>Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="text-white"><i class="fi-rs-user"></i><a class="text-white" href="{{route('login-register')}}">Log In / Sign Up</a></li>
                                    @endif
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
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block sticky-bar" style="background-color: #8eb4f4">
        <div class="container">
            <p class="text-success text-center">{{session('message')}}</p>
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{route('home')}}"><img src="{{asset($setting->logo_png)}}" alt="{{$setting->company_name}}"></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            <input class="" id="globalSearch" type="text" placeholder="Search for items..."/>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{ route('product-all') }}">
                                    <img class="svgInject" alt="Evara" src="{{asset('/')}}website/assets/imgs/theme/new-product_1474713.png">
                                    <span class="pro-count blue" id="wishlistCartCount">
                                    <small>{{ \App\Models\Product::where('status',1)->count() }}</small>
                                </span>
                                </a>
                            </div>
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
            <div class="header-wrap header-space-between" style="top: 0">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{route('home')}}"><img src="{{asset($setting->logo_png)}}" alt="{{$setting->company_name}}"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active text-dark" href="#">
                            <span class="fi-rs-apps text-dark"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large" style="z-index:10000;">
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
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li>
                                    <a class="active text-dark" href="{{route('home')}}">Home</a>
                                </li>
                                @foreach($highlights as $key => $highlight)
                                <li>
                                    <a class="active text-dark" href="{{route('highlight-product-all',$highlight->name)}}">{{ $highlight->name }}</a>
                                </li>
                                @endforeach
                                <li><a href="#">policies<i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach($pages as $page)
                                        <li>
                                            <a href="{{route('page.details',$page->slug)}}">{{$page->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p class="text-danger"><i class="fi-rs-headset"></i><span>Hotline</span> {{$setting->support_phone}} </p>

                </div>
                {{--<p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>--}}
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="{{ route('product-all') }}">
                                <img class="svgInject" alt="Evara" src="{{asset('/')}}website/assets/imgs/theme/new-product_1474713.png">
                                <span class="pro-count blue" id="wishlistCartCount">
                                    <small>{{ \App\Models\Product::where('status',1)->count() }}</small>
                                </span>
                            </a>
                        </div>
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
                <a href="{{route('home')}}"><img src="{{asset($setting->logo_png)}}" alt="{{$setting->company_name}}"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border form-group">
                <form action="#">
                    <input class="" id="globalSearchMobile" type="text" placeholder="Search for items…">
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
                        @foreach($highlights as $key => $highlight)
                            <li>
                                <a class="active" href="{{route('highlight-product-all',$highlight->name)}}">{{ $highlight->name }}</a>
                            </li>
                        @endforeach
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a class="active" href="#">Policies</a>
                            <ul class="dropdown">
                                @foreach($pages as $page)
                                    <li>
                                        <a href="{{route('page.details',$page->slug)}}">{{$page->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
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
                            <li><a href="{{route('customer-logout')}}" onclick="return confirm('are you sure to logout ?')"><i class="fi-rs-lock"></i> Logout</a>
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

<style>
    .navbar-nav .nav-link {
        color: #fff;
    }
    .dropend .dropdown-toggle {
        color: black;
        margin-left: 1em;
    }
    .dropdown-item:hover {
        color: white;
    }
    .dropdown .dropdown-menu {
        display: none;
    }
    .dropdown:hover > .dropdown-menu,
    .dropend:hover > .dropdown-menu {
        display: block;
        margin-top: 0.125em;
        margin-left: 0.125em;
    }
    @media screen and (min-width: 769px) {
        .dropend:hover > .dropdown-menu {
            position: absolute;
            top: 0;
            left: 100%;
        }
        .dropend .dropdown-toggle {
            margin-left: 1em;
        }
    }
</style>
<section class="category_tog">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <ul>
                    <li class="nav-item dropdown">
                        <a class="" href="" id="dropdownMenuLink" aria-expanded="false">
                            <i style="margin-right: 10px;" class="fa fa-bars" ></i>
                            All Category
                        </a>
                        <ul class="dropdown-menu bg-white text-dark" aria-labelledby="dropdownMenuLink">
                            {{--@php
                                $categoriess =   App\Models\Category::where('status',1)->whereIn('parent_id',[0])->latest()->take(10)->get();
                            @endphp
                            @foreach($categoriess as $category)
                                <li class="dropdown dropend bg-white text-dark" style="width: 350px;">
                                    <a class="dropdown-item bg-white text-dark" href="{{route('product.by.category',$category->name)}}">{{$category->name}}</a>
                                    @php
                                        $subcategories =   App\Models\Category::where('parent_id',$category->id)->where('status',1)->get();
                                    @endphp
                                    @if(isset($subcategories) != null)
                                        <ul class="dropdown-menu bg-secondary-transparent text-dark" aria-labelledby="multilevelDropdownMenu1">
                                            @foreach($subcategories as $subcategory)
                                                <li class="bg-secondary text-white">
                                                    <a class="dropdown-item bg-secondary text-white" href="{{route('product.by.category',$subcategory->name)}}">{{$subcategory->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach--}}
                        </ul>

                    </li>
                    {{--<li class=" dropdown">
                        <a href="" class="" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu">

                                <li class="nav-item dropend">
                                    <a class="nav-link" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{$category->name}}
                                    </a>

                                    <ul class="dropdown-menu dropend">

                                        <li><a class="dropdown-item" href="#"></a></li>

                                    </ul>

                                </li>
                            @endforeach
                        </ul>
                    </li>--}}
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{--{{ route('all-product') }}--}}">All Products</a></li>
                    <li><a href="{{--{{ route('blog') }}--}}">Blog</a></li>
                    <li><a href="{{--{{route('brand')}}--}}">Brand</a></li>
                    <li><a href="{{route('coupons')}}">Coupons</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>


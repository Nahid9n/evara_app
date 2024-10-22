@extends('website.master')
@section('title','All Coupons')
@section('body')

<style>
    #loader {
        height: 30px;
        width: 30px;
        display: flex;
        text-align: center;
        margin: 0 auto;
        display: none;
    }

    .modal-backdrop {
        z-index: 9999;
    }

    .breadcrumb {
        background: initial;
    }

    .coupon_item{
        color: #fff;
        padding: 20px;
        min-height: 230px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .sliver{
        background: linear-gradient(to right, #b0b9b9 0%, #656e6e 100%);
    }

    .classic{
        background: linear-gradient(to right, #7cc4c3 0%, #479493 100%);
    }
    .gold{
        background: linear-gradient(to right, #c9ad58 0%, #c3862c 100%);
    }
    .premium{
        background: linear-gradient(to right, #7cc4c3 0%, #4CAF50 100%);
    }

    .coupon_item p{
        color: #fff;
    }

    .coupon_item a{
        color: #fff;
        text-decoration: underline;
    }

    .coupon_code{
        padding: 7px 20px;
        border-radius: 10px;
    }

    .coupon_top_part{
        padding-bottom: 35px;
    }

    .coupon_bottom_part{
        padding-top: 30px;
        border-top: 1px  dashed #fff;
    }

    .coupon_cart{
        font-family: monospace;
        padding-right: 25px;
    }

    .coupon_price{
        font-family: inherit;
        font-size: 20px;
        padding-top: 20px;
    }
</style>

<section class="home_all">
    <div class="container">
        <div class="row">
            <div class="home_alls">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class=""> > Coupons</li>
{{--                        <li class="breadcrumb-item">Coupons</li>--}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @foreach($coupons as $coupon)
            <div class="col-lg-4">
                <div class="coupon_item bg-secondary" style="height: 300px">
                    <div class="coupon_top_part">
                        @if(isset($coupon->product->name))
                        <span class="coupon_cart">product : {{ $coupon->product->name }}</span> {{--Visit Store : <a href="">{{ $coupon->product->brand->name }}</a>--}}
                        @endif
                        @if($coupon->discount_status == 0 )
                        <p class="coupon_price">{{$currency->symbol ?? ''}}{{ $coupon->discount }} OFF</p>
                        @else
                        <p class="coupon_price">{{ $coupon->discount }}% OFF</p>
                        @endif
                    </div>

                    <div class="coupon_bottom_part">
                        @if(isset($coupon->min_shopping))
                            @if($coupon->discount_status == 0 )
                            <p>Min Spend {{$currency->symbol ?? ''}}{{ $coupon->min_shopping }} to get ${{ $coupon->discount }} OFF on total orders</p>
                            @else
                            <p>Min Spend {{$currency->symbol ?? ''}}{{ $coupon->min_shopping }} to get {{ $coupon->discount }}% OFF on total orders</p>
                            @endif
                        @endif
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <form action="{{route('collect.coupon')}}" method="post">
                                    @csrf
                                    <input class="form-control" type="hidden" name="coupon_id" value="{{$coupon->id}}">
                                    <input class="form-control" type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
                                    @if(auth()->check())
                                        <button class="btn btn-sm py-0 btn-success" type="submit">collect</button>
                                    @else
                                        <a href="javascript:void(0)" class="btn btn-sm py-0 btn-success" data-bs-target="#loginModal" data-bs-toggle="modal">collect</a>
                                    @endif
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            @endforeach
                <div class="modal fade" id="loginModal" data-bs-backdrop="false" data-bs-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header"></div>

                            <div class="modal-body text-center">
                                <p class="modal-title" id="loginModalLabel">please login first</p>
                                <p class="modal-title my-3">
                                    <a href="{{route('login-register')}}" class="btn btn-success text-white" style="background-color:blue;">Login</a>
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeChatBox()">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            <!-- <div class="col-lg-3">
                <div class="coupon_item classic">
                    <div class="coupon_top_part">
                        <span class="coupon_cart">Filon Asset Store</span> <a href="">Visit Store</a>
                        <p class="coupon_price">20% OFF</p>
                    </div>
                    <div class="coupon_bottom_part">
                        <p>Min Spend $150.000 from Filon Asset Store to get 20% OFF on total orders</p>
                        <p class="text-right coupon_code">Code: MAS500</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="coupon_item gold">
                    <div class="coupon_top_part">
                        <span class="coupon_cart">Filon Asset Store</span> <a href="">Visit Store</a>
                        <p class="coupon_price">$50.000 OFF</p>
                    </div>
                    <div class="coupon_bottom_part">
                        <p>Min Spend $150.000 from Filon Asset Store to get 20% OFF on total orders</p>
                        <p class="text-right coupon_code">Code: MAS500</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="coupon_item premium">
                    <div class="coupon_top_part">
                        <span class="coupon_cart">Filon Asset Store</span> <a href="">Visit Store</a>
                        <p class="coupon_price">$50.000 OFF</p>
                    </div>
                    <div class="coupon_bottom_part">
                        <p>Min Spend $150.000 from Filon Asset Store to get 20% OFF on total orders</p>
                        <p class="text-right coupon_code">Code: MAS500</p>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</section>

@endsection

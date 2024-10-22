@extends('website.master')

@section('title','Checkout Form')

@section('body')


    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index-2.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>

    <section class="mb-50">
            <div class="container">
                <div class="row">
                    <form class="col-md-9" action="{{ 'new-order' }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mt-25 mb-25">
                                    <h4>Checkout Form</h4>
                                </div>
                                <div class="form-group">
                                    @if( isset($customer->name) )
                                        <input type="text" required="" readonly value="{{ $customer->name }}" name="name" placeholder="Full name"/>
                                    @else
                                        <input type="text" required="" name="name" placeholder="Full name"/>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if( isset($customer->email) )
                                        <input type="email" name="email" readonly required="" value="{{ $customer->email }}" placeholder="Email Address *"/>
                                    @else
                                        <input type="email" name="email" required="" placeholder="Email Address *"/>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if( isset($customer->mobile) )
                                        <input type="number" name="mobile" readonly value="{{ $customer->mobile }}" required="" placeholder="Mobile Number">
                                    @else
                                        <input type="number" name="mobile" required="" placeholder="Mobile Number">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea required="" name="delivery_address" placeholder="Delivery Address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="order_review">
                                    <div class="mb-20">
                                        <h4>Your Orders</h4>
                                    </div>
                                    <div class="table-responsive order_table text-center">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @php($sum = 0)
                                            @php($discountTotal = 0)
                                            @php($ids = array())
                                            @foreach($cartItems as $product)
                                                <tr>
                                                    <td class="image product-thumbnail"><img src="{{ asset($product->image ?? '') }}" alt="#"></td>
                                                    <td>
                                                        <h5>
                                                            <a href="{{route('product-detail',$product->product->slug)}}">{{ $product->name }}</a>
                                                        </h5>
                                                        <p class="font-xs">
                                                            <span class="fw-bold">Color: </span> {{$product->color}} <br/>
                                                            <span class="fw-bold">Size: </span> {{$product->size}} <br/>
                                                        </p>
                                                        @if($product->product_id == (Session::get('productProduct_id')))
                                                            @if(Session::has('discount'))
                                                                <p hidden>{{$discount = ( Session::get('discount') ) * $product->qty }}</p>
                                                                <span>{{$currency->symbol ?? '' }} {{$price =(($product->product->selling_price - (Session::get('discount') ?? 0)))}} x {{ $product->qty }}</span>
                                                            @else
                                                                <span>{{$currency->symbol ?? '' }}  {{$price = $product->product->selling_price}} x {{ $product->qty }}</span>
                                                            @endif
                                                        @else
                                                            <p hidden>{{$discount = 0 }}</p>
                                                            <span>{{$currency->symbol ?? '' }}  {{$price = $product->product->selling_price}} x {{ $product->qty }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $total =  $price * $product->qty }}</td>
                                                </tr>
                                                @php( $sum = $sum + $total )
                                                @php($discountTotal = $discountTotal + $discount)
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="border p-md-4 p-30 border-radius cart-totals">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td class="cart_total_label">total</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Tk. {{ $sum }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Tax Amount (15%)</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Tk. {{ $tax = round($sum * 0.15) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Shipping</td>
                                                    <td class="cart_total_amount">
                                                        <i class="ti-gift mr-5"></i>
                                                        <span class="font-lg fw-900 text-brand">Tk. {{ $shippingCost = 60 }}</span>
                                                        {{--<label for="">
                                                            <input style="size: 10px" type="radio" name="shipping_cost" value="60"> Inside Dhaka (BDT 60)
                                                        </label>
                                                        <label for="">
                                                            <input type="radio" name="shipping_cost" value="120"> Output Dhaka (BDT 120)
                                                        </label>--}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Discount</td>
                                                    <td class="cart_total_amount">
                                                        <strong>
                                                            @if(Session::get('couponType') == 'product')
                                                                <span class="font-xl fw-900 text-brand">{{$currency->symbol ?? '' }} {{ $discountTotal }}</span>
                                                            @elseif(Session::get('couponType') == 'total_order')
                                                                <span class="font-xl fw-900 text-brand">{{$currency->symbol ?? '' }} {{ Session::get('discount') ?? 0 }}</span>
                                                            @else
                                                                <span class="font-xl fw-900 text-brand">{{$currency->symbol ?? '' }} 0</span>
                                                            @endif
                                                        </strong>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="cart_total_label">Sub Total</td>
                                                    <td class="cart_total_amount">
                                                        <strong>
                                                            @if(Session::get('couponType') == 'product')
                                                                <span class="font-xl fw-900 text-brand">{{$currency->symbol ?? '' }} {{ $orderTotal = $sum + $tax + $shippingCost }}</span>
                                                            @else
                                                                <span class="font-xl fw-900 text-brand">{{$currency->symbol ?? '' }} {{ $orderTotal = ($sum + $tax + $shippingCost) - (Session::get('discount') ?? 0) }}</span>
                                                            @endif
                                                        </strong>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <input type="hidden" name="order_total" value="{{ $orderTotal }}"/>
                                        <input type="hidden" name="tax_total" value="{{ $tax }}"/>
                                        <input type="hidden" name="shipping_total" value="{{ $shippingCost }}"/>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="payment_method">
                                        <div class="mb-25">
                                            <h5>Payment Method</h5>
                                        </div>
                                        <div class="payment_option">
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_method"
                                                       value="Cash" id="exampleRadios3" checked="">
                                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                                       data-target="#bankTranfer" aria-controls="bankTranfer">Cash On
                                                    Delivery</label>
                                                <div class="form-group collapse in" id="bankTranfer">
                                                    <p class="text-muted mt-5">There are many variations of passages of Lorem
                                                        Ipsum available, but the majority have suffered alteration. </p>
                                                </div>
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_method"
                                                       value="Online" id="exampleRadios4">
                                                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                                       data-target="#checkPayment" aria-controls="checkPayment">Online
                                                    Payment</label>
                                                <div class="form-group collapse in" id="checkPayment">
                                                    <p class="text-muted mt-5">Please send your cheque to Store Name, Store
                                                        Street, Store Town, Store State / County, Store Postcode. </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-3">
                        <div class="row mb-50">
                            <div class="mb-30">
                                <div class="heading_s1 mb-3">
                                    <h4>Apply Coupon (optional)</h4>
                                    <small>( Just For Checking mainly used in checkout page )</small>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="{{route('coupon.apply')}}" method="POST">
                                                @csrf
                                                <div class="form-row row justify-content-center">

                                                        <input type="hidden" class="form-control" name="order_total" value="{{ $sum + (round($sum * 0.15)) + 100 }}">
                                                        <div class="form-group col-lg-6">
                                                            <input class="font-medium" name="coupon" placeholder="Enter Your Coupon">
                                                        </div>

                                                    <div class="form-group col-lg-6">
                                                        <button class="btn btn-sm"><i class="fi-rs-label"></i>Apply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </section>


@endsection

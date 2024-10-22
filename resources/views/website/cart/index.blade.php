@extends('website.master')
@section('body')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">

        <div class="container">
            <div class="row">
                @php($sum = 0)
                @php($discountTotal = 0)
                @php($ids = array())

                <div class="col-12">
                    <form action="{{route('cart.update')}}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <p class="text-center">{{session('message')}}</p>
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key=> $product)
                                    @php(array_push($ids,$product->id))
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ asset($product->image ?? '') }}" alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="{{route('product-detail',$product->product->slug)}}" target="_blank">{{ $product->name }}</a></h5>
                                            <p class="font-xs">
                                                <span class="fw-bold">Color: </span> {{$product->color}} <br/>
                                                <span class="fw-bold">Size: </span> {{$product->size}} <br/>
                                            </p>
                                        </td>
                                        <td class="price" data-title="Price">
                                            @if($product->product_id == (Session::get('productProduct_id')))
                                                @if(Session::has('discount'))
                                                    <p hidden>{{$discount = ( Session::get('discount') ) * $product->qty }}</p>
                                                    <span>{{$currency->symbol ?? '' }} {{$price =(($product->product->selling_price - (Session::get('discount') ?? 0)))}}</span>
                                                @else
                                                    <span>{{$currency->symbol ?? '' }}  {{$price = $product->product->selling_price}}</span>
                                                @endif
                                            @else
                                                <p hidden>{{$discount = 0 }}</p>
                                                <span>{{$currency->symbol ?? '' }}  {{$price = $product->product->selling_price}}</span>
                                            @endif
                                        </td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="d-flex text-center" style="width: 150px">
                                                <span class="down btn btn-sm" id="{{$key}}" onClick='decreaseCount({{ $product->product_id }}, this)'>-</span>
                                                <input type="text" class="form-control text-center counterQty{{ $product->product_id }}" name="data[{{$key}}][qty]" value="{{$product->qty}}">
                                                <span class="up btn btn-sm" id="{{$key}}" onClick='increaseCount({{ $product->product_id }}, this)'>+</span>
                                                <input type="hidden" class="form-control text-center colorUpdate" name="color" value="{{$product->color}}">
                                                <input type="hidden" class="form-control text-center sizeUpdate" name="size" value="{{$product->size}}">
                                                <input type="hidden" class="form-control text-center priceUpdate" name="price" value="{{$price}}">
                                                <input type="hidden" class="form-control form-control-sm" name="data[{{$key}}][rowId]" value="{{$product->rowId}}">
{{--                                                <input type="number" class="form-control counterQty" onclick="QtyChange()" name="data[{{$key}}][qty]" value="{{$product->qty}}" min="1"  max="{{ $product->product->stock_amount }}">--}}
{{--                                                <input type="number" name="data[{{$key}}][qty]" min="1" class="form-control" value="{{ $product->qty }}"/>--}}
{{--                                                <input type="hidden" name="data[{{$key}}][rowId]" class="form-control" value="{{$product->rowId}}"/>--}}
                                            </div>
                                        </td>

{{--                                        <input type="number" name="dat[{{$key}}][qty]" class="form-control" value="{{$product->qty}}"/>--}}

                                        <td class="text-right" data-title="Cart">
                                            <span class="totalPrice{{ $product->product_id }}">TK. {{$total = $price * $product->qty}} </span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <a href="{{route('cart.delete', $product->id)}}" onclick="return confirm('Are you sure to remove this..');" class="btn bg-danger border-0 btn-sm">
                                                <i class="fi-rs-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php($sum = $sum + $total)
                                    @php($discountTotal = $discountTotal + $discount)
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">
                            <button type="submit" class="btn"><i class="fi-rs-shopping-bag mr-10"></i>Update Cart</button>
                            <a href="{{route('home')}}" class="btn"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                    </form>
                    <div class="row text-end">
                        <form action="{{route('cart.clear')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{ json_encode($ids) }}" name="ids">
                            <button type="submit" class="btn btn-sm btn-danger bg-danger px-5" onclick="return confirm('Are you sure to remove this..');">Clear Cart</button>
                        </form>
                    </div>
                    <hr>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-30 mt-50">
                                <div class="heading_s1 mb-3">
                                    <h4>Apply Coupon</h4><small>(Just For Checking mainly used in checkout page)</small>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="{{route('coupon.apply')}}" method="post">
                                                <div class="form-row row justify-content-center">
                                                    @csrf
                                                    <input type="hidden" class="form-control" name="order_total" value="{{ $sum + (round($sum * 0.15)) + 100 }}">
                                                    <div class="form-group col-lg-6">
                                                        <input class="font-medium" name="coupon" placeholder="Enter Your Coupon">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Apply (optional)</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="cart_total_label">Cart Subtotal</td>
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
                                                Shipping Cost : {{ $shippingCost = 100 }}
{{--                                                <label for=""><input type="radio" name="shipping_cost" value="60"> Inside Dhaka (BDT 60)</label>--}}
{{--                                                <label for=""><input type="radio" name="shipping_cost" value="120"> Output Dhaka (BDT 120)</label>--}}
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
                                                        <span class="font-xl fw-900 text-brand">{{$currency->symbol ?? '' }} {{ $sum + $tax + $shippingCost }}</span>
                                                    @else
                                                        <span class="font-xl fw-900 text-brand">{{$currency->symbol ?? '' }} {{ ($sum + $tax + $shippingCost) - (Session::get('discount') ?? 0) }}</span>
                                                    @endif
                                                </strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('checkout') }}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

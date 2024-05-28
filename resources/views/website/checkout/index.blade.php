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

    <section class="mt-50 mb-50">

        <form action="{{ 'new-order' }}" method="post">
            @csrf
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Checkout Form</h4>
                        </div>

                        <div class="form-group">
                            @if( isset($customer->name) )
                                <input type="text" required="" readonly value="{{ $customer->name }}" name="name"
                                       placeholder="Full name"/>
                            @else
                                <input type="text" required="" name="name" placeholder="Full name"/>

                            @endif

                        </div>


                        <div class="form-group">
                            @if( isset($customer->email) )
                                <input type="email" name="email" readonly required="" value="{{ $customer->email }}"
                                       placeholder="Email Address *"/>
                            @else
                                <input type="email" name="email" required="" placeholder="Email Address *"/>
                            @endif

                        </div>
                        <div class="form-group">
                            @if( isset($customer->mobile) )
                                <input type="number" name="mobile" readonly value="{{ $customer->mobile }}" required=""
                                       placeholder="Mobile Number">
                            @else
                                <input type="number" name="mobile" required="" placeholder="Mobile Number">
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea required="" name="delivery_address" placeholder="Delivery Address"></textarea>
                        </div>

                        {{--                        =========
                                                <div class="form-group">
                                                    <div>
                                                        <label for="">Payment Method</label>
                                                    </div>

                                                    <label for="">
                                                        <input type="radio" name="payment_method" style="height: 20px" /> Cash
                                                    </label>
                                                    <label for="">
                                                        <input type="radio" name="payment_method" style="height: 20px" /> Online
                                                    </label>
                                                </div>
                         --}}

                    </div>
                    <div class="col-md-6">
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

                                    @php($sum=0)
                                    @foreach(Cart::content() as $item)

                                        <tr>
                                            <td class="image product-thumbnail"><img
                                                    src="{{ asset($item->options->image) }}" alt="#"></td>
                                            <td>
                                                <h5><a href="#">{{ $item->name }}</a></h5> <span class="product-qty">{{ $item->price }} x {{ $item->qty }}</span>
                                            </td>
                                            <td>{{ $item->subtotal }}</td>
                                        </tr>
                                        @php($sum = $sum+ $item->subtotal)
                                    @endforeach
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="2">{{ $sum }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tax Amount</th>
                                        <td class="product-subtotal" colspan="2">{{ $tax = round( $sum * 0.15) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="2"><em>
                                                {{ $shipping = 100 }}
                                            </em></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900">{{ $orderTotal = $sum + $tax + $shipping }}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <input type="hidden" name="order_total" value="{{ $orderTotal }}"/>
                                <input type="hidden" name="tax_total" value="{{ $tax }}"/>
                                <input type="hidden" name="shipping_total" value="{{ $shipping }}"/>

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
            </div>
        </form>
    </section>


@endsection

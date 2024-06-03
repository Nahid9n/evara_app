<ul>
    @php( $sum = 0 )
    @php($seeALlCartItems = \App\Models\Cart::where('customer_id',Session::get('customer_id'))->count())
    @foreach($cartContents as $cartItem)
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
                            <span>{{ $cartItem->qty }} × {{ $cartItem->price }}</span>
                            <span> = {{ $cartItem->qty * $cartItem->price }}</span>

                        </h5>
                    </div>
                </div>
                <div class="col-1">
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </div>
            </div>
        </li>
        @php($sum = $sum + $cartItem->row_total)
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

<ul>
    @php( $sum = 0 )
    @php($seeALlCartItems = \App\Models\Cart::where('customer_id',auth()->user()->id)->count())
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
                            <span>{{ $cartItem->qty }} × {{ $cartItem->product->selling_price }}</span>
                            <span> = {{$total = $cartItem->qty * $cartItem->product->selling_price }}</span>
                        </h5>
                    </div>
                </div>
                <div class="col-1">
                    <div class="shopping-cart-delete">
                        <a href="{{route('cart.delete', $cartItem->id)}}" onclick="return confirm('Are you sure to remove this..');"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </div>
            </div>
        </li>
        @php($sum = $sum + $total)
    @endforeach
    @if($seeALlCartItems > 5)
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

<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a href="{{ route('customer.dashboard') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.dashboard')? 'active bg-dark bg-dark' : '' }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{--{{ route('customer.wallet') }}--}}" class="nav-link {{ (Route::currentRouteName() == 'customer.wallet')? 'active bg-dark bg-dark' : '' }}"><i class="fi-rs-settings-sliders mr-10"></i>My Wallet</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.orders') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.orders')? 'active bg-dark bg-dark' : '' }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.cancel.orders') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.cancel.orders')? 'active bg-dark' : '' }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Cancel Order</a>
    </li>
    <li class="nav-item">
        <a href="{{--{{ route('customer.refund') }}--}}" class="nav-link {{ (Route::currentRouteName() == 'customer.refund')? 'active bg-dark' : '' }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Refund</a>
    </li>
    <li class="nav-item">
        <a href="{{--{{ route('customer.refund.requests') }}--}}" class="nav-link {{ (Route::currentRouteName() == 'customer.refund.requests')? 'active bg-dark' : '' }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Refund Requests</a>
    </li>
    <li class="nav-item">
        <a href="{{--{{ route('customer.conversations')}}--}}" class="nav-link {{ (Route::currentRouteName() == 'customer.conversations') ? 'active bg-dark' : '' }}{{ (Route::currentRouteName() == 'converstation.details') ? 'active bg-dark' : '' }}"><i class="fi-rs-user mr-10"></i>Conversations</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.ticket')}}" class="nav-link {{ (Route::currentRouteName() == 'customer.support.ticket')? 'active bg-dark' : '' }}"><i class="fi-rs-user mr-10"></i>Support Ticket</a>
    </li>
    <li class="nav-item">
        <a href="{{--{{ route('customer.coupons')}}--}}" class="nav-link {{ (Route::currentRouteName() == 'customer.coupons')? 'active bg-dark' : '' }}"><i class="fi-rs-user mr-10"></i>Coupons</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.account.details')}}" class="nav-link {{ (Route::currentRouteName() == 'customer.account.details')? 'active bg-dark' : '' }}"><i class="fi-rs-user mr-10"></i>Account details</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.address') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.address')? 'active bg-dark' : '' }}"><i class="fi-rs-marker mr-10"></i>My Address</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.password')}}" class="nav-link {{ (Route::currentRouteName() == 'customer.password')? 'active bg-dark' : '' }}"><i class="fi-rs-user mr-10"></i>Change Password</a>
    </li>
    <li class="nav-item">
        <form class="nav-link text-light" action="{{route('customer-logout')}}" method="post">
            @csrf
            <a type="submit" style="" class="logioutBtn border-0" onclick="return confirm('are you sure to logout ? ')"><i class="fi-rs-user mr-10"></i> Logout</a>
        </form>
    </li>
</ul>



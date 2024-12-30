<style>
    /* Menu container setup */
    .menu-container {
        width: 100%;
        overflow-x: auto; /* Enables horizontal scrolling */
        white-space: nowrap; /* Prevents wrapping */
        margin: 20px 0;
    }

    /* Menu list style */
    .menu {
        list-style-type: none;
        display: flex;
    }

    /* Menu item style */
    .menu li {
        margin-right: 20px;
    }

    .menu a {
        text-decoration: none;
        color: #333;
        font-size: 15px;
        padding: 5px 4px;
        display: block;
        border-radius: 1px;
        transition: background-color 0.3s ease;
    }

    /*.menu a:hover {
        background-color: #ddd;
    }*/

    /* Ensure scrolling when items exceed the width */
    .menu-container::-webkit-scrollbar {
        height: 8px;
    }

    .menu-container::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 4px;
    }

    .menu-container::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }
</style>
<div class="menu-container text-white bg-secondary">
    <ul class="menu">
        <li><a href="{{ route('customer.dashboard') }}" class=" text-white {{ (Route::currentRouteName() == 'customer.dashboard')? 'active bg-dark' : '' }}">Dashboard</a></li>
        <li><a href="#" class="text-white">My Wallet</a></li>
        <li><a href="{{ route('customer.orders') }}"  class="text-white {{ (Route::currentRouteName() == 'customer.orders')? 'active bg-dark' : '' }}">Orders</a></li>
        <li><a href="#" class="text-white">Refund</a></li>
        <li><a href="#" class="text-white">Conversations</a></li>
        <li><a href="{{ route('customer.ticket')}}" class="text-white {{ (Route::currentRouteName() == 'customer.ticket')? 'active bg-dark' : '' }} {{ (Route::currentRouteName() == 'support.ticket.view')? 'active bg-dark' : '' }}">Support Ticket</a></li>
        <li><a href="{{ route('customer.account.details')}}" class="text-white {{ (Route::currentRouteName() == 'customer.account.details')? 'active bg-dark' : '' }}">Account details</a></li>
        <li><a href="{{ route('customer.address') }}" class="text-white {{ (Route::currentRouteName() == 'customer.address')? 'active bg-dark' : '' }}">My Address</a></li>
        <li><a href="{{ route('customer.password')}}" class="text-white {{ (Route::currentRouteName() == 'customer.password')? 'active bg-dark' : '' }}">Change Password</a></li>
        <li>
            <a href="{{route('customer-logout')}}" class="text-white" onclick="return confirm('are you sure to logout ?')">Logout</a>
        </li>
    </ul>
</div>



{{--
<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a href="{{ route('customer.dashboard') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.dashboard')? 'active bg-dark bg-dark' : '' }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="--}}
{{--{{ route('customer.wallet') }}--}}{{--
" class="nav-link {{ (Route::currentRouteName() == 'customer.wallet')? 'active bg-dark bg-dark' : '' }}"><i class="fi-rs-settings-sliders mr-10"></i>My Wallet</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.orders') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.orders')? 'active bg-dark bg-dark' : '' }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.cancel.orders') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.cancel.orders')? 'active bg-dark' : '' }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Cancel Order</a>
    </li>
    <li class="nav-item">
        <a href="--}}
{{--{{ route('customer.refund') }}--}}{{--
" class="nav-link {{ (Route::currentRouteName() == 'customer.refund')? 'active bg-dark' : '' }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Refund</a>
    </li>
    <li class="nav-item">
        <a href="--}}
{{--{{ route('customer.refund.requests') }}--}}{{--
" class="nav-link {{ (Route::currentRouteName() == 'customer.refund.requests')? 'active bg-dark' : '' }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Refund Requests</a>
    </li>
    <li class="nav-item">
        <a href="--}}
{{--{{ route('customer.conversations')}}--}}{{--
" class="nav-link {{ (Route::currentRouteName() == 'customer.conversations') ? 'active bg-dark' : '' }}{{ (Route::currentRouteName() == 'converstation.details') ? 'active bg-dark' : '' }}"><i class="fi-rs-user mr-10"></i>Conversations</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.ticket')}}" class="nav-link {{ (Route::currentRouteName() == 'customer.support.ticket')? 'active bg-dark' : '' }}"><i class="fi-rs-user mr-10"></i>Support Ticket</a>
    </li>
    <li class="nav-item">
        <a href="--}}
{{--{{ route('customer.coupons')}}--}}{{--
" class="nav-link {{ (Route::currentRouteName() == 'customer.coupons')? 'active bg-dark' : '' }}"><i class="fi-rs-user mr-10"></i>Coupons</a>
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
--}}



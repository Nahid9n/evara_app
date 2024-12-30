@extends('website.master')
@section('title','Customer Dashboard')
@section('body')

    <section class="mt-2 mb-50">
        <div class="container">
            @include('website.customer.layout.sidebar')
           {{-- <nav class="navbar">

                <div class="container-fluid d-grid justify-content-end">
                    <button class="navbar-toggler bg-success text-white text-end float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="text-black" style="color: black">Menu</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">

                    </div>
                </div>
            </nav>--}}
            <div class="row">
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Total Order</h5>
                            <h5 class="card-title">{{count($totalOrder)}}</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Pending Order</h5>
                            <h5 class="card-title">{{$pendingOrder}}</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">On Shipment</h5>
                            <h5 class="card-title">{{$onShipmentOrder}}</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Delivered</h5>
                            <h5 class="card-title">{{$completeOrder}}</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Canceled</h5>
                            <h5 class="card-title">{{$cancelOrder}}</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Order Amount</h5>
                            <h5 class="card-title">{{$orderAmount}}</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Refund Amount</h5>
                            <h5 class="card-title">৳ 0 Static</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Wishlist</h5>
                            <h5 class="card-title">{{$wishlist}}</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Review</h5>
                            <h5 class="card-title">0 Static</h5>
                        </a>
                    </div>
                </div>
                <div class="text-center col-6 col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('customer.orders') }}">
                            <h5 class="my-2">Product Request</h5>
                            <h5 class="card-title">0 Static</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row my-5">
                                    <div class="col-lg-6 border-5 my-2">
                                        <h4>Billing Address: </h4>
                                        <hr class="text-dark">
                                        <p><b class="fw-bold">Address 1 : </b>{{$billings->address_one}}</p>
                                        <p><b class="fw-bold">Address 2 : </b>{{$billings->address_two}}</p>
                                        <p><b class="fw-bold">city : </b>{{$billings->city}}</p>
                                        <p><b class="fw-bold">state : </b>{{$billings->state}}</p>
                                        <p><b class="fw-bold">zip : </b>{{$billings->zip}}</p>
                                        <p><b class="fw-bold">country : </b>{{$billings->country}}</p>
                                    </div>
                                    <div class="col-lg-6 border-5 my-2 ">
                                        <h4>Shipping Address: </h4>
                                        <hr class="text-dark">
                                        <p><b class="fw-bold">Address 1 : </b>{{$shippings->address_one}}</p>
                                        <p><b class="fw-bold">Address 2 : </b>{{$shippings->address_two}}</p>
                                        <p><b class="fw-bold">city : </b>{{$shippings->city}}</p>
                                        <p><b class="fw-bold">state : </b>{{$shippings->state}}</p>
                                        <p><b class="fw-bold">zip : </b>{{$shippings->zip}}</p>
                                        <p><b class="fw-bold">country : </b>{{$shippings->country}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </section>
@endsection

@extends('website.customer.layout.app')
@section('title','Customer Dashboard')
@section('body')
    <div class="row">
        <div class="col-3">
            <a href="{{ route('customer.orders') }}">
                <div class="card border-primary mb-3" style="max-width: 18rem; height: 130px">
                    <div class="card-header">Total Order</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">{{count($totalOrder)}}</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('customer.orders') }}">
                <div class="card border-secondary mb-3" style="max-width: 18rem; height: 130px">
                    <div class="card-header">Pending Order</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">{{$pendingOrder}}</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="{{ route('customer.orders') }}">
                <div class="card border-success mb-3" style="max-width: 18rem; height: 130px">
                    <div class="card-header">On Shipment</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">{{$onShipmentOrder}}</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('customer.orders') }}">
                <div class="card border-dark mb-3" style="max-width: 18rem;height: 130px">
                    <div class="card-header">Delivered</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">{{$completeOrder}}</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('customer.orders') }}">
                <div class="card border-danger mb-3" style="max-width: 18rem;height: 130px">
                    <div class="card-header">Canceled</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">{{$cancelOrder}}</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('customer.orders') }}">
                <div class="card border-primary mb-3" style="max-width: 18rem;height: 130px">
                    <div class="card-header">Order Amount</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">৳ {{$orderAmount}}</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="">
                <div class="card border-success mb-3" style="max-width: 18rem;height: 130px">
                    <div class="card-header">Refund Amount</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">৳ 0 Static</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="">
                <div class="card border-dark mb-3" style="max-width: 18rem;height: 130px">
                    <div class="card-header">Wishlist</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">{{$wishlist}}</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="">
                <div class="card border-warning mb-3" style="max-width: 18rem;height: 130px">
                    <div class="card-header">Review</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">0 Static</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="">
                <div class="card border-primary mb-3" style="max-width: 18rem;height: 130px">
                    <div class="card-header">Product Request</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">0 Static</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <div class="">
                <div class="card">
                    <div class="card-body">
                        <div class="row my-5">
                            <div class="col-lg-6 border-5 ">
                                <h4>Billing Address: </h4>
                                <hr class="border-5 text-dark">
                                <p><b class="fw-bold">Address 1 : </b>{{$billings->address_one}}</p>
                                <p><b class="fw-bold">Address 2 : </b>{{$billings->address_two}}</p>
                                <p><b class="fw-bold">city : </b>{{$billings->city}}</p>
                                <p><b class="fw-bold">state : </b>{{$billings->state}}</p>
                                <p><b class="fw-bold">zip : </b>{{$billings->zip}}</p>
                                <p><b class="fw-bold">country : </b>{{$billings->country}}</p>
                            </div>
                            <div class="col-lg-6 border-5 ">
                                <h4>Shipping Address: </h4>
                                <hr class="border-5 text-dark">
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
@endsection

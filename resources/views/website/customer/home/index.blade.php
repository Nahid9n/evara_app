@extends('website.customer.layout.app')
@section('title','Customer Dashboard')
@section('body')
    <div class="">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Hello {{ auth()->user()->name}}! </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 pb-5">
                                <p>Wallet Money : {{ (isset($wallet->balance))? $wallet->balance : 0 }}</p>
                            </div>
                        </div>
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

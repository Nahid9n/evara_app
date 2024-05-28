@extends('website.master')

@section('title','Customer Dashboard')

@section('body')


    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span></span> Customer
                <span></span> Dashboard
            </div>
        </div>
    </div>



    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link active" id="order-tab" data-bs-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Order</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('customer-logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello {{ Session::get('customer_name') }} ! </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="order" role="tabpanel" aria-labelledby="order-tab">
                                    <div class="card">
                                        <div class="card-header ">
                                            <h4 class="text-right d-inline">Hello {{ Session::get('customer_name') }} !  </h4>
                                            <span> <a href="{{route('customer.dashboard')}}" class="btn btn-sm float-end">Dashboard</a></span>

                                        </div>
                                        <div class="card">
                                            <div class="card-header border-bottom">
                                                <h3 class="card-title text-center">Order Detail Information</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <td>{{$order->id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Order Date</th>
                                                        <td>{{$order->order_date}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Order Total</th>
                                                        <td>{{$order->order_total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax Total</th>
                                                        <td>{{$order->tax_total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Shipping Total</th>
                                                        <td>{{$order->shipping_total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Customer Info</th>
                                                        <td>{{isset($order->customer->name) ? $order->customer->name.'('.$order->customer->mobile.')' : ''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Order Status</th>
                                                        <td>{{$order->order_status}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Delivery Address</th>
                                                        <td>{{$order->delivery_address}}</td>
                                                    </tr>


                                                    <tr>
                                                        <th>Delivery Status</th>
                                                        <td>{{$order->delivery_status}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Payment Method</th>
                                                        <td>{{$order->payment_method}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Payment Status</th>
                                                        <td>{{$order->payment_status}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Payment Amount</th>
                                                        <td>{{$order->payment_amount}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Payment Date</th>
                                                        <td>{{$order->payment_date}}</td>
                                                        {{--                            <td>{!! $order->payment_date !!}</td>--}}
                                                    </tr>

                                                    <tr>
                                                        <th>Currency</th>
                                                        <td>{{$order->currency}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Transection Id</th>
                                                        <td>{{$order->transaction_id}}</td>
                                                    </tr>




                                                </table>

                                                <div class="border-top m-3">

                                                </div>
                                                </hr class="" >

                                                <h4>Order Product Information</h4>
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Sl NO</th>
                                                        <th>Product Name</th>
                                                        <th>Product Price</th>
                                                        <th>Product Quantity</th>
                                                        <th>Product Total</th>


                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($order->orderDetails as $orderDetail)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$orderDetail->product_name}}</td>
                                                            <td>{{$orderDetail->product_price}}</td>
                                                            <td>{{$orderDetail->product_qty}}</td>
                                                            <td>{{$orderDetail->product_price * $orderDetail->product_qty }}</td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>#{{ $order->id }}</td>
                                                            <td>{{ $order->order_date }}</td>
                                                            <td>{{ $order->order_status }}</td>
                                                            <td>Tk. {{ $order->order_total }}</td>


                                                            <td>
                                                                <a href="{{route('show-customer-order', $order->id)}}" class="btn btn-info btn-sm float-start m-1" title="View Order Detail">
                                                                    <i class="fi-rs-eye"></i>
                                                                </a>

                                                                <a href="{{route('customer-invoice-show', [ 'id' => $order->id ] )}}" class="btn btn-primary btn-sm float-start m-1" title="View Order Invoice">
                                                                    <i class="fi-rs-info"></i>
                                                                </a>
                                                                {{--                                                        <a href="{{route('customer-invoice-show',$order->id )}}" class="btn btn-primary btn-sm float-start m-1" title="View Order Invoice">--}}
                                                                {{--                                                            <i class="fa fa-info"></i>--}}
                                                                {{--                                                        </a>--}}
                                                                <a href="{{route('customer-invoice-download', $order->id)}}" target="_blank" class="btn btn-warning btn-sm float-start m-1" title="Download Order Invoice">
                                                                    <i class="fi-rs-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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

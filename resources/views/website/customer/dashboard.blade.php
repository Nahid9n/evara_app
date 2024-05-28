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
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="wishlists-tab" data-bs-toggle="tab" href="#wishlists" role="tab" aria-controls="wishlists" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Wishlists</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('customer-logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello {{ Session::get('customer_name') }} ! </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
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
                                <div class="tab-pane fade" id="wishlists" role="tabpanel" aria-labelledby="wishlists-tab">
                                    <div class="card">
                                        <div class=" ">
                                            <h5 class="mb-0 btn btn-lg btn-primary text-center text-pinterset-gradient d-block">Your Wishlists</h5>

                                        </div>

                                        <div class="card-header justify-content-center text-center">
                                            <a href="{{ route('wishlist.index') }}" class="mb-0 btn btn-lg btn-danger text-block align-content-center">View Full WishList</a>
                                        </div>



                                    </div>
                                </div>




                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Orders tracking</h5>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id" placeholder="Found in your order confirmation email" type="text" class="square">
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email" placeholder="Email you used during checkout" type="email" class="square">
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Billing Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>3522 Interstate<br> 75 Business Spur,<br> Sault Ste. <br>Marie, MI 49783</address>
                                                    <p>New York</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>4299 Express Lane<br>
                                                        Sarasota, <br>FL 34249 USA <br>Phone: 1.941.227.4444</address>
                                                    <p>Sarasota</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-success text-center">{{session('message')}}</p>

                                            <form action="{{ route('editCustomer')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{  $customer->id  }}" name="id">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Full Name <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="name" value="{{$customer->name}}" placeholder="Full Name" type="text">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="email" type="email" placeholder="email" value="{{$customer->email}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label> Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="password" type="password" placeholder="password" value="{{$customer->password}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Mobile <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="mobile" placeholder="mobile" type="text" value="{{$customer->mobile}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Address<span class="required">*</span></label>
                                                        <textarea required="" name="address"  >{{$customer->address}}</textarea>
                                                        {{--
                                                        <input required="" class="form-control square" name="address" type="password">
                                                    --}}
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Date_of_birth <span class="required">*</span></label>
                                                        <input required="" class="form-control square" placeholder="m/d/Y" name="date_of_birth" value="{{$customer->date_of_birth}}" type="text">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Blood group <span class="required">*</span></label>
                                                        <input required="" class="form-control square" placeholder="Enter Blood Group" name="blood_group" value="{{$customer->blood_group}}" type="text">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>District <span class="required">*</span></label>
                                                        <input  class="form-control square" placeholder="Enter district" name="district" value="{{$customer->district}}" type="text">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Image <span class="required">*</span></label>
                                                        <input  class="form-control square" type="file" name="image" height="200px" width="200px">
                                                        <img src="{{asset($customer->image)}}" alt="" height="100" width="100" />

                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit"  value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
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

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
                                        <a class="nav-link {{ ($id == '')? 'active' : '' }}" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="{{ ($id == '')? 'false' : 'true' }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ ($id != '')? 'active' : '' }}" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="{{ ($id == '')? 'true' : 'false' }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cancel-orders-tab" data-bs-toggle="tab" href="#cancel-orders" role="tab" aria-controls="cancel-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Cancel Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="fi-rs-user mr-10"></i>Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="support-ticket-tab" data-bs-toggle="tab" href="#support-ticket" role="tab" aria-controls="support-ticket" aria-selected="true"><i class="fi-rs-user mr-10"></i>Support Ticket</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="conversation-tab" data-bs-toggle="tab" href="#conversation" role="tab" aria-controls="conversation" aria-selected="true"><i class="fi-rs-user mr-10"></i>Conversations</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade {{ ($id == '')? 'active show' : '' }}" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello {{ auth()->user()->name}}! </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12 pb-5">
                                                    <p>Wallet Money : {{ (isset($wallet->amount))? $wallet->amount : 0 }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p>Billing Addree: </p> {{ $billings->address_one.", ".$billings->address_two." ".$billings->city." ".$billings->state." ".$billings->zip." ".$billings->country}}
                                                </div>
                                                <div class="col-lg-6">
                                                    <p>Shipping Addree: </p> {{ $shippings->address_one." ".$shippings->address_two." ".$shippings->city." ".$shippings->state." ".$shippings->zip." ".$shippings->country}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ ($id != '')? 'active show' : '' }}" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        <div class="card-body">

                                            <select class="form-select status_change">
                                                <option value="">Select</option>
                                                <option value="1" <?= ($id == 1) ? 'selected' : '' ?>>Pending</option>
                                                <option value="2" <?= ($id == 2) ? 'selected' : '' ?>>Accepted</option>
                                                <option value="3" <?= ($id == 3) ? 'selected' : '' ?>>Delivered</option>
                                                <option value="4" <?= ($id == 4) ? 'selected' : '' ?>>Canceled</option>
                                            </select>

                                            <div class="table-responsive">
                                                @if(count($orders) > 0)
                                                    <table class="table table-striped table-bordered">
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
                                                            <tr class="{{$order->delivery_status == 0 ? 'bg-warning text-dark':''}}{{$order->delivery_status == 1 ? 'bg-info text-white':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}}">
                                                                <td>#{{$order->order_code}}</td>
                                                                <td>{{$order->order_date}}</td>
                                                                <td>
                                                                    {{$order->order_status == 0 ? 'Pending':''}}
                                                                    {{$order->order_status == 1 ? 'Completed':''}}
                                                                    {{$order->order_status == 2 ? 'Canceled':''}}
                                                                </td>
                                                                <td>{{$order->total_price}} {{$currency->symbol ?? ''}}</td>
                                                                <td>
                                                                    <a class="btn-small  d-block" href="{{ route('customer-order-details', $order->id) }}">View</a>

                                                                    @if($order->order_status == 'Pending')
                                                                        <form method="post" action="{{ route('customer-order-cancel', $order->id) }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button class="btn-sm" type="submit">Cancel</button>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <div class="text-center">Empty</div>
                                                @endif
                                            </div>
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
                                <div class="tab-pane fade" id="cancel-orders" role="tabpanel" aria-labelledby="cancel-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Cancel Order</h5>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <div class="row">
                                                <div class="col-lg-12">
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
                                                                @if($order->order_status == 2)
                                                                    <tr>
                                                                        <td>#{{$order->order_code}}</td>
                                                                        <td>{{$order->order_date}}</td>
                                                                        <td>{{$order->order_status}}</td>
                                                                        <td>{{$order->order_total}}</td>
                                                                        <td>
                                                                            <a class="btn-small d-block" href="{{ route('customer-order', $order->id) }}">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
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
                                                    <div class="example">
                                                        <form class="form-horizontal" method="post" action="{{ route('billings-store', auth()->user()->id) }}">
                                                            <div class="form-group">
                                                                @csrf
                                                                @method('PUT')
                                                                <label for="" class="form-label">Address One</label>
                                                                <input type="text" class="form-control" name="address_one" value="{{ $billings->address_one }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Address Two</label>
                                                                <input type="text" class="form-control" name="address_two" value="{{ $billings->address_two }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">City</label>
                                                                <input type="text" class="form-control" name="city" value="{{ $billings->city }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">State</label>
                                                                <input type="text" class="form-control" name="state" value="{{ $billings->state }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">ZIP</label>
                                                                <input type="text" class="form-control" name="zip" value="{{ $billings->zip }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Country</label>
                                                                <input type="text" class="form-control" name="country" value="{{ $billings->country }}">
                                                            </div>

                                                            <button type="submit" class="btn btn-sm btn-primary">save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="example">
                                                        <form class="form-horizontal" method="post" action="{{ route('shipping-store', auth()->user()->id) }}">
                                                            <div class="form-group">
                                                                @csrf
                                                                @method('PUT')
                                                                <label for="" class="form-label">Address One</label>
                                                                <input type="text" class="form-control" name="address_one" value="{{ $shippings->address_one }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Address Two</label>
                                                                <input type="text" class="form-control" name="address_two" value="{{ $shippings->address_two }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">City</label>
                                                                <input type="text" class="form-control" name="city" value="{{ $shippings->city }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">State</label>
                                                                <input type="text" class="form-control" name="state" value="{{ $shippings->state }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">ZIP</label>
                                                                <input type="text" class="form-control" name="zip" value="{{ $shippings->zip }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Country</label>
                                                                <input type="text" class="form-control" name="country" value="{{ $shippings->country }}">
                                                            </div>

                                                            <button type="submit" class="btn btn-sm btn-primary">save</button>
                                                        </form>
                                                    </div>
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
                                            <form method="post" action="{{ route('update-customer-info' , auth()->user()->id) }}" name="enq">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name</label>
                                                        <input class="form-control square" name="first_name" type="text" value="{{ $customer->firstName }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name</label>
                                                        <input class="form-control square" name="last_name" value="{{ $customer->lastName }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Display Name</label>
                                                        <input class="form-control square" name="dname" type="text" value="{{ auth()->user()->name }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Image</label>
                                                        <input class="form-control square" name="image" type="file">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Phone</label>
                                                        <input class="form-control square" name="phone" type="number" value="{{ $customer->phone }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Company</label>
                                                        <input class="form-control square" name="company" type="text" value="{{ $customer->company }}">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Address</label>
                                                        <input class="form-control square" name="street_address" type="text" value="{{ $customer->street_address }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Gender</label>
                                                        <select class="form-select square" name="gender">
                                                            <option value="">Select</option>
                                                            <option value="Male" {{$customer->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                            <option value="Female" {{$customer->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>State</label>
                                                        <input class="form-control square" name="state" type="text" value="{{ $customer->state }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Post</label>
                                                        <input class="form-control square" name="post" type="text" value="{{ $customer->post }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Country</label>
                                                        <input class="form-control square" name="country" type="text" value="{{ $customer->country }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>SSN</label>
                                                        <input class="form-control square" name="ssn" type="text" value="{{ $customer->ssn }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>City</label>
                                                        <input class="form-control square" name="city" type="text" value="{{ $customer->city }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email Address</label>
                                                        <input class="form-control square" name="email" type="email" value="{{ auth()->user()->email }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Date of Birth</label>
                                                        <input class="form-control square" name="dob" type="date" value="{{ $customer->date_of_birth }}">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Change Password</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{ route('update-customer-info' , auth()->user()->id) }}" name="enq">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">

                                                    <div class="form-group col-md-12">
                                                        <label>Current Password</label>
                                                        <input class="form-control square" name="password" type="password" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password</label>
                                                        <input class="form-control square" name="npassword" type="password">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="support-ticket" role="tabpanel" aria-labelledby="support-ticket-tab">
                                    @if(Request::route()->getName() == 'customer.view.ticket')
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="my-2"> <span class="fw-bold">{{ $ticket->subject }}</span> # {{ $ticket->ticket_id }}</h4>
                                                <p><span>{{auth()->user()->name}}</span> {{ $ticket->created_at }} <span class="p-2 rounded-3 text-white {{$ticket->status == 1 ? 'bg-success':''}}{{$ticket->status == 2 ? 'bg-danger':''}}">{{$ticket->status == 1 ? 'Open':''}}{{$ticket->status == 2 ? 'Closed':''}}</span></p>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="{{route('customer.ticket.reply')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}" readonly>
                                                        <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}" readonly>
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control" name="reply" id="" cols="30" rows="5" {{$ticket->status == 0 ? 'readonly':''}}{{$ticket->status == 2 ? 'readonly':''}}></textarea>
                                                        </div>
                                                        <div class="col-md-12 d-grid justify-content-end">
                                                            <button type="submit" class="btn btn-sm btn-success " {{$ticket->status == 0 ? 'disabled':''}}{{$ticket->status == 2 ? 'disabled':''}}>send reply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="row my-2">
                                                    <div class="col-lg-12">

                                                        <ul class="list-group list-group-flush mt-3">
                                                            <!-- Replies -->

                                                            <!-- Ticket Details -->
                                                            @foreach($ticketReplys as $reply)
                                                                <li class="list-group-item px-0">
                                                                    <div class="media">
                                                                        <a class="media-left" href="#">
                                                                <span class="avatar avatar-sm mr-3">
                                                                    <img width="50" height="50" class="rounded-circle" src="https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png">
                                                                </span>
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <div class="comment-header">
                                                                                <span class="fs-14 fw-700 text-dark">{{ $reply->user->name }}</span>
                                                                                <p class="text-muted text-sm fs-12 mt-2">{{$reply->created_at}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        {{$reply->reply}}
                                                                        <br>
                                                                        <br>
                                                                    </div>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Support Ticket</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="{{route('customer.store.ticket')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" name="sender_id" value="{{auth()->user()->id}}">
                                                        <div class="form-group col-md-12">
                                                            <label>Subject <span class="text-danger">*</span></label>
                                                            <input class="form-control" name="subject" type="text" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Provide a detailed description</label>
                                                            <textarea class="form-control" name="description" id="" cols="30" rows="2"></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-sm btn-success">create ticket</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="row my-2">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Ticket Id</th>
                                                                    <th>Subject</th>
                                                                    <th>Sending Date</th>
                                                                    <th>Status</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($tickets as $ticket)
                                                                    <tr>
                                                                        <td>#{{$ticket->ticket_id}}</td>
                                                                        <td>{{$ticket->subject}}</td>
                                                                        <td>{{$ticket->created_at}}</td>
                                                                        <td class="text-white {{$ticket->status == 0 ? 'bg-warning':''}}{{$ticket->status == 1 ? 'bg-success':''}}{{$ticket->status == 2 ? 'bg-danger':''}}">
                                                                            {{$ticket->status == 0 ? 'pending':''}}
                                                                            {{$ticket->status == 1 ? 'open':''}}
                                                                            {{$ticket->status == 2 ? 'closed':''}}
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn-small d-block" href="{{ route('customer.view.ticket', $ticket->ticket_id) }}" style="{{$ticket->status == 0 ? 'pointer-events: none':''}}">View</a>
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
                                    @endif
                                </div>

                                <div class="tab-pane fade" id="conversation" role="tabpanel" aria-labelledby="conversation-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Conversations</h5>
                                            <small>Select a conversation to view all messages</small>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                @foreach($conversation as $con)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('converstation.details', $con->id) }}">{{ $con->user->name }}</a>
                                                            <br>
                                                            <small class="text-sm">{{ $con->created_at }}</small>
                                                        </td>
                                                        <td><a href="{{ route('converstation.details', $con->id) }}">{{ $con->header }}</a></td>
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
    </section>
@endsection
{{--
@extends('website.layout.app')
@section('title','Dashboard')
@section('body')

    <style>
        .status_change {
            border: 1px solid #dee2e6;
            padding: 10px 6px;
            margin-bottom: 13px;
        }

        .form-group select {
            background: #fff;
            border: 1px solid #e2e9e1;
            height: 45px;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding-left: 20px;
            font-size: 13px;
            color: #1a1a1a;
            width: 100%;
        }

        .btn-sm {
            padding: 2px 6px !important;
        }

        .table tr td a {
            color: #1a1a1a;
            font-weight: bold;
        }

        .table tr:hover {
            background: #0000000d;
            transition: 0.2s;
            /*color: ;*/
        }

        .table tr td a:hover {
            background: #0000000d;
            transition: 0.2s;
            color: red;
            text-decoration: none;
            /*background: transparent;*/
        }

        .table td,
        .table th {
            border-color: transparent;
            border-bottom: 1px solid #00000024;
        }
    </style>

    <div class="page-header breadcrumb-wrap mt-5">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span class="mx-2"> Customer</span>
                <span> Dashboard</span>
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
                                        <a class="nav-link {{ ($id == '')? 'active' : '' }}" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="{{ ($id == '')? 'false' : 'true' }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ ($id != '')? 'active' : '' }}" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="{{ ($id == '')? 'true' : 'false' }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cancel-orders-tab" data-bs-toggle="tab" href="#cancel-orders" role="tab" aria-controls="cancel-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Cancel Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="fi-rs-user mr-10"></i>Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="support-ticket-tab" data-bs-toggle="tab" href="#support-ticket" role="tab" aria-controls="support-ticket" aria-selected="true"><i class="fi-rs-user mr-10"></i>Support Ticket</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="conversation-tab" data-bs-toggle="tab" href="#conversation" role="tab" aria-controls="conversation" aria-selected="true"><i class="fi-rs-user mr-10"></i>Conversations</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade {{ ($id == '')? 'active show' : '' }}" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello {{ auth()->user()->name}}! </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12 pb-5">
                                                    <p>Wallet Money : {{ (isset($wallet->amount))? $wallet->amount : 0 }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p>Billing Addree: </p> {{ $billings->address_one.", ".$billings->address_two." ".$billings->city." ".$billings->state." ".$billings->zip." ".$billings->country}}
                                                </div>
                                                <div class="col-lg-6">
                                                    <p>Shipping Addree: </p> {{ $shippings->address_one." ".$shippings->address_two." ".$shippings->city." ".$shippings->state." ".$shippings->zip." ".$shippings->country}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ ($id != '')? 'active show' : '' }}" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        <div class="card-body">

                                            <select class="form-select status_change">
                                                <option value="">Select</option>
                                                <option value="1" <?= ($id == 1) ? 'selected' : '' ?>>Pending</option>
                                                <option value="2" <?= ($id == 2) ? 'selected' : '' ?>>Accepted</option>
                                                <option value="3" <?= ($id == 3) ? 'selected' : '' ?>>Delivered</option>
                                                <option value="4" <?= ($id == 4) ? 'selected' : '' ?>>Canceled</option>
                                            </select>

                                            <div class="table-responsive">
                                                @if(count($orders) > 0)
                                                    <table class="table table-striped table-bordered">
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
                                                            <tr class="{{$order->delivery_status == 0 ? 'bg-warning text-dark':''}}{{$order->delivery_status == 1 ? 'bg-info text-white':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}}">
                                                                <td>#{{$order->order_code}}</td>
                                                                <td>{{$order->order_date}}</td>
                                                                <td>
                                                                    {{$order->order_status == 0 ? 'Pending':''}}
                                                                    {{$order->order_status == 1 ? 'Completed':''}}
                                                                    {{$order->order_status == 2 ? 'Canceled':''}}
                                                                </td>
                                                                <td>{{$order->total_price}} {{$currency->symbol ?? ''}}</td>
                                                                <td>
                                                                    <a class="btn-small  d-block" href="{{ route('customer-order-details', $order->id) }}">View</a>

                                                                    @if($order->order_status == 'Pending')
                                                                        <form method="post" action="{{ route('customer-order-cancel', $order->id) }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button class="btn-sm" type="submit">Cancel</button>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <div class="text-center">Empty</div>
                                                @endif
                                            </div>
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
                                <div class="tab-pane fade" id="cancel-orders" role="tabpanel" aria-labelledby="cancel-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Cancel Order</h5>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <div class="row">
                                                <div class="col-lg-12">
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
                                                                @if($order->order_status == 2)
                                                                    <tr>
                                                                        <td>#{{$order->order_code}}</td>
                                                                        <td>{{$order->order_date}}</td>
                                                                        <td>{{$order->order_status}}</td>
                                                                        <td>{{$order->order_total}}</td>
                                                                        <td>
                                                                            <a class="btn-small d-block" href="{{ route('customer-order', $order->id) }}">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
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
                                                    <div class="example">
                                                        <form class="form-horizontal" method="post" action="{{ route('billings-store', auth()->user()->id) }}">
                                                            <div class="form-group">
                                                                @csrf
                                                                @method('PUT')
                                                                <label for="" class="form-label">Address One</label>
                                                                <input type="text" class="form-control" name="address_one" value="{{ $billings->address_one }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Address Two</label>
                                                                <input type="text" class="form-control" name="address_two" value="{{ $billings->address_two }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">City</label>
                                                                <input type="text" class="form-control" name="city" value="{{ $billings->city }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">State</label>
                                                                <input type="text" class="form-control" name="state" value="{{ $billings->state }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">ZIP</label>
                                                                <input type="text" class="form-control" name="zip" value="{{ $billings->zip }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Country</label>
                                                                <input type="text" class="form-control" name="country" value="{{ $billings->country }}">
                                                            </div>

                                                            <button type="submit" class="btn btn-sm btn-primary">save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="example">
                                                        <form class="form-horizontal" method="post" action="{{ route('shipping-store', auth()->user()->id) }}">
                                                            <div class="form-group">
                                                                @csrf
                                                                @method('PUT')
                                                                <label for="" class="form-label">Address One</label>
                                                                <input type="text" class="form-control" name="address_one" value="{{ $shippings->address_one }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Address Two</label>
                                                                <input type="text" class="form-control" name="address_two" value="{{ $shippings->address_two }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">City</label>
                                                                <input type="text" class="form-control" name="city" value="{{ $shippings->city }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">State</label>
                                                                <input type="text" class="form-control" name="state" value="{{ $shippings->state }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">ZIP</label>
                                                                <input type="text" class="form-control" name="zip" value="{{ $shippings->zip }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Country</label>
                                                                <input type="text" class="form-control" name="country" value="{{ $shippings->country }}">
                                                            </div>

                                                            <button type="submit" class="btn btn-sm btn-primary">save</button>
                                                        </form>
                                                    </div>
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
                                            <form method="post" action="{{ route('update-customer-info' , auth()->user()->id) }}" name="enq">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name</label>
                                                        <input class="form-control square" name="first_name" type="text" value="{{ $customer->firstName }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name</label>
                                                        <input class="form-control square" name="last_name" value="{{ $customer->lastName }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Display Name</label>
                                                        <input class="form-control square" name="dname" type="text" value="{{ auth()->user()->name }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Image</label>
                                                        <input class="form-control square" name="image" type="file">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Phone</label>
                                                        <input class="form-control square" name="phone" type="number" value="{{ $customer->phone }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Company</label>
                                                        <input class="form-control square" name="company" type="text" value="{{ $customer->company }}">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Address</label>
                                                        <input class="form-control square" name="street_address" type="text" value="{{ $customer->street_address }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Gender</label>
                                                        <select class="form-select square" name="gender">
                                                            <option value="">Select</option>
                                                            <option value="Male" {{$customer->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                            <option value="Female" {{$customer->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>State</label>
                                                        <input class="form-control square" name="state" type="text" value="{{ $customer->state }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Post</label>
                                                        <input class="form-control square" name="post" type="text" value="{{ $customer->post }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Country</label>
                                                        <input class="form-control square" name="country" type="text" value="{{ $customer->country }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>SSN</label>
                                                        <input class="form-control square" name="ssn" type="text" value="{{ $customer->ssn }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>City</label>
                                                        <input class="form-control square" name="city" type="text" value="{{ $customer->city }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email Address</label>
                                                        <input class="form-control square" name="email" type="email" value="{{ auth()->user()->email }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Date of Birth</label>
                                                        <input class="form-control square" name="dob" type="date" value="{{ $customer->date_of_birth }}">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Change Password</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{ route('update-customer-info' , auth()->user()->id) }}" name="enq">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">

                                                    <div class="form-group col-md-12">
                                                        <label>Current Password</label>
                                                        <input class="form-control square" name="password" type="password" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password</label>
                                                        <input class="form-control square" name="npassword" type="password">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="support-ticket" role="tabpanel" aria-labelledby="support-ticket-tab">
                                    @if(Request::route()->getName() == 'customer.view.ticket')
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="my-2"> <span class="fw-bold">{{ $ticket->subject }}</span> # {{ $ticket->ticket_id }}</h4>
                                                <p><span>{{auth()->user()->name}}</span> {{ $ticket->created_at }} <span class="p-2 rounded-3 text-white {{$ticket->status == 1 ? 'bg-success':''}}{{$ticket->status == 2 ? 'bg-danger':''}}">{{$ticket->status == 1 ? 'Open':''}}{{$ticket->status == 2 ? 'Closed':''}}</span></p>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="{{route('customer.ticket.reply')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}" readonly>
                                                        <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}" readonly>
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control" name="reply" id="" cols="30" rows="5" {{$ticket->status == 0 ? 'readonly':''}}{{$ticket->status == 2 ? 'readonly':''}}></textarea>
                                                        </div>
                                                        <div class="col-md-12 d-grid justify-content-end">
                                                            <button type="submit" class="btn btn-sm btn-success " {{$ticket->status == 0 ? 'disabled':''}}{{$ticket->status == 2 ? 'disabled':''}}>send reply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="row my-2">
                                                    <div class="col-lg-12">

                                                        <ul class="list-group list-group-flush mt-3">
                                                            <!-- Replies -->

                                                            <!-- Ticket Details -->
                                                            @foreach($ticketReplys as $reply)
                                                                <li class="list-group-item px-0">
                                                                    <div class="media">
                                                                        <a class="media-left" href="#">
                                                                <span class="avatar avatar-sm mr-3">
                                                                    <img width="50" height="50" class="rounded-circle" src="https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png">
                                                                </span>
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <div class="comment-header">
                                                                                <span class="fs-14 fw-700 text-dark">{{ $reply->user->name }}</span>
                                                                                <p class="text-muted text-sm fs-12 mt-2">{{$reply->created_at}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        {{$reply->reply}}
                                                                        <br>
                                                                        <br>
                                                                    </div>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Support Ticket</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="{{route('customer.store.ticket')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" name="sender_id" value="{{auth()->user()->id}}">
                                                        <div class="form-group col-md-12">
                                                            <label>Subject <span class="text-danger">*</span></label>
                                                            <input class="form-control" name="subject" type="text" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Provide a detailed description</label>
                                                            <textarea class="form-control" name="description" id="" cols="30" rows="2"></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-sm btn-success">create ticket</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="row my-2">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Ticket Id</th>
                                                                    <th>Subject</th>
                                                                    <th>Sending Date</th>
                                                                    <th>Status</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($tickets as $ticket)
                                                                    <tr>
                                                                        <td>#{{$ticket->ticket_id}}</td>
                                                                        <td>{{$ticket->subject}}</td>
                                                                        <td>{{$ticket->created_at}}</td>
                                                                        <td class="text-white {{$ticket->status == 0 ? 'bg-warning':''}}{{$ticket->status == 1 ? 'bg-success':''}}{{$ticket->status == 2 ? 'bg-danger':''}}">
                                                                            {{$ticket->status == 0 ? 'pending':''}}
                                                                            {{$ticket->status == 1 ? 'open':''}}
                                                                            {{$ticket->status == 2 ? 'closed':''}}
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn-small d-block" href="{{ route('customer.view.ticket', $ticket->ticket_id) }}" style="{{$ticket->status == 0 ? 'pointer-events: none':''}}">View</a>
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
                                    @endif
                                </div>

                                <div class="tab-pane fade" id="conversation" role="tabpanel" aria-labelledby="conversation-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Conversations</h5>
                                            <small>Select a conversation to view all messages</small>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                @foreach($conversation as $con)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('converstation.details', $con->id) }}">{{ $con->user->name }}</a>
                                                            <br>
                                                            <small class="text-sm">{{ $con->created_at }}</small>
                                                        </td>
                                                        <td><a href="{{ route('converstation.details', $con->id) }}">{{ $con->header }}</a></td>
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
    </section>
@endsection--}}

@extends('admin.master')
@section('title','Edit Order Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Order Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive">

                        <form action="{{ route('order.update',$order->id) }}" method="POST">
{{--                        <form action="" method="POST">--}}
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="" class="col-md-3">Customer Info</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ isset($order->customer->name) ? $order->customer->name : ''}}" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-3">Order Total</label>
                                <div class="col-md-9">
                                    <input type="number" value="{{ $order->order_total  }}" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-3">Payment Method</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ $order->payment_method  }}" class="form-control"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Select Courier</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="courier_id">
                                        <option value="1" @selected($order->courier_id == 1)>Pathoa</option>
                                        <option value="2" @selected($order->courier_id == 2)>SA Poribohon</option>
                                        <option value="3" @selected($order->courier_id == 3)>Sundorbon</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Delivery Address</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="delivery_address">{{ $order->delivery_address }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Order Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="order_status">
                                        <option value="Pending" @selected($order->order_status == 'Pending') >Pending</option>
                                        <option value="Processing" @selected($order->order_status == 'Processing')>Processing</option>
                                        <option value="Complete" @selected($order->order_status == 'Complete')>Complete</option>
                                        <option value="Cancel" @selected($order->order_status == 'Cancel')>Cancel</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-success" value="Update Order Info">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


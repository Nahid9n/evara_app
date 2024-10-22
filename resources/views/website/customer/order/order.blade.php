@extends('website.customer.layout.app')

@section('title','Customer Orders')

@section('body')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Your Orders</h5>
        </div>
        <div class="card-body">

            {{--<select class="form-select status_change">
                <option value="">Select</option>
                <option value="1" <?= ($id == 1) ? 'selected' : '' ?>>Pending</option>
                <option value="2" <?= ($id == 2) ? 'selected' : '' ?>>Accepted</option>
                <option value="3" <?= ($id == 3) ? 'selected' : '' ?>>Delivered</option>
                <option value="4" <?= ($id == 4) ? 'selected' : '' ?>>Canceled</option>
            </select>--}}

            <div class="table-responsive">
                @if(count($orders) > 0)
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th class="text-center">Actions</th>
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
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-sm mx-1 d-block" href="{{--{{ route('customer-order-details', $order->id) }}--}}">View</a>

                                    @if($order->order_status == 'Pending')
                                        <form method="post" action="{{--{{ route('customer-order-cancel', $order->id) }}--}}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn-sm" type="submit">cancel</button>
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
            <div class="row justify-content-center">
                {{$orders->links()}}
            </div>
        </div>
    </div>
@endsection

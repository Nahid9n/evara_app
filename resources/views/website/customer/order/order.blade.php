@extends('website.master')
@section('title','Customer Orders')
@section('body')
    <section class="mt-2 mb-50">
        <div class="container">
            @include('website.customer.layout.sidebar')
            <div class="row table-responsive">
                @if(count($orders) > 0)
                    <table id="basic-datatable" class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
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
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->order_code}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>
                                    {{$order->order_status == 0 ? 'Pending':''}}
                                    {{$order->order_status == 1 ? 'Completed':''}}
                                    {{$order->order_status == 2 ? 'Canceled':''}}
                                </td>
                                <td>{{$order->total_price}} {{$currency->symbol ?? ''}}</td>
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-sm mx-1 d-block" href="{{ route('customer-order-details', $order->order_code) }}">View</a>

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
        </div>
    </section>
@endsection

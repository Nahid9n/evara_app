@extends('website.master')
@section('title','Customer Orders')
@section('body')
    <section class="mt-2 mb-50">
        <div class="container">
            @include('website.customer.layout.sidebar')
            <div class="row table-responsive">
                @if(count($orders) > 0)
                    <table id="basic-datatable" class="">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>ID</th>
                                <th>Date & Time</th>
                                <th>Qty</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="{{$order->delivery_status == 0 ? 'bg-warning text-dark':''}}{{$order->delivery_status == 1 ? 'bg-info text-white':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}}">
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{ route('customer-order-details', $order->order_code) }}">{{$order->order_code}}</a></td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->orderDetails->sum('product_qty')}}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>
                                    {{$order->order_status }}
                                </td>
                                <td>৳ {{ $order->order_total }} </td>
                                <td class="d-flex justify-content-center">
                                    <a class="mx-1 d-block" href="{{ route('customer-order-details', $order->order_code) }}"><i class="fi-rs-eye"></i></a>

                                    {{--@if($order->order_status == 'Pending')
                                        <form method="post" action="--}}{{--{{ route('customer-order-cancel', $order->id) }}--}}{{--">
                                            @csrf
                                            @method('PUT')
                                            <button class="" type="submit"><i class="fi-rs-cross"></i></button>
                                        </form>
                                    @endif--}}
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

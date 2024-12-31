@extends('website.master')
@section('title','Order Details')
@section('body')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }
        .invoice-container {
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .invoice-details {
            margin: 20px 0;
        }
        .invoice-details h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }
        .invoice-details p {
            margin: 5px 0;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .invoice-table th {
            background: #f5f5f5;
        }
        .invoice-summary {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .invoice-summary table {
            width: 300px;
            border-collapse: collapse;
        }
        .invoice-summary th, .invoice-summary td {
            border: none;
            padding: 10px;
            text-align: left;
        }
        .invoice-summary th {
            background: #f5f5f5;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
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

        .modal-body{
            margin-top: 0;
        }

        .modal-body button{
            width: initial;
        }

        .modal-body button{
            border-radius: 7px;
        }

        #error_msg{
            display: none;
            font-weight: bold;
        }

        li.breadcrumb-item{
            float: left;
        }

    </style>
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

        .modal-body{
            margin-top: 0;
        }

        .modal-body button{
            width: initial;
        }

        .modal-body button{
            border-radius: 7px;
        }

        #error_msg{
            display: none;
            font-weight: bold;
        }

        li.breadcrumb-item{
            float: left;
        }

    </style>
    <section class="mt-2 mb-50">
        <div class="container">
            @include('website.customer.layout.sidebar')
            <div id="invoicePrint" class="invoice-container">
                <div class="invoice-header">
                    <div>
                        <p>Order Id : {{$order->order_code}}</p>
                        <p>order date: {{date_format($order->created_at,'d M, Y')}}</p>
                    </div>
                    <div>
                        <h2>
                            <img src="{{asset($setting->logo_png)}}" alt="" width="100px">
                        </h2>
                        <p>{{$setting->address}}</p>
                        <p>Email: {{$setting->support_email ?? 'N/A'}}</p>
                    </div>
                </div>
                <div class="invoice-details">
                    <h2>Delivery Details:</h2>
                    <p>{{$order->customer->name}}</p>
                    <p>{{$order->customer->mobile}}</p>
                    <p>{{$order->delivery_address}}</p>
                    <p>Email: {{$order->customer->email}}</p>
                </div>
                <div class="invoice-details text-right">
                    <p>
                        Order Status :
                        <span class="p-1 rounded-2 ">{{$order->order_status}}</span>
                    </p>
                    <p>
                        Payment Status :
                        <span class="p-1">{{$order->payment_status}}</span>
                    </p>
                    <p>
                        Delivery Status :
                        <span class="p-1">{{$order->delivery_status}}</span>
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="">
                        <tbody>
                        <tr class="text-center">
                            <th class="text-center"></th>
                            <th>Item</th>
                            <th class="text-center">Product Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Sub Total</th>
                            <th class="text-center">Refund</th>
                        </tr>
                        @php($sum = 0)
                        @php($tax = 0)
                        @foreach($order->orderDetails as $key => $orderDetail)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-start">
                                    <div class="row">
                                        <div class="col-2">
                                            @if(!empty($orderDetail->product->product_image))
                                                <img class="mx-2" width="50" height="50" src="{{asset($orderDetail->product->product_image)}}" alt="">
                                            @endif
                                        </div>
                                        <div class="text-muted col-10">
                                            <div class="text-muted">
                                                <p class="mb-1">{{$orderDetail->product_name}}</p>
                                            </div>
                                            <div class="text-muted ">
                                                @if(isset($orderDetail->product_color))
                                                    <span class="fw-bold">Color : </span><span>{{$orderDetail->product_color}}</span><br>
                                                @endif
                                                @if(isset($orderDetail->product_size))
                                                    <span class="fw-bold">Size : </span><span>{{$orderDetail->product_size}}</span>
                                                    <br>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{--                                            @dd($order->user)--}}
                                {{--                                            <td class="text-center">{{$order->user->role == '0' ? $orderDetail->customer->name : $orderDetail->customer->seller->shop_name }}</td>--}}
                                <td class="text-center"> ৳ {{$orderDetail->product_price}}</td>
                                <td class="text-center">{{$orderDetail->product_qty}}</td>
                                <td class="text-center"> ৳ {{$orderDetail->product_price * $orderDetail->product_qty }}</td>
                                <td class="text-center">
                                    @php($paymentDate = Carbon\Carbon::parse($order->payment_date))
                                    @php($now = Carbon\Carbon::now()->toDateString())
                                    {{--@if($orderDetail->product->refund != 0)
                                        @php($refund =   App\Models\Refund::where('product_id',$orderDetail->product->id)->where('order_id',$order->id)->first())
                                        @if($refund != null)
                                            <span class="p-2 {{$refund->refund_status == 0 ? "bg-warning" : ""}}
                                            {{$refund->refund_status == 1 ? "bg-success text-dark" : ""}}
                                            {{$refund->refund_status == 2 ? "bg-danger text-white" : ""}}">
                                                    {{$refund->refund_status == 0 ? "Pending" : ""}}
                                                {{$refund->refund_status == 1 ? "Complete" : ""}}
                                                {{$refund->refund_status == 2 ? "Cancel" : ""}}
                                                </span>
                                        @elseif($order->payment_status == 1)
                                            @if($paymentDate->diffInDays($now) <= 7)
                                                <a href="javascript:void(0)" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#refund{{$key}}modal">Refund</a>
                                            @else
                                                <span class="p-1 bg-danger text-white" style="border-radius: 3px">Date Expired</span>
                                            @endif
                                        @else
                                            <span class="p-1 bg-info text-white" style="border-radius: 3px">Not Eligible</span>
                                        @endif
                                    @else
                                        <span class="p-1 bg-info text-white" style="border-radius: 3px">Non-Refundable</span>
                                    @endif--}}
                                </td>
                                <td hidden>{{$sum = $sum + ($orderDetail->product_price * $orderDetail->product_qty) }}</td>
                                <td hidden>{{$tax = $tax + ($orderDetail->tax_total) }}</td>
                            </tr>
                            <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false" id="refund{{$key}}modal" tabindex="-1" aria-labelledby="refund{{$key}}modalModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
                                    <form action="{{--{{route('customer.order.refund.request')}}--}}" method="post">
                                        @csrf
                                        <input class="form-control" type="hidden" name="user_id" value="{{$orderDetail->seller_id}}">
                                        <input class="form-control" type="hidden" name="order_id" value="{{$order->id}}">
                                        <input class="form-control" type="hidden" name="order_code" value="{{$order->order_code}}">
                                        <input class="form-control" type="hidden" name="product_id" value="{{$orderDetail->product_id}}">
                                        <input class="form-control" type="hidden" name="price" value="{{$orderDetail->product_price}}">
                                        <input class="form-control" type="hidden" name="product_qty" value="{{$orderDetail->product_qty}}">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="refund{{$key}}modalModalLabel">Refund</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-left">
                                                            <p class="text-left"><span class="fw-bold" style="font-weight: bold">Product name : </span>{{$orderDetail->product_name}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row row mt-10">
                                                        <div class="col-lg-12 text-left">
                                                            <textarea name="reason" id="" cols="30" rows="5" placeholder="type refund reason">{{old('reason')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="invoice-summary">
                    <table>
                        <tr>
                            <th>Subtotal:</th>
                            <td class="text-right">৳ {{$sum}}</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td class="text-right"> ৳ {{$order->total_shipping}}</td>
                        </tr>
                        <tr>
                            <th>Tax (5%):</th>
                            <td class="text-right">৳ {{$tax}}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td class="text-right">৳ {{$sum+$order->total_shipping+$tax}}</td>
                        </tr>
                    </table>
                </div>
                <div class="invoice-footer">
                    <p>Thank you for your orders!</p>
                    <p>If you have any questions about this invoice, please contact us at {{$setting->email}}</p>
                    <div class="text-right">

                        @if($order->order_status == 0)
                            <button class="btn btn-danger btn-sm" onclick="return confirm_delete('{{ $order->id }}')">Cancel</button>
                        @endif
                        <a href="{{--{{route('customer.order.invoice',$order->order_code)}}--}}" class="btn btn-success btn-sm"><i class="fi-rs-info"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

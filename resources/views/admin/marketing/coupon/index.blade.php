@extends('admin.master')
@section('title','Admin Coupon Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Coupon Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Coupon</li>
            </ol>
        </div>
    </div>
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title">Coupon Table</h3>
                <a href="{{route('admin-coupon.create')}}" class="btn btn-primary my-1 mx-2 text-center">+ADD</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">SL No</th>
                            <th class="border-bottom-0">Type</th>
                            <th class="border-bottom-0">Coupon code</th>
                            <th class="border-bottom-0">User Name</th>
                            <th class="border-bottom-0">Date</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $id=0;
                            @endphp
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $coupon->coupon_type=='product' ? "Product Base": "Cart Base"}}</td>
                                    <td>{{ $coupon->coupon_code}}</td>
                                    <td>{{ $coupon->user->name}}</td>
                                    <td>{{ $coupon->date_range }}</td>
                                    <td>{{ $coupon->status ==1 ? "Active": "Inactive" }}</td>
                                    <td class="justify-content-center d-flex text-center">
                                        <a href="{{route('admin-coupon.edit',$coupon->id)}}" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('admin-coupon.delete',$coupon->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger my-2 me-1"><i class="fa fa-trash-o"></i></button>
                                        </form>
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

@endsection


@extends('admin.master')
@section('title','Admin Coupon Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Subscribers Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subscribers</li>
            </ol>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Subscribers Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered text-center text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Status</th>
{{--                                <th class="border-bottom-0">Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $id=0;
                            @endphp
                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subscriber->email}}</td>
                                    <td>{{ $subscriber->status ==1 ? "Active": "Inactive" }}</td>
{{--                                    <td class="justify-content-center d-flex text-center">--}}
{{--                                        <form action="{{route('admin-coupon.delete',$coupon->id)}}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger my-2 me-1"><i class="fa fa-trash-o"></i></button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}

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



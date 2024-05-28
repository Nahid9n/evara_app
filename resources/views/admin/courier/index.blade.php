@extends('admin.master')
@section('title','Manage Courier Page')
@section('body')



    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Courier Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Courier</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Courier Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-danger">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Courier Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Mobile</th>
                                <th class="border-bottom-0">Address</th>
                                <th class="border-bottom-0">Shipping_cost</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($couriers as $courier)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$courier->name}}</td>
                                    <td>{{$courier->email}}</td>
                                    <td>{{$courier->mobile}}</td>
                                    <td>{{$courier->address}}</td>
                                    <td>{{$courier->shipping_cost}}</td>
                                    <td>{{$courier->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    {{--                                    <td class="d-flex">--}}
                                    <td>
                                        <a href="{{route('courier.edit', $courier->id)}}" class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ route('courier.destroy',$courier->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
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

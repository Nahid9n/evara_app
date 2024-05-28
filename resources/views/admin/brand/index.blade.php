@extends('admin.master')
@section('title','Manage Brand Page')
@section('body')

{{--
    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Brand Show  Table</h6>
                        <hr/>

                        <table id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                            <th>sl</th>
                            <th>Brand Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>




                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->name }}</td>

                                    <td>{{ substr($brand->description,0,50) }}</td>

                                    <td><img src="{{ asset($brand->image) }}" alt="" style="height: 50px ; width: 50px "></td>

                                    <td>{{ $brand->status ==1 ? 'Active' : 'Inactive' }}</td>
                                    <td>


                                        <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-primary btn-sm float-start m-1 ">Edit</a>

                                        @if($brand->status ==1 )
                                            <a href="{{ route('brand.show',$brand->id) }}" class="btn btn-warning btn-sm float-start m-1 ">Inactive</a>
                                        @else
                                            <a href="{{ route('brand.show',$brand->id) }}" class="btn btn-success btn-sm float-start m-1 ">Active</a>
                                        @endif

                                        <form action="{{ route('brand.destroy',$brand->id) }}" method="post">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                Delete
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
--}}

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Brand Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Brand Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Brand Name</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{ substr($brand->description,0,50) }}</td>
                                    <td><img src="{{asset($brand->image)}}" alt="" height="40" width="60"/></td>
                                    <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
{{--                                    <td class="d-flex">--}}
                                    <td>
                                        <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if($brand->status ==1 )
                                            <a href="{{ route('brand.show',$brand->id ) }}" class="btn btn-warning btn-sm float-start m-1" > <i class="fa fa-lock"></i></a>
                                        @else
                                            <a href="{{ route('brand.show',$brand->id ) }}" class="btn btn-blue btn-sm float-start m-1" > <i class="fa fa-unlock"></i></a>
                                        @endif
                                        {{--
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                        {{--
                                                <a href="" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-unlock"></i>
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                        --}}
                                        <form action="{{ route('brand.destroy',$brand->id) }}" method="post">
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

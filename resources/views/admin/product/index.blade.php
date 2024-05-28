@extends('admin.master')
@section('title','Manage Product Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Code</th>
                                <th class="border-bottom-0">Category Name</th>
{{--                                <th class="border-bottom-0">Sub Category Name</th>--}}
{{--                                <th class="border-bottom-0">Brand Name</th>--}}
{{--                                <th class="border-bottom-0">Unit Name</th>--}}
{{--                                <th class="border-bottom-0">Color Name</th>--}}
{{--                                <th class="border-bottom-0">Size Name</th>--}}

{{--                                <th class="border-bottom-0">Product Code</th>--}}

{{--                                <th class="border-bottom-0">Short Description</th>--}}
{{--                                <th class="border-bottom-0">Long Description</th>--}}
                                <th class="border-bottom-0">Product Image</th>
{{--                                <th class="border-bottom-0">Product Other Image</th>--}}
{{--                                <th class="border-bottom-0">Product Regular Price</th>--}}
{{--                                <th class="border-bottom-0">Product Selling Price</th>--}}
                                <th class="border-bottom-0">Stock Amount</th>

                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
{{--                                    <td>{{$product->category->name}}</td>--}}
                                    <td>{{$product->category->name}}</td>
{{--                                    <td>{{$product->subCategory->name}}</td>--}}
{{--                                    <td>{{$product->brand->name}}</td>--}}
{{--                                    <td>{{$product->unit->name}}</td>--}}

{{--                                    <td>{{$product->code}}</td>--}}
{{--                                    <td>{{$product->code}}</td>--}}
{{--                                    <td>{{$product->code}}</td>--}}
{{--                                    <td>{{ substr($product->short_description,0,50) }}</td>--}}
{{--                                    <td>{{ substr($product->long_description,0,50) }}</td>--}}
                                    <td><img src="{{asset($product->image)}}" alt="" height="40" width="60"/></td>
{{--                                    <td><img src="{{asset($product->image)}}" alt="" height="40" width="60"/></td>--}}
{{--                                    <td>{{$product->regular_price}}</td>--}}
{{--                                    <td>{{$product->selling_price}}</td>--}}
                                    <td>{{$product->stock_amount}}</td>
                                    <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('product.show', $product->id)}}" class="btn btn-info btn-sm float-start m-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if($product->status ==1 )
                                            <a href="{{ route('product.show',$product->id ) }}" class="btn btn-warning btn-sm float-start m-1" > <i class="fa fa-lock"></i></a>
                                        @else
                                            <a href="{{ route('product.show',$product->id ) }}" class="btn btn-blue btn-sm float-start m-1" > <i class="fa fa-unlock"></i></a>
                                        @endif
                                        <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1"
                                                    onclick="return confirm('Are you want to delete this !!!')">
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

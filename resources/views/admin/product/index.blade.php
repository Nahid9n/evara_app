@extends('admin.master')
@section('title','Manage Product Page')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All Product Info</h3>
                    <a href="{{route('product.create')}}" class="btn btn-success my-1 float-end mx-2 text-center">+add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Code</th>
                                <th class="border-bottom-0">Category Name</th>
                                <th class="border-bottom-0">Product Image</th>
                                <th class="border-bottom-0">Stock Amount</th>

                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ truncateWords($product->name, 14) }}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->category->name}}</td>

                                    <td><img src="{{asset($product->image)}}" alt="" height="40" width="60"/></td>
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
                                            <a href="{{--{{ route('product.show',$product->id ) }}--}}" class="btn btn-warning btn-sm float-start m-1" > <i class="fa fa-lock"></i></a>
                                        @else
                                            <a href="{{--{{ route('product.show',$product->id ) }}--}}" class="btn btn-blue btn-sm float-start m-1" > <i class="fa fa-unlock"></i></a>
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
                                <div class="modal fade" id="showProduct{{$key}}">
                                    <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header p-5">
                                                <h3 class="card-title">Product Details Table</h3>
                                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-3 text-center shadow">
                                                                <img src="{{asset($product->image ?? '')}}" alt="" width="200" height="200">
                                                                <p class="text-center">Product Front Image</p>
                                                            </div>
                                                            <div class="col-md-3 text-center shadow">
                                                                <img src="{{asset($product->back_image ?? '')}}" alt="" width="200" height="200">
                                                                <p class="text-center">Product Back Image</p>
                                                            </div>
                                                            <p class="text-center my-2 fw-bold">Other Images</p>
                                                            @if(isset($product->productImages))
                                                                @foreach($product->productImages as $productImage)
                                                                    <div class="col-md-2 shadow text-center">
                                                                        <img src="{{asset($productImage->image)}}" alt="" class="img-fluid" width="250"/>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <div class="table my-3 table-bordered table-hover table-striped">
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Product ID</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{$product->id}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Product Name</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{ truncateWords($product->name, 14) }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Product Code</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{$product->code}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Category Name</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{$product->category->name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Sub Category Name</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{$product->subCategory->name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Brand Name</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{$product->brand->name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Unit Name</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{$product->unit->name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Product Color</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    @foreach($product->colors as $color)
                                                                        <span>{{$color->color->name.' '}} </span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Product Size</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    @foreach($product->sizes as $size)
                                                                        <span>{{$size->size->name.' '}} </span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Short Description</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{ substr($product->short_description,0,50) }} </span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Long Description</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{!! $product->long_description !!} </span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Price</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span> Regular Price : {{$product->regular_price}}</span> <br/>
                                                                    <span> Selling Price : {{$product->selling_price}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Stock Amount</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span> {{$product->stock_amount}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Total View</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span> {{$product->hit_count}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Total Sale</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span> {{$product->sales_count}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Tags</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <input type="text" data-role="tagsinput" name="tags" class="form-control" value="{{ $product->tags }}" placeholder="type & press enter" readonly disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Refund Status</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{ $product->refund == 1 ? "refundable" : "Not refundable" }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Featured Status</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{ $product->featured_status == 1 ? "Featured" : "Not Featured" }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row my-3">
                                                                <div class="col-3">
                                                                    <span>Publication Status</span>
                                                                </div>
                                                                <div class="col-9">
                                                                    <span>{{ $product->status == 1 ? "Published" : "Not Published" }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

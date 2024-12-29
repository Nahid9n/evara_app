@extends('admin.master')
@section('title', 'Edit Coupon Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Coupon Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header justify-content-between border-bottom">
                    <h3 class="card-title text-bold">Edit Coupon Form</h3>
                    <a href="{{ route('admin-coupon.index') }}" class="btn text-white px-5 btn-primary">All Coupon</a>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <h4 class="col-md-8 offset-md-2 text-center">Coupon Information Update</h4>
                        <div class="col-md-8 offset-md-2">
                            <select name="coupon_type" class="form-control" required>
                                <option value="blank" disabled>Select One</option>
                                <option value="product" {{$coupon->coupon_type == 'product' ? 'selected':'hidden'}}>For Products</option>
                                <option value="total_order" {{$coupon->coupon_type == 'total_order' ? 'selected':'hidden'}}>For Total Orders</option>
                            </select>
                        </div>
                    </div>
                    <div class="coupon-item" id="blank-tab"></div>
                    @if($coupon->coupon_type == 'product')
                    <div class="" id="product-tab">
                        <form action="{{ route('admin-coupon.product.update',$coupon->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('put')
                        <h4>Add Product Coupon</h4>
                        <hr class="mt-3">
                        <input type="hidden" name="coupon_type" value="product" readonly>
                            <div class="row mb-4">
                            <label for="coupon_code" class="col-md-3 form-label">Coupon Code <span
                                class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $coupon->coupon_code }}" name="coupon_code"
                                        id="coupon_code" placeholder="Coupon Number" required type="text">
                                    <b></b><span class="text-danger">{{ $errors->first('coupon_code') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Product <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 select2-show-search form-select" data-placeholder="Select Product" name="product_id" required>
                                        <option class="form-control" label="Choose one">Select Prodcut</option>
                                        @forelse($products as $product)
                                            <option value="{{ $product->id}}" {{$coupon->product_id == $product->id ? 'selected' : ''}}>{{ $product->name }} (SKU : {{ $product->code }})</option>
                                        @empty
                                            <option class="text-center text-danger"> --No Product--</option>
                                        @endforelse
                                    </select>
                                    <b><span class="text-danger">{{ $errors->first('product') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="datepicker-date" class="col-md-3 form-label">Date Range</label>
                                <div class="input-group col-md-9">
                                    <div class="input-group-text bg-primary-transparent text-primary">
                                        <i class="fe fe-calendar text-20"></i>
                                    </div>
                                    <input class="form-control" name="datefilter" id="datepicker-date" placeholder="MM/DD/YYYY" type="text" value="{{$coupon->date_range }}" required>
                                    <b></b><span class="text-danger">{{ $errors->first('daterange') }}</span></b>
                                </div><!-- input-group -->
                            </div>
                            <div class="row mb-4">
                                <label for="discount" class="col-md-3 form-label">Discount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" value="{{ $coupon->discount }}" name="discount" id="discount"
                                        placeholder="discount" required type="number">
                                    <b></b><span class="text-danger">{{ $errors->first('discount') }}</span></b>
                                </div>
                                <div class="col-md-3">
                                    <select name="discount_status" id="" class="form-control">
                                        <option value="0" {{$coupon->discount_status ==  0 ?  'selected':''}}>Amount</option>
                                        <option value="1" {{$coupon->discount_status ==  1 ?  'selected':''}}>Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Publication Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 form-select" name="status">
                                        <option value="1" {{$coupon->status ==  1 ?  'selected':''}}>Active</option>
                                        <option value="0" {{$coupon->status ==  0 ?  'selected':''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="radio" class="col-md-3 form-label"></label>
                                <div class="col-md-9">
                                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                                </div>
                            </div>
                     </form>
                    </div>
                    @endif
                    @if($coupon->coupon_type == 'total_order')
                    <div class="" id="totalOrder-tab">
                        <form action="{{ route('admin-coupon.orders.update',$coupon->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('put')
                            <h4>Add Total Orders Coupon</h4>
                            <hr class="mt-3">
                            <input type="hidden" name="coupon_type" value="total_order" readonly>
                            <div class="row mb-4">
                                <label for="coupon_code" class="col-md-3 form-label">Coupon Code <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $coupon->coupon_code }}" name="coupon_code"
                                        id="coupon_code" placeholder="Coupon Number" required type="text">
                                    <b></b><span class="text-danger">{{ $errors->first('coupon_code') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="min_shopping" class="col-md-3 form-label">Minimum Shopping<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" value="{{ $coupon->min_shopping }}" name="min_shopping"
                                        id="min_shopping" placeholder="Minimum Shopping"   required>
                                    <b></b><span class="text-danger">{{ $errors->first('min_shopping') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="discount" class="col-md-3 form-label">Discount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" value="{{ $coupon->discount }}" name="discount" id="discount"
                                        placeholder="discount" required type="number">
                                    <b></b><span class="text-danger">{{ $errors->first('discount') }}</span></b>
                                </div>
                                <div class="col-md-3">
                                    <select name="discount_status" id="" class="form-control">
                                        <option value="0" {{$coupon->discount_status ==  0 ?  'selected':''}}>Amount</option>
                                        <option value="1" {{$coupon->discount_status ==  1 ?  'selected':''}}>Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="min_shopping" class="col-md-3 form-label">Maximum Discount Amount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" value="{{ $coupon->max_discount_amount }}" name="max_discount_amount"
                                        id="min_shopping" placeholder="Maximum Discount Amount" required>
                                    <b></b><span class="text-danger">{{ $errors->first('max_discount_amount') }}</span></b>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="datepicker-date" class="col-md-3 form-label">Date Range</label>
                                <div class="input-group col-md-9">
                                    <div class="input-group-text bg-primary-transparent text-primary">
                                        <i class="fe fe-calendar text-20"></i>
                                    </div>
                                    <input class="form-control" name="datefilter" id="datepicker-date1" placeholder="MM/DD/YYYY" type="text" value="{{$coupon->date_range }}" required>
                                    <b></b><span class="text-danger">{{ $errors->first('daterange') }}</span></b>
                                </div><!-- input-group -->
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Publication Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 form-select" name="status">
                                        <option value="1" {{$coupon->status ==  1 ?  'selected':''}}>Active</option>
                                        <option value="0" {{$coupon->status ==  0 ?  'selected':''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="radio" class="col-md-3 form-label"></label>
                                <div class="col-md-9">
                                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
@endpush

@extends('admin.master')
@section('title', 'Add Coupon Page')
@section('body')
<style>

    #product-tab{
        display: none
    }
    #totalOrder-tab{
        display: none
    }

</style>
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Coupon Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header justify-content-between border-bottom">
                    <h3 class="card-title text-bold">Add Coupon Form</h3>
                    <a href="{{ route('admin-coupon.index') }}" class="btn text-white px-5 btn-primary">All Coupon</a>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <h4 class="col-md-8 offset-md-2 text-center">Coupon Information Adding</h4>
                        <div class="col-md-8 offset-md-2">
                            <select name="coupon_type" class="form-control" onchange="coupon(this)" required>
                                <option value="blank">Select One</option>
                                <option value="product">For Products</option>
                                <option value="total_order">For Total Orders</option>
                            </select>
                        </div>
                    </div>
                    <div class="coupon-item" id="blank-tab"></div>
                    <div class="coupon-item" id="product-tab">
                        <form action="{{ route('admin-coupon.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4>Add Product Coupon</h4>
                        <hr class="mt-3">
                        <input type="hidden" name="coupon_type" value="product" readonly>
                        <div class="row mb-4">
                            <label for="coupon_code" class="col-md-3 form-label">Coupon Code<span
                                class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ old('coupon_code') }}" name="coupon_code"
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
                                    <select class="form-control" name="product_id" required>
                                        <option class="form-control" label="Choose one" disabled>Select Product</option>
                                        @forelse($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
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
                                    <input class="form-control" name="datefilter" id="datepicker-date" placeholder="MM/DD/YYYY" type="text" value="{{ old('datefilter') }}" required>
                                    <b></b><span class="text-danger">{{ $errors->first('datefilter') }}</span></b>
                                </div><!-- input-group -->
                            </div>
                            <div class="row mb-4">
                                <label for="discount" class="col-md-3 form-label">Discount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" value="{{ old('discount') }}" name="discount" id="discount"
                                        placeholder="Discount" required type="number" min="0" step="0.01" required>
                                    <b></b><span class="text-danger">{{ $errors->first('discount') }}</span></b>
                                </div>
                                <div class="col-md-3 form-group">
                                    <select name="discount_status" id="" class="form-control select2">
                                        <option value="0">Amount</option>
                                        <option value="1">Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Publication Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 " name="status">
                                        <option value="1" >Active</option>
                                        <option value="0">Inactive</option>
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

                    <div class="coupon-item" id="totalOrder-tab">
                        <form action="{{ route('admin-coupon.orders.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                            <h4>Add Total Orders Coupon</h4>
                            <hr class="mt-3">
                            <input type="hidden" name="coupon_type" value="total_order" readonly>
                            <div class="row mb-4">
                                <label for="coupon_code" class="col-md-3 form-label">Coupon Code <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ old('coupon_code') }}" name="coupon_code"
                                        id="coupon_code" placeholder="Coupon Number" required type="text">
                                    <b></b><span class="text-danger">{{ $errors->first('coupon_code') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="min_shopping" class="col-md-3 form-label">Minimum Shopping<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" value="{{ old('min_shopping') }}" name="min_shopping"
                                        id="min_shopping" placeholder="Minimum Shopping" min="1" required>
                                    <b></b><span class="text-danger">{{ $errors->first('min_shopping') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="discount" class="col-md-3 form-label">Discount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" value="{{ old('discount') }}" name="discount" id="discount"
                                        placeholder="Discount"  type="number" min="0" step="0.01" required>
                                    <b></b><span class="text-danger">{{ $errors->first('discount') }}</span></b>
                                </div>
                                <div class="col-md-3 form-group">
                                    <select name="discount_status" id="" class="form-control select2">
                                        <option value="0">Amount</option>
                                        <option value="1">Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="min_shopping" class="col-md-3 form-label">Maximum Discount Amount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" value="{{ old('max_discount_amount') }}" name="max_discount_amount"
                                        id="min_shopping" placeholder="Maximum Discount Amount" min="1"   required>
                                    <b></b><span class="text-danger">{{ $errors->first('max_discount_amount') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="datepicker-date" class="col-md-3 form-label">Date Range</label>
                                <div class="input-group col-md-9">
                                    <div class="input-group-text bg-primary-transparent text-primary">
                                        <i class="fe fe-calendar text-20"></i>
                                    </div>
                                    <input class="form-control" name="datefilter" id="datepicker-date1" placeholder="MM/DD/YYYY" type="text" value="{{ old('datefilter') }}" required>
                                    <b></b><span class="text-danger">{{ $errors->first('datefilter') }}</span></b>
                                </div><!-- input-group -->
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Publication Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 form-select" name="status">
                                        <option value="1" >Active</option>
                                        <option value="0">Inactive</option>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
{{--<script type="text/javascript">--}}
{{--    $(function() {--}}

{{--      $('input[name="datefilter"]').daterangepicker({--}}
{{--          autoUpdateInput: false,--}}
{{--          locale: {--}}
{{--              cancelLabel: 'Clear'--}}
{{--          }--}}
{{--      });--}}

{{--      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {--}}
{{--          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));--}}
{{--      });--}}

{{--      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {--}}
{{--          $(this).val('');--}}
{{--      });--}}

{{--    });--}}
{{--    </script>--}}

    <script>
        function coupon(e) {

            if(e.value == 'blank'){
                $('.coupon-item').hide();
                $('#blank-tab').show();
            }

            if(e.value == 'product'){
                $('.coupon-item').hide();
                $('#product-tab').show();
            }

            if(e.value == 'total_order'){
                $('.coupon-item').hide();
                $('#totalOrder-tab').show();
            }
        }
    </script>

@endpush

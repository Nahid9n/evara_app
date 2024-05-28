
@extends('admin.master')

@section('title', 'Add Product Offer')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Offer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product Offer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Add Product Offer Form</h3>
                        <a href="{{route('product_offer.index')}}" class="btn btn-primary ms-auto rounded-0">Manage Product Offer</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('product_offer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Product Name</label>
                                    <select name="product_id" class="form-control select2-show-search" required>
                                        <option value="" disabled selected>-- Select Product --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    <span
                                        class="text-danger">{{ $errors->has('product_id') ? $errors->first('product_id') : '' }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title One</label>
                                <input type="text" class="form-control" name="title_one" value="{{ old('title_one') }}">
                                <span class="text-danger">{{ $errors->has('title_one') ? $errors->first('title_one') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title Two</label>
                                <input type="text" class="form-control" name="title_two" value="{{ old('title_two') }}">
                                <span class="text-danger">{{ $errors->has('title_two') ? $errors->first('title_two') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title Three</label>
                                <input type="text" class="form-control" name="title_three" value="{{ old('title_three') }}">
                                <span class="text-danger">{{ $errors->has('title_three') ? $errors->first('title_three') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Offer Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Discount Amount</label>
                                <input type="text" class="form-control" name="discount_amount" value="{{ old('discount_amount') }}"/>
                                <span class="text-danger">{{ $errors->has('discount_amount') ? $errors->first('discount_amount') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Offer Image</label>
                                <input type="file" class="form-control" name="image" id="imgInp">
                                <img src="" class="mt-3" id="categoryImage" alt="">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1"
                                              name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" checked name="status"><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Create New Product Offer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

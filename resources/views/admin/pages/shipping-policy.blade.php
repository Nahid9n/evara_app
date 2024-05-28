@extends('admin.master')
@section('title','Setting Shipping Policy')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Shipping Policy Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Shipping Policy Module</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Shipping Policy</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card mt-5">
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Shipping Policy Form</h6>
                        <hr/>

{{--                        <form action="{{ route('shipping-policy-form.store') }}" method="post" enctype="multipart/form-data">--}}
                        <form action="{{ route('shipping-policy-form.update',$shippingPolicy->id) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="summernote" class="form-label">Shipping Policy</label>
                                <textarea class="form-control" id="summernote"  name="description"  placeholder="Write here">{{ $shippingPolicy->description }}</textarea>

                            </div>
                            <div class="col-12">
                                <label class="form-label">Publication Status</label>
                                {{--
                                <label for=""><input type="radio" value="1"  name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0"  name="status"><span> Unpublished </span></label>
                                 --}}
                                <label for=""><input type="radio" value="1" {{ $shippingPolicy->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" {{ $shippingPolicy->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>


                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success m-1">Update Shipping Policy</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



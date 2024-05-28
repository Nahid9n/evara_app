@extends('admin.master')
@section('title','Add Ads  Page')
@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Ad  Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Ad </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Ad </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Ad  Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('ad.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <select name="product_id" id="" class="form-control" required>
                                    <option value="" disabled selected> -- Select Product --</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}"> {{$product->name}} </option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{$errors->has('product_id') ? $errors->first('product_id') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Ad Tilte</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('title') }}" name="title" id="name" placeholder="Add tilte" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Ad Sub Tilte</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('sub_title') }}" name="sub_title" id="name" placeholder="Add sub_title" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Position</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('position') }}" name="position" id="name" placeholder="position" type="number"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Offer_price</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('offer_price') }}" name="offer_price" id="name" placeholder="offer_price" type="number"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="discount" class="col-md-3 form-label">Discount</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('discount') }}" name="discount" id="discount" placeholder="discount" type="number"/>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Ad Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image"  type="file"/>

                                <img src="" id="categoryImage" alt="" />
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label for=""><input type="radio" value="1"  name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" checked name="status"><span> Unpublished </span></label>
                            </div>
                        </div>





                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Ad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
@extends('admin.master')
@section('title','Edit Brand Page')
@section('body')

    <div class="row">
        <div class="col-xl-8 mx-auto">

            <div class="card mt-5">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Brand Edit Form</h6>
                        <hr/>

                        <form action="{{ route('brand.update',$brand->id) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label class="form-label">Brand Name</label>
                                <input type="text" name="name" value="{{ $brand->name }}"  class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label"> Description </label>
                                <textarea name="description" class="form-control" >{{ $brand->description }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label"> Image  </label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset($brand->image) }}" alt="" style="height: 50px ; width: 50px ">
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success m-1">Save Info</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

--}}

@extends('admin.master')
@section('title','Edit Brand Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Brand Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('brand.update',$brand->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $brand->name }}" name="name" id="name"
                                       placeholder="Brand Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description"
                                          placeholder="Brand Description">{{ $brand->description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Brand Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image" type="file"/>
                                {{--                                <img src="" id="categoryImage" alt="" height="100" width="120"/>--}}
                                <img src="{{ asset($brand->image) }}" id="categoryImage" alt="" height="100"
                                     width="120"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label for=""><input type="radio" value="1"
                                                     {{ $brand->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0"
                                                     {{ $brand->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Brand Info</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

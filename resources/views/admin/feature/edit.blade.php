

@extends('admin.master')
@section('title','Edit Unit Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Feature Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Feature</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Feature</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Feature Form</h3>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="{{ route('feature.update',$feature->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">feature Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $feature->name }}" name="name" id="name"
                                       placeholder="feature Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Feature Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image" type="file"/>
                                {{--                                <img src="" id="categoryImage" alt="" height="100" width="120"/>--}}
                                <img src="{{ asset($feature->image) }}" id="categoryImage" alt="" height="100"
                                     width="120"/>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label for=""><input type="radio" value="1" {{ $feature->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" {{ $feature->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Feature Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

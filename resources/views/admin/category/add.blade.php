@extends('admin.master')
@section('title','Add Category Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-xl-8 mx-auto">

            <div class="card mt-5">
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Category Create Form</h6>
                        <hr/>

                        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Category Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Category Description </label>
                                <textarea name="description" class="form-control" ></textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Category Image  </label>
                                <input type="file" id="imgInp" name="image" class="form-control">
                                <img src="" alt="" id="categoryImage" >
                            </div>
                            <div class="col-12">
                                <label class="form-label">Publication Status</label>
                                <input type="radio" value="1" checked name="status" /><span>Published</span>
                                <input type="radio" value="0" name="status" /><span>Unpublished</span>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success m-1">Create New Category</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Category Create Form</h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Category Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="category name" required>
                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Category Description </label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="5"  placeholder="category description"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Category Image </label>
                            <input type="file" id="imgInp" name="image" class="form-control">
                            <img src="" alt="" id="categoryImage" >
                        </div>
                        <div class="col-12">
                            <label class="form-label">Publication Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="1" selected>Published</option>
                                <option value="0">Unpublished</option>
                            </select>
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
@endsection

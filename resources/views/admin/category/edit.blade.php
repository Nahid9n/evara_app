
@extends('admin.master')
@section('title','Edit Category Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Category Edit Form</h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label">Category Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $category->name }}"  name="name" class="form-control"/>
                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Category Description </label>
                            <textarea name="description" class="form-control" >{{ $category->description }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Category Image  </label>
                            <input type="file" id="imgInp" name="image" class="form-control"/>
                            @if(isset($category->image) != '')
                            <img src="{{ asset($category->image) }}" height="120" width="100" alt="" id="categoryImage" />
                            @endif
                        </div>
                        <div class="col-12">
                            <label class="form-label">Publication Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="1" {{$category->status == 1 ? 'selected' : ''}} >Published</option>
                                <option value="0" {{$category->status == 0 ? 'selected' : ''}}>Unpublished</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success m-1">Update Category Info</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




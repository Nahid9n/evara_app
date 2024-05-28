@extends('admin.master')
@section('title','Edit Sub Category')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    {{--
        <div class="row">

            <div class="col-xl-8 mx-auto">

                <div class="card mt-5">
                    <div class="card-body">
                        <p class="text-muted">{{session('message')}}</p>
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Category Create Form</h6>
                            <hr/>

                            <form action="{{ route('sub-category.store') }}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="col-12">
                                    <label class="form-label">Category Name</label>
                                    <select class="form-control" name="category_id"  required>
                                        <option value="" disabled selected>-- Select Category --</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        {{ $errors->has('category_id') ? $errors->first('category_id') : '' }}
                                    </span>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Sub Category Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                                    <span class="text-danger">
                                        {{ $errors->has('name') ? $errors->first('name') : '' }}
                                    </span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Sub Category Description </label>
                                    <textarea name="description" class="form-control" ></textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Sub Category Image  </label>
                                    <input type="file" id="imgInp" name="image" class="form-control"/>
                                    <img src="" alt="" id="categoryImage" >
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Publication Status</label>
                                    <input type="radio" value="1" checked name="status" />
                                    <span>Published</span>
                                    <input type="radio" value="0" name="status" />
                                    <span>Unpublished</span>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success m-1">Create New Sub Category</button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Sub Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('sub-category.update',$sub_category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="" class="col md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id" id="" class="form-control" required>
                                    <option value="" disabled selected> -- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$sub_category->category_id == $category->id ? 'selected' : ''}} > {{$category->name}} </option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$sub_category->name}}" name="name" id="name" placeholder="Sub Category Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Sub Category Description" >{{$sub_category->description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image"  type="file"/>
                                {{--                                <img src="" id="categoryImage" alt="" height="100" width="120"/>--}}
                                <img src="{{asset($sub_category->image)}}" id="categoryImage" alt="" height="100" width="120" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label> <input type="radio" value="1" {{$sub_category->status == 1 ? 'checked' : ''}} name="status"><span> Published</span> </label>
                                <label> <input type="radio" value="0" {{$sub_category->status == 0 ? 'checked' : ''}} name="status"><span> Unpublished</span> </label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Sub Category Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

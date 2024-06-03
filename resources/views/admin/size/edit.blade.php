@extends('admin.master')
@section('title','Edit Size Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Size Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Size</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Size Form</h3>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="{{ route('size.update',$size->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Size Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $size->name }}" name="name" id="name" placeholder="Size Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Size Code</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $size->code }}" name="code" id="code" placeholder="Size Code" type="text"/>
                                <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Size Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Size Description" >{{ $size->description }}</textarea>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <select class="form-control" name="status" id="">
                                    <option value="1" {{$size->status == 1 ? 'selected' : ''}} >Published</option>
                                    <option value="0" {{$size->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Size Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

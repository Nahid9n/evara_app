

@extends('admin.master')
@section('title','Edit Unit Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Unit Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Unit</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Unit Form</h3>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="{{ route('unit.update',$unit->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Unit Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $unit->name }}" name="name" id="name" placeholder="Unit Name" type="text" required/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Unit Code <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $unit->code }}" name="code" id="code" placeholder="Unit Code" type="text" required/>
                                <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Unit Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Unit Description" >{{ $unit->description }}</textarea>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <select class="form-control" name="status" id="">
                                    <option value="1" {{$unit->status == 1 ? 'selected' : ''}} >Published</option>
                                    <option value="0" {{$unit->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Unit Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

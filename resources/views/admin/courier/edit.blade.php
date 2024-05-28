

@extends('admin.master')
@section('title','Edit Courier Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Courier Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Courier</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Courier Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('courier.update',$courier->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Courier Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $courier->name }}" name="name" id="name" placeholder="Courier Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $courier->email}}" name="email" id="email" placeholder="Courier Name" type="email"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Mobile</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $courier->mobile }}" name="mobile" id="mobile" placeholder="Courier mobile" type="number"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address" id="address" placeholder="Address " >{{ $courier->address }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Shipping_cost</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $courier->shipping_cost }}" name="shipping_cost" id="shipping_cost" placeholder="Shipping_cost" type="number"/>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label for=""><input type="radio" value="1" {{ $courier->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" {{ $courier->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Courier Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

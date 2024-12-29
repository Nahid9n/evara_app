@extends('admin.master')
@section('title','Manage Feature Page')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All Feature Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addSize" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Size Name</th>
                                <th class="border-bottom-0">Size Code</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($features as $key=>$feature)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$feature->name}}</td>
                                    <td><img src="{{asset($feature->image)}}" alt="" height="40" width="60"/></td>

                                    <td>{{$feature->status == 1 ? 'Published' : 'Unpublished'}}</td>

                                    <td>
                                        <a href="" class="btn btn-success btn-sm float-start m-1" data-bs-toggle="modal" data-bs-target="#editSize{{$key}}" >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('feature.destroy',$feature->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editSize{{$key}}">
                                    <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header p-5">
                                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
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
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSize">
        <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header p-5">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Add Feature Form</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('feature.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Feature Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Feature Name" type="text"/>
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>
                                </div>



                                <div class="row mb-4">
                                    <label for="imgInp" class="col-md-3 form-label">Feature Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="imgInp" name="image"  type="file"/>

                                        <img src="" id="categoryImage" alt="" />
                                    </div>
                                </div>



                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Publication Status</label>
                                    <div class="col-md-9 pt-3">
                                        <label for=""><input type="radio" value="1" checked name="status"><span> Published </span></label>
                                        <label for=""><input type="radio" value="0" checked name="status"><span> Unpublished </span></label>
                                    </div>
                                </div>

                                <button class="btn btn-primary rounded-0 float-end" type="submit">Create New feature</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

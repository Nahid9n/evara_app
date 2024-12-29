@extends('admin.master')
@section('title','Manage Banner')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">All Banner Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addCategory" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($banners as $key => $banner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset($banner->image) }}" alt="" width="150px"></td>
                                    <td>{{ $banner->position }}</td>
                                    <td>{{ $banner->status ==1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('admin.banner.store',$banner->id) }}"  data-bs-toggle="modal" data-bs-target="#editBanner{{$key}}"  class="btn btn-primary btn-sm float-start m-1 ">Edit</a>
                                        <a href="#" class="btn btn-success btn-sm float-start m-1" data-bs-toggle="modal" data-bs-target="#showBanner{{$key}}">Show</a>
                                        <form action="{{ route('admin.banner.destroy',$banner->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editBanner{{$key}}">
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
                                                        <h3 class="card-title">Category Edit Form</h3>
                                                    </div>
                                                    <div class="card-body">

                                                        <form action="{{ route('admin.banner.update',$banner->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="col-12">
                                                                <label class="form-label">Banner Image <span class="text-danger">*</span></label>
                                                                <input type="file" id="imgInp" name="image" class="form-control"/>
                                                                @if(isset($banner->image) != '')
                                                                    <img src="{{ asset($banner->image) }}" alt="" id="categoryImage" />
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Url </label>
                                                                <input type="url" value="{{ $banner->url }}"  name="url" class="form-control"/>
                                                                <span class="text-danger">{{$errors->has('url') ? $errors->first('url') : ''}}</span>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Position </label>
                                                                <input type="number" value="{{ $banner->position }}"  name="position" class="form-control"/>
                                                                <span class="text-danger">{{$errors->has('position') ? $errors->first('position') : ''}}</span>
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Publication Status</label>
                                                                <select class="form-control" name="status" id="">
                                                                    <option value="1" {{$banner->status == 1 ? 'selected' : ''}} >Published</option>
                                                                    <option value="0" {{$banner->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="d-grid">
                                                                    <button type="submit" class="btn btn-success m-1">Update Banner Info</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="showBanner{{$key}}">
                                    <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header p-5">
                                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                            <div class="col text-center">
                                                                <img class="img-fluid" src="{{ asset($banner->image) }}" alt="" width="500px" id="categoryImage" />
                                                                <h5 class="text-center my-3"> URL - {{ $banner->url }}</h5>
                                                                <h5 class="text-center my-3"> POSITION - {{ $banner->position }}</h5>
                                                                <h5 class="text-center my-3"> STATUS - {{ $banner->status == 0 ? 'Inactive':'Active' }}</h5>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $banners->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addCategory">
        <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header p-5">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title">Create New</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Banner Image <span class="text-danger">*</span></label>
                                    <input type="file" id="imgInp" name="image" class="form-control"/>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Url </label>
                                    <input type="url" value=""  name="url" class="form-control"/>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Position </label>
                                    <input type="number" value=""  name="position" class="form-control"/>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Publication Status</label>
                                    <select class="form-control" name="status" id="">
                                        <option value="1">Published</option>
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
        </div>
    </div>
@endsection

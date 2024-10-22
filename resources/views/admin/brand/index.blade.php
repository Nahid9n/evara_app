@extends('admin.master')
@section('title','Manage Brand Page')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All Brand Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addBrand" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Brand Name</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $key => $brand)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{ substr($brand->description,0,50) }}</td>
                                    <td><img src="{{asset($brand->image)}}" alt="" height="40" width="60"/></td>
                                    <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
{{--                                    <td class="d-flex">--}}
                                    <td>
                                        <a href="{{route('brand.edit', $brand->id)}}"  data-bs-toggle="modal" data-bs-target="#editBrand{{$key}}" class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if($brand->status ==1 )
                                            <a href="{{ route('brand.show',$brand->id ) }}" class="btn btn-warning btn-sm float-start m-1" > <i class="fa fa-lock"></i></a>
                                        @else
                                            <a href="{{ route('brand.show',$brand->id ) }}" class="btn btn-blue btn-sm float-start m-1" > <i class="fa fa-unlock"></i></a>
                                        @endif
                                        <form action="{{ route('brand.destroy',$brand->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editBrand{{$key}}">
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
                                                        <h3 class="card-title">Brand Edit Form</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form class="form-horizontal" action="{{ route('brand.update',$brand->id) }}" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-4">
                                                                <label for="name" class="col-md-3 form-label">Brand Name</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $brand->name }}" name="name" id="name"
                                                                           placeholder="Brand Name" type="text" required/>
                                                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-4">
                                                                <label for="description" class="col-md-3 form-label">Brand Description</label>
                                                                <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description"
                                          placeholder="Brand Description">{{ $brand->description }}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-4">
                                                                <label for="imgInp" class="col-md-3 form-label">Brand Image</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" id="imgInp" name="image" type="file"/>
                                                                    {{--                                <img src="" id="categoryImage" alt="" height="100" width="120"/>--}}
                                                                    <img src="{{ asset($brand->image) }}" id="categoryImage" alt="" height="100"
                                                                         width="120"/>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-4">
                                                                <label class="col-md-3 form-label">Publication Status</label>
                                                                <div class="col-md-9 pt-3">
                                                                    <select class="form-control" name="status" id="">
                                                                        <option value="1" {{$brand->status == 1 ? 'selected' : ''}} >Published</option>
                                                                        <option value="0" {{$brand->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-primary rounded-0 float-end" type="submit">Update Brand Info</button>

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
                        <div class="text-center">
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addBrand">
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
                            <h3 class="card-title">Add Brand Form</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Brand Name <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Brand Name" type="text" required/>
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="description" class="col-md-3 form-label">Brand Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" id="description" placeholder="Brand Description" ></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="imgInp" class="col-md-3 form-label">Brand Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="imgInp" name="image"  type="file"/>
                                        {{--                                <img src="" id="categoryImage" alt="" height="100" width="120"/>--}}
                                        <img src="" id="categoryImage" alt="" />
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Publication Status</label>
                                    <div class="col-md-9 pt-3">
                                        <select class="form-control" name="status" id="">
                                            <option value="1" selected>Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>

                                <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Unit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

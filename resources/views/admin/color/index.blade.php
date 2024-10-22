@extends('admin.master')
@section('title','Manage Color Page')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All Color Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addColor" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Color Name</th>
                                <th class="border-bottom-0">Color</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $key => $color)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$color->name}}</td>

                                    <td><div class="" style="width: 100% ; height: 25px; background-color: {{$color->code}}"></div></td>
                                    <td>{{ substr($color->description,0,50) }}</td>

                                    <td>{{$color->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    {{--                                    <td class="d-flex">--}}
                                    <td>
                                        <a href="{{route('color.edit', $color->id)}}" data-bs-toggle="modal" data-bs-target="#editColor{{$key}}"   class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if($color->status ==1 )
                                            <a href="{{ route('color.show',$color->id ) }}" class="btn btn-warning btn-sm float-start m-1" > <i class="fa fa-lock"></i></a>
                                        @else
                                            <a href="{{ route('color.show',$color->id ) }}" class="btn btn-blue btn-sm float-start m-1" > <i class="fa fa-unlock"></i></a>
                                        @endif

                                        <form action="{{ route('color.destroy',$color->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editColor{{$key}}">
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
                                                        <h3 class="card-title">Edit Color Form</h3>
                                                    </div>
                                                    <div class="card-body">

                                                        <form class="form-horizontal" action="{{ route('color.update',$color->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-4">
                                                                <label for="name"  class="col-md-3 form-label">Color Name <span class="text-danger">*</span></label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $color->name }}" name="name" id="name" placeholder="Color Name" type="text" required/>
                                                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="name"  class="col-md-3 form-label">Color Code</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $color->code }}" name="code" id="code" placeholder="Color Name" type="color"/>
                                                                    <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="description" class="col-md-3 form-label">Color Description</label>
                                                                <div class="col-md-9">
                                                                    <textarea class="form-control" name="description" id="description" placeholder="Color Description" >{{ $color->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label class="col-md-3 form-label">Publication Status</label>
                                                                <div class="col-md-9 pt-3">
                                                                    <select class="form-control" name="status" id="">
                                                                        <option value="1" {{$color->status == 1 ? 'selected' : ''}} >Published</option>
                                                                        <option value="0" {{$color->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-primary rounded-0 float-end" type="submit">Update Color Info</button>
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
    <div class="modal fade" id="addColor">
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
                            <h3 class="card-title">Add Color Form</h3>
                        </div>
                        <div class="card-body">

                            <form class="form-horizontal" action="{{ route('color.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Color Name  <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Color Name" type="text" required/>
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Color Code</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('code') }}" name="code" id="code" placeholder="Color Name" type="color"/>
                                        <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="description" class="col-md-3 form-label">Color Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" id="description" placeholder="Color Description" ></textarea>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Publication Status</label>
                                    <div class="col-md-9 pt-3">
                                        <select class="form-control" name="status" id="">
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>

                                <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Color</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

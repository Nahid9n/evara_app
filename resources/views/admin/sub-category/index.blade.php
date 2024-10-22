@extends('admin.master')
@section('title','Manage Sub Category Page')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">All Sub Category Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addSubCategory" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Category Name</th>
                                <th class="border-bottom-0">Sub Category Name</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $key => $sub_category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$sub_category->category->name}}</td>
                                    <td>{{$sub_category->name}}</td>
                                    <td>{{ substr($sub_category->description,0,50) }}</td>
                                    <td><img src="{{asset($sub_category->image)}}" alt="" height="40" width="60"/></td>
                                    <td>{{$sub_category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('sub-category.edit', $sub_category->id)}}" data-bs-toggle="modal" data-bs-target="#editSubCategory{{$key}}" class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if($sub_category->status ==1 )
                                            <a href="{{ route('sub-category.show',$sub_category->id ) }}" class="btn btn-warning btn-sm float-start m-1" > <i class="fa fa-lock"></i></a>
                                        @else
                                            <a href="{{ route('sub-category.show',$sub_category->id ) }}" class="btn btn-blue btn-sm float-start m-1" > <i class="fa fa-unlock"></i></a>
                                        @endif
                                        <form action="{{ route('sub-category.destroy',$sub_category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1"
                                                    onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editSubCategory{{$key}}">
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
                                                        <h3 class="card-title">Edit Sub Category Form</h3>
                                                    </div>
                                                    <div class="card-body">
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
                                                                    <select class="form-control" name="status" id="">
                                                                        <option value="1" {{$sub_category->status == 1 ? 'selected' : ''}} >Published</option>
                                                                        <option value="0" {{$sub_category->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-primary rounded-0 float-end" type="submit">Update Sub Category Info</button>
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
                            {{ $sub_categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSubCategory">
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
                            <h3 class="card-title">Add Sub Category Form</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('sub-category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label for="" class="col md-3 form-label">Category Name <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select name="category_id" id="" class="form-control" required>
                                            <option value="" disabled selected> -- Select Category --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"> {{$category->name}} </option>
                                            @endforeach
                                        </select>
                                        <span
                                            class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Sub Category Name <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Sub Category Name" type="text" required/>
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="description" class="col-md-3 form-label">Sub Category Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" id="description" placeholder="Sub Category Description" ></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="imgInp" class="col-md-3 form-label">Sub Category Image</label>
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

                                <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Sub Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

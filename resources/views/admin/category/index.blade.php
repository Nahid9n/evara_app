@extends('admin.master')
@section('title','Manage Category Page')
@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">All Category Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addCategory" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>sl</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($adminCategories as $key => $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ substr($category->description,0,50) }}</td>
                                    <td><img src="{{ asset($category->image) }}" alt="" style="height: 50px ; width: 50px "></td>
                                    <td>{{ $category->status ==1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('category.edit',$category->id) }}"  data-bs-toggle="modal" data-bs-target="#editCategory{{$key}}"  class="btn btn-primary btn-sm float-start m-1 ">Edit</a>
                                        @if($category->status ==1 )
                                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-warning btn-sm float-start m-1 ">Inactive</a>
                                        @else
                                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-success btn-sm float-start m-1 ">Active</a>
                                        @endif
                                        <form action="{{ route('category.destroy',$category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editCategory{{$key}}">
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
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $adminCategories->links() }}
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
                            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="category name" required>
                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Category Description </label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="5"  placeholder="category description"></textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Category Image </label>
                                    <input type="file" id="imgInp" name="image" class="form-control">
                                    <img src="" alt="" id="categoryImage" >
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Publication Status</label>
                                    <select class="form-control" name="status" id="">
                                        <option value="1" selected>Published</option>
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

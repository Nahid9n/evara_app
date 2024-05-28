@extends('admin.master')
@section('title','Add User Page')
@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add User Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">User Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="User Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">User Email Address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="email" id="email" placeholder="User Email" type="email"/>
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">User Password</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="password" id="password" placeholder="User password" type="password"/>
                                <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Mobile Number</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="mobile" id="mobile" placeholder="User mobile" type="number"/>
                                <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Select Role</label>
                            <div class="col-md-9">

                                <select class="form-control" name="role" required>
                                    <option value="" disabled selected> --Select Role -- </option>
                                    <option value="1" >Admin</option>
                                    <option value="2" >Manager</option>
                                    <option value="3" >Executive</option>
                                </select>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">User Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image"  type="file"/>
                                <img src="" id="categoryImage" alt="" />
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New User</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

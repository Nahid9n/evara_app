@extends('admin.master')
@section('title','Page Management')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Pages</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pages</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('admin.page.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Page Name <sup class="text-danger">*</sup></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{old('name')}}" name="name" placeholder="Enter your page name" type="text">
                                <span class="text-danger">{{$errors->has('title') ? $errors->first('title'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Content</label>
                            <div class="col-md-9">
                                <textarea class="form-control summernote" name="contents" id="" placeholder="write content"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="serial" class="col-md-3 form-label">Serial</label>
                            <div class="col-md-9">
                                <input class="form-control" id="serial" value="{{old('serial')}}" name="serial" min="0" placeholder="Serial number" type="number">
                                <span class="text-danger">{{$errors->has('serial') ? $errors->first('serial'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Create Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">Pages Table</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Serial</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $key => $page)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$page->name}}</td>
                                    <td>{{$page->serial}}</td>
                                    <td>{{$page->status == 1 ? 'active':'Inactive'}}</td>
                                    <td class="d-flex text-center justify-content-center">
                                        <a href="{{route('admin.page.show',$page->id)}}" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#showPage{{$key}}"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.page.edit',$page->id)}}" class="btn btn-success me-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('admin.page.destroy',$page->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger me-1 "><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="showPage{{$key}}">
                                    <div class="modal-dialog modal-dialog-centered modal-xl task-view-modal" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header p-5">
                                                <h4 class="fw-bold">Serial : {{$page->serial}}</h4>
                                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row row-deck mt-5">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="text-end">
                                                                <a href="{{route('admin.page.index')}}" class="btn btn-success my-1 mx-2 float-end text-center">All Pages</a>
                                                                <a href="{{route('admin.page.edit',$page->id)}}" class="btn btn-warning my-1 mx-2 float-end text-dark text-center">Edit Page</a>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="">
                                                                    <h3 class="fw-bold text-center">{{$page->name}}</h3>
                                                                    <hr>
                                                                    <p>{!! $page->contents !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{$pages->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row -->


@endsection

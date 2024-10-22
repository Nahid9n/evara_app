@extends('admin.master')
@section('title','Highlight Module')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All Highlight Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addHighlight" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Highlight Name</th>
                                <th class="border-bottom-0">Serial</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($highlights as $key => $highlight)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$highlight->name}}</td>
                                    <td>{{$highlight->serial}}</td>
                                    <td>{{$highlight->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#editHighlight{{$key}}"   class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.highlight.destroy',$highlight->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editHighlight{{$key}}">
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
                                                        <h3 class="card-title">Edit Highlight Form</h3>
                                                    </div>
                                                    <div class="card-body">

                                                        <form class="form-horizontal" action="{{ route('admin.highlight.update',$highlight->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-4">
                                                                <label for="name"  class="col-md-3 form-label">Name <span class="text-danger">*</span></label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $highlight->name }}" name="name" id="name" placeholder="Highlight Name" type="text" required/>
                                                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="name"  class="col-md-3 form-label">Serial</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $highlight->serial }}" name="serial" id="serial" placeholder="serial number" type="number"/>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label class="col-md-3 form-label">Publication Status</label>
                                                                <div class="col-md-9 pt-3">
                                                                    <select class="form-control" name="status" id="">
                                                                        <option value="1" {{$highlight->status == 1 ? 'selected' : ''}} >Published</option>
                                                                        <option value="0" {{$highlight->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-primary rounded-0 float-end" type="submit">Update Highlight Info</button>
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
    <div class="modal fade" id="addHighlight">
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
                            <h3 class="card-title">Add Highlight Form</h3>
                        </div>
                        <div class="card-body">

                            <form class="form-horizontal" action="{{ route('admin.highlight.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label for="nameEdit"  class="col-md-3 form-label"> Name  <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('name') }}" name="name" id="nameAdd" placeholder="Highlight Name" type="text" required/>
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Serial</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('serial') }}" name="serial" id="serialAdd" placeholder="Serial Number" type="number"/>
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

                                <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Highlight</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('admin.master')
@section('title','Manage Tag')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All Tag Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addTag" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Tag Name</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $key=>$tag)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#editTag{{$key}}" class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.tag.destroy',$tag->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editTag{{$key}}">
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
                                                        <h3 class="card-title">Add Tag Form</h3>
                                                    </div>
                                                    <div class="card-body">

                                                        <form class="form-horizontal" action="{{ route('admin.tag.update',$tag->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-4">
                                                                <label for="name"  class="col-md-3 form-label">Tag Name <span class="text-danger">*</span></label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control tag_name" value="{{ $tag->name }}" name="name" id="name" placeholder="Tag Name" type="text"/>
                                                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="slugEdit"  class="col-md-3 form-label">Tag Code</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control slug" value="{{ $tag->slug }}" name="slug" id="slugEdit" placeholder="Tag Code" type="text"/>
                                                                    <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label class="col-md-3 form-label">Publication Status</label>
                                                                <div class="col-md-9 pt-3">
                                                                    <select class="form-control" name="status" id="">
                                                                        <option value="1" {{$tag->status == 1 ? 'selected' : ''}} >Published</option>
                                                                        <option value="0" {{$tag->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary rounded-0 float-end" type="submit">Update Tag Info</button>
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
    <div class="modal fade" id="addTag">
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
                            <h3 class="card-title">Add Tag Form</h3>
                        </div>
                        <div class="card-body">

                            <form class="form-horizontal" action="{{ route('admin.tag.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Tag Name <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control tag_name" value="{{ old('name') }}" name="name" id="name" placeholder="Tag Name" type="text" required/>
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="slug" class="col-md-3 form-label">Tag Slug</label>
                                    <div class="col-md-9">
                                        <input class="form-control slug" value="{{ old('slug') }}" name="slug" id="slug" placeholder="slug" type="text"/>
                                        <span class="text-danger">{{$errors->has('slug') ? $errors->first('slug') : ''}}</span>
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

                                <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Tag</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.tag_name').on('input', function() {
                var tagName = $(this).val();
                var slug = generateSlug(tagName);
                $('.slug').val(slug);
            });

            function generateSlug(str) {
                return str
                    .toString()
                    .toLowerCase()
                    .trim()
                    .replace(/[\s\W-]+/g, '-') // Replace spaces and special characters with '-'
                    .replace(/^-+|-+$/g, ''); // Remove leading/trailing dashes
            }
        });
    </script>
@endpush

@extends('admin.master')
@section('title','Manage News Header')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All News Header Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addNews" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">News</th>
                                <th class="border-bottom-0">Url</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newsHeaders as $key => $newsHeader)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$newsHeader->news}}</td>
                                    <td>{{$newsHeader->url}}</td>
                                    <td>{{$newsHeader->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('admin.news.edit', $newsHeader->id)}}" data-bs-toggle="modal" data-bs-target="#editnewsHeader{{$key}}"   class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.news.destroy',$newsHeader->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editnewsHeader{{$key}}">
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
                                                        <h3 class="card-title">Edit newsHeader Form</h3>
                                                    </div>
                                                    <div class="card-body">

                                                        <form class="form-horizontal" action="{{ route('admin.news.update',$newsHeader->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-4">
                                                                <label for="newsEdit"  class="col-md-3 form-label">News Header Name  <span class="text-danger">*</span></label>
                                                                <div class="col-md-9">
                                                                    <textarea class="form-control" name="news" id="newsEdit" cols="30" rows="4">{{ $newsHeader->news }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="urlEdit"  class="col-md-3 form-label">Url</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $newsHeader->url }}" name="url" id="urlEdit" type="url"/>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label class="col-md-3 form-label">Publication Status</label>
                                                                <div class="col-md-9 pt-3">
                                                                    <select class="form-control" name="status" id="">
                                                                        <option value="1" {{$newsHeader->status == 1 ? 'selected' : ''}} >Published</option>
                                                                        <option value="0" {{$newsHeader->status == 0 ? 'selected' : ''}}>Unpublished</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-primary rounded-0 float-end" type="submit">Update newsHeader Info</button>
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
    <div class="modal fade" id="addNews">
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
                            <h3 class="card-title">Add newsHeader Form</h3>
                        </div>
                        <div class="card-body">

                            <form class="form-horizontal" action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">News Header Name  <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="news" id="news" cols="30" rows="4">{{ old('news') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Url</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('Url') }}" name="Url" id="Url" placeholder="News Header Url" type="url"/>
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
                                <button class="btn btn-primary rounded-0 float-end" type="submit">Create New News Header</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


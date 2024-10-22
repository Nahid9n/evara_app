@extends('admin.master')
@section('title','Edit Page')
@section('body')
    <!-- row -->
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="text-end">
                    <a href="{{route('admin.page.index')}}" class="btn btn-success my-1 mx-2 float-end text-center">All Pages</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('admin.page.update',$page->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Page Name <sup class="text-danger">*</sup></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{$page->name}}" name="name" placeholder="Enter your page name" type="text">
                                <span class="text-danger">{{$errors->has('title') ? $errors->first('title'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Content</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="contents" id="summernote" placeholder="write content">
                                    {!! $page->contents !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="serial" class="col-md-3 form-label">Serial</label>
                            <div class="col-md-9">
                                <input class="form-control" id="serial" value="{{ $page->serial }}" name="serial" min="0" placeholder="Serial number" type="number">
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
                                    <option {{$page->status == 1 ? 'selected':''}} value="1">Active</option>
                                    <option {{$page->status == 0 ? 'selected':''}} value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">update Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection

@extends('admin.master')
@section('title','Setting About Us')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">About Us Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">About Us Module</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage About Us</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <div class="">
                        <h6 class="mb-0 text-uppercase">About Us Form</h6>
                        <hr/>
                        <form action="{{ route('about-us-form.update',$aboutUs->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="summernote" class="form-label">About Us</label>
                                <textarea class="form-control summernote" id="summernote"  name="description"  placeholder="Write here">{{ $aboutUs->description }}</textarea>
{{--                                <textarea class="form-control" id="summernote"  name="description"  placeholder="Write here"></textarea>--}}

                            </div>
                            <div class="col-12">
                                <label class="form-label">Publication Status</label>

{{--                                <label for=""><input type="radio" value="1"  name="status"><span> Published </span></label>--}}
{{--                                <label for=""><input type="radio" value="0"  name="status"><span> Unpublished </span></label>--}}

                                <label for=""><input type="radio" value="1" {{ $aboutUs->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" {{ $aboutUs->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>

                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success m-1">Update About Us</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



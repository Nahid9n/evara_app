@extends('admin.master')
@section('title','Setting Purchase Guide')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Purchase Guide Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">>Purchase Guide Module</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage >Purchase Guide</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card mt-5">
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Purchase Guide Form</h6>
                        <hr/>

{{--                        <form action="{{ route('purchase-guide-form.store') }}" method="post" enctype="multipart/form-data">--}}
                        <form action="{{ route('purchase-guide-form.update', $purchaseGuide->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="summernote" class="form-label">Purchase Guide</label>
                                <textarea class="form-control" id="summernote"  name="description"  placeholder="Write here the guide">{!! $purchaseGuide->description !!}</textarea>
{{--                                <textarea class="form-control" id="summernote"  name="description"  placeholder="Write here the guide"></textarea>--}}

                            </div>
                            <div class="col-12">
                                <label class="form-label">Publication Status</label>
                                {{--
                                <label for=""><input type="radio" value="1"  name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0"  name="status"><span> Unpublished </span></label>
                                --}}
                                <label for=""><input type="radio" value="1" {{ $purchaseGuide->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                <label for=""><input type="radio" value="0" {{ $purchaseGuide->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>

                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success m-1">Update Purchase Guide</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


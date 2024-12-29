@extends('admin.master')
@section('title','Popup Manage')
@section('body')
    <style>
        .image-field {
            display: none;
        }
    </style>
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All Popup Info</h3>
                    <a class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addPopup" href="">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Type</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($popups as $key => $popup)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$popup->title}}</td>
                                    <td>{{$popup->popup_type}}</td>
                                    <td>
                                        @if($popup->popup_image)
                                        <img src="{{asset($popup->popup_image)}}" style="width: 150px; height: auto" alt="">
                                        @endif
                                        @if($popup->short_popup_image)
                                        <img src="{{asset($popup->short_popup_image)}}" style="width: 150px; height: auto" alt="">
                                        @endif

                                    </td>

                                    <td>{{$popup->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    {{--                                    <td class="d-flex">--}}
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editPopup{{$key}}"   class="btn btn-success btn-sm float-start m-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('admin.popup.destroy',$popup->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editPopup{{$key}}">
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
                                                        <h3 class="card-title">Edit Popup Form</h3>
                                                    </div>
                                                    <div class="card-body">

                                                        <form class="form-horizontal" action="{{ route('admin.popup.update',$popup->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-4">
                                                                <label for="name"  class="col-md-3 form-label">Popup Type  <span class="text-danger">*</span></label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control popup-type" name="popup_type" id="" aria-label="">
                                                                        <option value="">--Select--</option>
                                                                        <option {{ $popup->popup_type == 'popup' ? 'selected':'' }} value="popup">Popup</option>
                                                                        <option {{ $popup->popup_type == 'short_popup' ? 'selected':'' }} value="short_popup">Short Popup</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="image-field option-popup-image">
                                                                <div class="row mb-4">
                                                                    <label for="popup_image" class="col-md-3 form-label">Popup Image</label>
                                                                    <div class="col-md-9">
                                                                        <input type="file" class="form-control popup-image" name="popup_image" accept="image/*">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="image-field short-popup-image">
                                                                <div class="row mb-4">
                                                                    <label for="short_popup_image" class="col-md-3 form-label">Short Popup Image </label>
                                                                    <div class="col-md-9">
                                                                        <input type="file" class="form-control short-popup-image-field" name="short_popup_image" accept="image/*">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="short_popup_image" class="col-md-3 form-label"></label>
                                                                <div class="col-md-9">
                                                                    @if($popup->popup_image)
                                                                        <img src="{{asset($popup->popup_image)}}" style="width: 150px; height: auto" alt="">
                                                                    @endif
                                                                    @if($popup->short_popup_image)
                                                                        <img src="{{asset($popup->short_popup_image)}}" style="width: 150px; height: auto" alt="">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="title" class="col-md-3 form-label">Popup Title</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $popup->title }}" name="title" id="title" placeholder="Popup Title" type="text"/>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="description" class="col-md-3 form-label">Popup Description</label>
                                                                <div class="col-md-9">
                                                                    <textarea class="form-control" rows="4" name="description" id="description" placeholder="Popup Description" >{{ $popup->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="url"  class="col-md-3 form-label">Popup Url</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $popup->url }}" name="url" id="url" placeholder="Popup Url" type="url"/>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="duration"  class="col-md-3 form-label">Duration (In sec)</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" value="{{ $popup->duration }}" name="duration" id="duration" placeholder="Popup Duration" type="number"/>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label class="col-md-3 form-label">Status</label>
                                                                <div class="col-md-9 pt-3">
                                                                    <select class="form-control" name="status" id="">
                                                                        <option {{ $popup->status == 1 ? 'selected':'' }} value="1">Published</option>
                                                                        <option {{ $popup->status == 0 ? 'selected':'' }} value="0">Unpublished</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary rounded-0 float-end" type="submit">Update Popup Info</button>
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
    <div class="modal fade" id="addPopup">
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
                            <h3 class="card-title">Add Popup Form</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.popup.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name"  class="col-md-3 form-label">Popup Type  <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control popup-type" name="popup_type" id="" aria-label="">
                                            <option value="">--Select--</option>
                                            <option {{ old('popup_type') == 'popup' ? 'selected':'' }} value="popup">Popup</option>
                                            <option {{ old('popup_type') == 'short_popup' ? 'selected':'' }} value="short_popup">Short Popup</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="image-field option-popup-image">
                                    <div class="row mb-4">
                                        <label for="popup_image" class="col-md-3 form-label">Popup Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control popup-image" name="popup_image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="image-field short-popup-image">
                                    <div class="row mb-4">
                                        <label for="short_popup_image" class="col-md-3 form-label">Short Popup Image </label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control short-popup-image-field" name="short_popup_image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="title"  class="col-md-3 form-label">Popup Title</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('title') }}" name="title" id="title" placeholder="Popup Title" type="text"/>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="description" class="col-md-3 form-label">Popup Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="4" name="description" id="description" placeholder="Popup Description" ></textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="url"  class="col-md-3 form-label">Popup Url</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('url') }}" name="url" id="url" placeholder="Popup Url" type="url"/>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="duration"  class="col-md-3 form-label">Duration (In sec)</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('duration') }}" name="duration" id="duration" placeholder="Popup Duration" type="number"/>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Status</label>
                                    <div class="col-md-9 pt-3">
                                        <select class="form-control" name="status" id="">
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Popup</button>
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
            // Trigger on change of select option
            $('.popup-type').change(function() {
                var popupType = $(this).val();
                $('.image-field').hide();
                if (popupType === 'popup') {
                    $('.option-popup-image').show();
                } else if (popupType === 'short_popup') {
                    $('.short-popup-image').show();
                }
            });
        });
    </script>
@endpush

@extends('admin.master')
@section('title','Configure')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Setting Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Setting</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="example">
                <div class="d-sm-flex">
                    <div class="panel panel-primary tabs-style-4">
                        <div class="tab-menu-heading border br-5 me-3 my-2">
                            <div class="tabs-menu">
                                <ul class="nav panel-tabs flex-column">
                                    <li><a href="#tab1" class="active text-default vertical-tabs mb-2" data-bs-toggle="tab">Company Setting</a></li>
                                    <li><a href="#tab2" class="text-default vertical-tabs mb-2" data-bs-toggle="tab">About Us</a></li>
                                    <li><a href="#tab3" class="text-default vertical-tabs mb-2" data-bs-toggle="tab"> Contact Us</a></li>
                                    <li><a href="#tab4" class="text-default vertical-tabs mb-2" data-bs-toggle="tab"> Header Setting</a></li>
                                    <li><a href="#tab5" class="text-default vertical-tabs mb-2" data-bs-toggle="tab"> Footer Setting</a></li>
                                    <li><a href="#tab6" class="text-default vertical-tabs mb-2" data-bs-toggle="tab"> SEO Setting</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs-style-4 flex-2 border br-5">
                        <div class="panel-body tabs-menu-body border-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <form class="form-horizontal" action="{{ route('setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="mb-3 mt-3">
                                                    <label for="company_name" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="company_name" value="{{$setting->company_name}}" placeholder="Company Name" name="company_name">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="slogan" class="form-label">Company Slogan</label>
                                                    <input type="text" class="form-control" id="slogan" value="{{$setting->slogan}}" placeholder="Company Slogan" name="slogan">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="support_phone" class="form-label">Support Phone</label>
                                                    <input type="number" class="form-control" id="support_phone" value="{{$setting->support_phone}}" placeholder="Support Phone" name="support_phone">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="contact_email" class="form-label">Contact Email</label>
                                                    <input type="email" class="form-control" id="contact_email" value="{{$setting->contact_email}}" placeholder="Contact Email" name="contact_email">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="support_email" class="form-label">Support Email</label>
                                                    <input type="email" class="form-control" id="support_email" value="{{$setting->support_email}}" placeholder="Support Email" name="support_email">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="office_hour" class="form-label">Office Hour</label>
                                                    <input type="text" class="form-control" id="office_hour" value="{{$setting->office_hour}}" placeholder="Office Hour" name="office_hour">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="facebook_link" class="form-label">Facebook Link</label>
                                                        <input class="form-control" value="{{ $setting->facebook_link }}" name="facebook_link" id="facebook_link" placeholder="Company Facebook Link" type="url"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="twitter_link" class="form-label">Twitter Link</label>
                                                        <input class="form-control" value="{{ $setting->twitter_link }}" name="twitter_link" id="twitter_link" placeholder="Company Twitter Link" type="url"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="linkedin_link" class="form-label">LinkedIn Link</label>
                                                        <input class="form-control" value="{{ $setting->linkedin_link }}" name="linkedin_link" id="linkedin_link" placeholder="Company Linkedin Link" type="url"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="youtube_link" class="form-label">Youtube Link</label>
                                                        <input class="form-control" value="{{ $setting->youtube_link }}" name="youtube_link" id="youtube_link" placeholder="Company Youtube Link" type="url"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="instagram_link" class="form-label">Instagram Link</label>
                                                        <input class="form-control" value="{{ $setting->instagram_link }}" name="instagram_link" id="instagram_link" placeholder="Company Instagram Link" type="url"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="office_hour" class="form-label">Google Map Api Link</label>
                                                    <textarea class="form-control"  name="google_map_api_link"  placeholder="Google Map Api Link" type="text"> {{$setting->google_map_api_link}}</textarea>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="android_app_image" class="form-label">Android App Image </label>
                                                    <input type="file" class="dropify" id="android_app_image" name="android_app_image"  data-height="200" />
                                                    <img src="{{ asset($setting->android_app_image) }}" alt="" height="150"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="android_app_url" class="form-label">Android App Url Link</label>
                                                    <input class="form-control" value="{{ $setting->android_app_url }}" name="android_app_url" id="android_app_url" placeholder="Android App Url Link" type="url"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="ios_app_image" class="form-label">Ios App Image </label>
                                                    <input type="file" class="dropify" id="ios_app_image" name="ios_app_image"  data-height="200" />
                                                    <img src="{{ asset($setting->ios_app_image) }}" alt="" height="150"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="ios_app_url" class="form-label">Ios App Url Link</label>
                                                    <input class="form-control" value="{{ $setting->ios_app_url }}" name="ios_app_url" id="ios_app_url" placeholder="Ios App Url Link" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="company_title" class="form-label">Company Title</label>
                                                    <input type="text" class="form-control" id="company_title" value="{{$setting->title}}" placeholder="Company Title" name="title">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="hotline" class="form-label">Hotline</label>
                                                    <input type="number" class="form-control" id="hotline" value="{{$setting->hotline}}" placeholder="Hotline" name="hotline">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Address" class="form-label">Address</label>
                                                    <textarea class="form-control" name="address" id="Address" placeholder="Address" cols="30" rows="3"> {{$setting->address}}</textarea>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="companyAddress" class="form-label">Company Address</label>
                                                    <textarea class="form-control" name="company_address" id="companyAddress" placeholder="Company Address">{{ $setting->company_address }}</textarea>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="logo_jpg" class="form-label">Logo Jpg </label>
                                                    <input type="file" class="dropify" id="logo_jpg" name="logo_jpg"  data-height="200" />
                                                    <img src="{{ asset($setting->logo_jpg) }}" alt="" height="150"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="logo_png" class="form-label">Logo Png </label>
                                                    <input type="file" class="dropify" id="logo_png" name="logo_png"  data-height="200" />
                                                    <img src="{{ asset($setting->logo_png) }}" alt="" height="150"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="favicon" class="form-label">Logo Favicon </label>
                                                    <input type="file" class="dropify" id="favicon" name="favicon"  data-height="200" />
                                                    <img src="{{ asset($setting->favicon) }}" alt="" height="150"/>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="payment_method_image" class="form-label">Payment Method Image</label>
                                                    <input type="file" class="dropify" id="payment_method_image" name="payment_method_image"  data-height="200" />
                                                    <img src="{{ asset($setting->payment_method_image) }}" alt="" height="150"/>
                                                </div>
                                            </div>
                                        </div>


                                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update Information</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <h6 class="mb-0 text-uppercase">About Us Form</h6>
                                    <hr/>
                                    <form action="{{ route('about-us-form.update',$aboutUs->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <label for="summernote" class="form-label">About Us</label>
                                            <textarea class="form-control summernote" id=""  name="description"  placeholder="Write here">{{ $aboutUs->description }}</textarea>

                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Publication Status</label>
                                            <label for=""><input type="radio" value="1" {{ $aboutUs->status == 1 ? 'checked' : '' }} name="status"><span> Active </span></label>
                                            <label for=""><input type="radio" value="0" {{ $aboutUs->status == 0 ? 'checked' : '' }} name="status"><span> Inactive </span></label>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success m-1">Update About Us</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <h6 class="mb-0 text-uppercase">Contact Us Form</h6>
                                    <hr/>
                                    <form action="{{ route('contact-us-form.update',$contactUs->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <label for="" class="form-label">Contact Us</label>
                                            <textarea class="form-control summernote" id=""  name="description"  placeholder="Write here">{{ $contactUs->description }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Publication Status</label>
                                            <label for=""><input type="radio" value="1" {{ $contactUs->status == 1 ? 'checked' : '' }} name="status"><span> Published </span></label>
                                            <label for=""><input type="radio" value="0" {{ $contactUs->status == 0 ? 'checked' : '' }} name="status"><span> Unpublished </span></label>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success m-1">Update About Us</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab4">
                                    <h6 class="mb-0 text-uppercase">Header Setting</h6>
                                    <hr/>
                                    <form action="{{--{{ route('about-us-form.update',$aboutUs->id) }}--}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="col-12">
                                            <label class="form-label">Publication Status</label>
                                            <label for=""><input type="radio" value="1" {{--{{ $aboutUs->status == 1 ? 'checked' : '' }}--}} name="status"><span> Active </span></label>
                                            <label for=""><input type="radio" value="0" {{--{{ $aboutUs->status == 0 ? 'checked' : '' }}--}} name="status"><span> Inactive </span></label>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success m-1">Update About Us</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <h6 class="mb-0 text-uppercase">Footer Setting</h6>
                                    <hr/>
                                    <form action="{{--{{ route('about-us-form.update',$aboutUs->id) }}--}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="col-12">
                                            <label class="form-label">Publication Status</label>
                                            <label for=""><input type="radio" value="1" {{--{{ $aboutUs->status == 1 ? 'checked' : '' }}--}} name="status"><span> Active </span></label>
                                            <label for=""><input type="radio" value="0" {{--{{ $aboutUs->status == 0 ? 'checked' : '' }}--}} name="status"><span> Inactive </span></label>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success m-1">Update About Us</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane" id="tab6">
                                    <h6 class="mb-0 text-uppercase">SEO Setting</h6>
                                    <hr/>
                                    <form action="{{--{{ route('about-us-form.update',$aboutUs->id) }}--}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="col-12">
                                            <label class="form-label">Publication Status</label>
                                            <label for=""><input type="radio" value="1" {{--{{ $aboutUs->status == 1 ? 'checked' : '' }}--}} name="status"><span> Active </span></label>
                                            <label for=""><input type="radio" value="0" {{--{{ $aboutUs->status == 0 ? 'checked' : '' }}--}} name="status"><span> Inactive </span></label>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success m-1">Update About Us</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane" id="tab7">
                                    <p>Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum delenitiof pleasure of the moment, so blinded by desire quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                    <p>Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum deleniti of pleasure of the moment, so blinded by desire quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                    <p class="mb-0">Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum deleniti facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus </p>
                                </div>
                                <div class="tab-pane" id="tab8">
                                    <p>Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum delenitiof pleasure of the moment, so blinded by desire quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                    <p>Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum deleniti of pleasure of the moment, so blinded by desire quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                    <p class="mb-0">Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum deleniti facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

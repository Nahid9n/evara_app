@extends('admin.master')
@section('title','Website Setting')
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
                                            {{--<li><a href="#tab4" class="text-default vertical-tabs" data-bs-toggle="tab"> Manage Return Policy</a></li>
                                            <li><a href="#tab5" class="text-default vertical-tabs" data-bs-toggle="tab"> Manage Privacy Policy</a></li>
                                            <li><a href="#tab6" class="text-default vertical-tabs" data-bs-toggle="tab"> Manage About Us</a></li>
                                            <li><a href="#tab7" class="text-default vertical-tabs" data-bs-toggle="tab"> Manage Contact Us</a></li>
                                            <li><a href="#tab8" class="text-default vertical-tabs" data-bs-toggle="tab"> Manage Terms & Condition</a></li>--}}
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
                                                <div class="row mb-4">
                                                    <label for="name"  class="col-md-3 form-label">Company Name</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->company_name }}" name="company_name" id="name" placeholder="Company Name" type="text"/>
                                                        <span class="text-danger">{{$errors->has('company_name') ? $errors->first('company_name') : ''}}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="companySlogan" class="col-md-3 form-label">Company Slogan</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->slogan }}" name="slogan" id="companySlogan" placeholder="Company slogan" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="companyTitle" class="col-md-3 form-label">Company Title</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->title }}" name="title" id="companyTitle" placeholder="Company Title" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="contact_phone" class="col-md-3 form-label">Contact Phone</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->contact_phone }}" name="contact_phone" id="contact_phone" placeholder="Company contact_phone" type="number"/>

                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="support_phone" class="col-md-3 form-label">Support Phone</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->support_phone }}" name="support_phone" id="support_phone" placeholder="Company support_phone" type="number"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="contact_email" class="col-md-3 form-label">Contact Email</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->contact_email }}" name="contact_email" id="contact_email" placeholder="Company contact_email" type="email"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="support_email" class="col-md-3 form-label">Support Email</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->support_email }}" name="support_email" id="support_email" placeholder="Company support_email" type="email"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="office_hour" class="col-md-3 form-label">Office Hour </label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->office_hour }}" name="office_hour" id="office_hour" placeholder="Company office_hour" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="facebook_link" class="col-md-3 form-label">Facebook Link</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->facebook_link }}" name="facebook_link" id="facebook_link" placeholder="Company facebook_link" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="twitter_link" class="col-md-3 form-label">Twitter Link</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->twitter_link }}" name="twitter_link" id="twitter_link" placeholder="Company twitter_link" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="linkedin_link" class="col-md-3 form-label">LinkedIn Link</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->linkedin_link }}" name="linkedin_link" id="linkedin_link" placeholder="Company linkedin_link" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="youtube_link" class="col-md-3 form-label">Youtube Link</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->youtube_link }}" name="youtube_link" id="youtube_link" placeholder="Company youtube_link" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="instagram_link" class="col-md-3 form-label">Instagram Link</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->instagram_link }}" name="instagram_link" id="instagram_link" placeholder="Company Instagram link" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="google_map_api_link" class="col-md-3 form-label">Google Map Api Link</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control"  name="google_map_api_link"  placeholder="Google Map Api Link" type="text">{{ $setting->google_map_api_link }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="android_app_image" class="col-md-3 form-label">Android App Image </label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="dropify" id="android_app_image" name="android_app_image"  data-height="200" />
                                                        <img src="{{ asset($setting->android_app_image) }}" alt="" height="150"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="android_app_url" class="col-md-3 form-label">Android App Url Link</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->android_app_url }}" name="android_app_url" id="android_app_url" placeholder="Android App Url Link" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="ios_app_image" class="col-md-3 form-label">Ios App Image </label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="dropify" id="ios_app_image" name="ios_app_image"  data-height="200" />
                                                        <img src="{{ asset($setting->ios_app_image) }}" alt="" height="150"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="ios_app_url" class="col-md-3 form-label">Ios App Url Link</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" value="{{ $setting->ios_app_url }}" name="ios_app_url" id="ios_app_url" placeholder="Ios App Url Link" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="companyAddress" class="col-md-3 form-label">Company Address</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="company_address" id="companyAddress" placeholder="Company Address">{{ $setting->company_address }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="logo_jpg" class="col-md-3 form-label">Logo Jpg </label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="dropify" id="logo_jpg" name="logo_jpg"  data-height="200" />
                                                        <img src="{{ asset($setting->logo_jpg) }}" alt="" height="150"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="logo_png" class="col-md-3 form-label">Logo Png </label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="dropify" id="logo_png" name="logo_png"  data-height="200" />
                                                        <img src="{{ asset($setting->logo_png) }}" alt="" height="150"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="favicon" class="col-md-3 form-label">Logo Favicon </label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="dropify" id="favicon" name="favicon"  data-height="200" />
                                                        <img src="{{ asset($setting->favicon) }}" alt="" height="150"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="payment_method_image" class="col-md-3 form-label">Payment Method Image</label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="dropify" id="payment_method_image" name="payment_method_image"  data-height="200" />
                                                        <img src="{{ asset($setting->payment_method_image) }}" alt="" height="150"/>
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
                                        {{--<div class="tab-pane" id="tab4">

                                        </div>
                                        <div class="tab-pane" id="tab5">

                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <p>Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum delenitiof pleasure of the moment, so blinded by desire quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                            <p>Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum deleniti of pleasure of the moment, so blinded by desire quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                            <p class="mb-0">Cupiditate non provident voluptatum deleniti atque corrupti quos dolores et quas praesentium voluptatum deleniti facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus </p>
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
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection

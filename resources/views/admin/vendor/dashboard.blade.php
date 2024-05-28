@extends('admin.master')
@section('title','Vendor Dashboard')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-xl-12 mx-auto">

        {{--<div class="card">
            <div class="card-body">
                <h1>My Profile</h1>
            </div>
        </div>--}}

        <!-- ROW-1 OPEN -->
            <div class="row" id="user-profile">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="profile-img-main rounded">
                                            <img src="{{ asset($vendor->image) }}" alt="img" class="m-0 p-1 rounded hrem-6">
                                        </div>
                                        <div class="ms-4">
                                            <h4>{{$vendor->name}}</h4>
                                            <p class="text-muted mb-2">Member Since: November 2020</p>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-rss"></i> Follow</a>
                                            <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-envelope"></i>{{$vendor->email}}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="border-top">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li><a href="#profileMain" class="active show" data-bs-toggle="tab">Profile</a></li>



                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="profileMain">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="p-5">
                                        <h3 class="card-title">Biodata</h3>
                                        <p class="text-dark-light">Hi I'm {{$vendor->name}},has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <div>
                                            <div>
                                                <h5 class="text-dark text-14 mb-0">Lead designer / Developer</h5>
                                                <a href="javascript:void(0)" class="text-primary">{{$vendor->email}}</a>
                                                <p class="mb-2 mt-3"><b>2010-2015</b></p>
                                                <p class="text-muted text-14">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            </div>

                                            <div>
                                                <h5 class="text-dark text-14 mb-0">Senior Graphic Designer</h5>
                                                <a href="javascript:void(0)" class="text-primary">samplewebsite.com</a>
                                                <p class="mb-2 mt-3"><b>2007-2009</b></p>
                                                <p class="text-muted text-14 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top"></div>
                                    <div class="table-responsive p-5">
                                        <h3 class="card-title">Personal Info</h3>
                                        <table class="table row table-borderless">
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Full Name :</strong> {{$vendor->name}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Location :</strong> {{$vendor->address}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date_of_birth :</strong> {{$vendor->date_of_birth}}</td>
                                            </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                                            <tr>
                                                <td><strong>Website :</strong> websitename.com</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email :</strong> {{$vendor->email}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone :</strong> {{$vendor->mobile}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="border-top"></div>
                                    <div class="p-5">
                                        <h3 class="card-title">Statistics</h3>
                                        <div class="profile-cover__info ms-4 ms-auto p-0">
                                            <ul class="nav p-0 border-bottom-0 mb-0">
                                                <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center my-1">
                                                    <span class="border-0 mb-0 pb-0 fs-21">113</span>
                                                    Projects
                                                </li>
                                                <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center mx-2 my-1">
                                                    <span class="border-0 mb-0 pb-0 fs-21">245</span>
                                                    Followers
                                                </li>
                                                <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center my-1">
                                                    <span class="border-0 mb-0 pb-0 fs-21">128</span>
                                                    Following
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="border-top"></div>
                                    <div class="p-5">
                                        <h3 class="card-title">Contact</h3>
                                        <div class="d-sm-flex">
                                            <div>
                                                <div class="main-profile-contact-list">
                                                    <div class="media mx-2">
                                                        <div class="media-icon bg-primary-transparent text-primary"> <i class="fe fe-phone fs-21"></i> </div>
                                                        <div class="media-body ms-1">
                                                            <span class="text-muted">Mobile</span>
                                                            <p class="mb-0">{{$vendor->mobile}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="main-profile-contact-list">
                                                    <div class="media mx-2">
                                                        <div class="media-icon bg-success-transparent text-success"> <i class="fe fe-slack fs-21"></i> </div>
                                                        <div class="media-body ms-2">
                                                            <span class="text-muted">Slack</span>
                                                            <p class="mb-0">{{$vendor->email}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="main-profile-contact-list">
                                                    <div class="media mx-2">
                                                        <div class="media-icon bg-info-transparent text-info"> <i class="fe fe-map-pin fs-21"></i> </div>
                                                        <div class="media-body ms-2">
                                                            <span class="text-muted">Current Address</span>
                                                            <p class="mb-0"> {{$vendor->district}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top"></div>
                                    <div class="p-5">
                                        <h3 class="card-title">Social</h3>
                                        <div class="d-md-flex">
                                            <div>
                                                <div class="main-profile-contact-list">
                                                    <div class="media mx-2">
                                                        <div class="media-icon bg-primary-transparent text-primary"> <i class="fe fe-github fs-21"></i> </div>
                                                        <div class="media-body ms-1">
                                                            <span class="text-muted">Github</span>
                                                            <p class="mb-0"> <a href="javascript:void(0)" class="text-default">github.com/spruko</a> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="main-profile-contact-list">
                                                    <div class="media mx-2">
                                                        <div class="media-icon bg-success-transparent text-success"> <i class="fe fe-twitter fs-21"></i> </div>
                                                        <div class="media-body ms-2">
                                                            <span class="text-muted">Twitter</span>
                                                            <p class="mb-0"> <a href="javascript:void(0)" class="text-default">twitter.com/spruko.me</a> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="main-profile-contact-list">
                                                    <div class="media mx-2">
                                                        <div class="media-icon bg-info-transparent text-info"> <i class="fe fe-linkedin fs-21"></i> </div>
                                                        <div class="media-body ms-2">
                                                            <span class="text-muted">Linkedin</span>
                                                            <p class="mb-0"> <a href="javascript:void(0)" class="text-default">linkedin.com/in/spruko</a> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div><!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->

        </div>
    </div>
@endsection

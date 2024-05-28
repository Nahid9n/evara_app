@extends('website.master')

@section('title','Vendor Profile')

@section('body')


    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span></span> Vendor
                <span></span> Profile
            </div>
        </div>
    </div>

    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('website.vendor.vendor-menu')
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <h2>My Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


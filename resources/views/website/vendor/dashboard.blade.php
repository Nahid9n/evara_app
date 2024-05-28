@extends('website.master')

@section('title','Vendor Dashboard')

@section('body')


    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span></span> Vendor
                <span></span> Dashboard
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
                        <h2>My Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

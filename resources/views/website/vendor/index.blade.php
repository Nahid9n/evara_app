@extends('website.master')

@section('title','Vendor Manage Product')

@section('body')


    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span></span> Vendor
                <span></span> Manage Product
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
                        <div class="row">
                            <div class="col">
                                <h4 class="float-start pt-3">All Product</h4>
                            </div>
                            <div class="col">
                                <a href="{{route('vendor-product.create')}}" class="btn btn-success float-end">Add New Product</a>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Stock Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>sdfd</td>
                                        <td>sdfd</td>
                                        <td>sdfd</td>
                                        <td>sdfd</td>
                                        <td>sdfd</td>
                                        <td>sdfd</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

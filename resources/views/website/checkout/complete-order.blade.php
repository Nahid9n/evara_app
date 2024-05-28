@extends('website.master')

@section('title', '')



@section('body')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index-2.html" rel="nofollow">Home</a>
                <span></span> Checkout
                <span></span> Complete Order
            </div>
        </div>
    </div>

{{--    <section class="mt-50 mb-50">--}}
    <section class="py-5 bg-secondary-light">

            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="card card-body">
                            <p class="text-success text-center">
                                {{session('message')}}
                            </p>
                        </div>

                    </div>

                </div>
            </div>

    </section>

@endsection

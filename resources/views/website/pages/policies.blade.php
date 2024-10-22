@extends('website.master')
@section('title', $page->name)
@section('body')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span></span> {{$page->name}}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container custom">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                        <div class="single-header  style-2">
                            <h2 class="text-center">{{$page->name}}</h2>
                            <hr>
                        </div>
                        <div class="">
                            {!! $page->contents !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


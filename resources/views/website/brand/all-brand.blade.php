@extends('website.master')
@section('title', 'Product Brand Page')
@section('body')
    <section class="mt-2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4 class="">ALL BRANDS</h4>
                        <hr>
                    </div>
                    <div class="row product-grid-3" id="filterProducts">
                        @foreach($brands as $key => $brand)
                            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                <div class="card-1 d-grid justify-content-center">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="{{route('product-brand',$brand->slug)}}">
                                            @if($brand->image != '')
                                                <img src="{{ asset($brand->image)}}" class="p-0" width="auto" height="70" alt="a" />
                                            @else
                                                <img src="{{asset('/')}}no_image.jpg" class="p-0" width="auto" height="70" alt="a" />
                                            @endif
                                        </a>
                                    </figure>
                                    <h5><a class="category_name" href="{{route('product-brand',$brand->slug)}}"><small>{{ $brand->name }}</small></a></h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



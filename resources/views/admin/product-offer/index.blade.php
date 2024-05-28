@extends('admin.master')

@section('title', 'Manage Product Offer')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Offer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product Offer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row row-sm">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Product Offer Table</h3>
                    <a href="{{route('product_offer.create')}}" class="btn btn-primary ms-auto rounded-0">Add New Product Offer</a>
                </div>
                <div class="card-body">
{{--                    @include('admin.notify')--}}
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="example3">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Sl No</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Title One</th>
                                <th scope="col">Title Two</th>
                                <th scope="col">Title Three</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($product_offers as $product_offer)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ isset($product_offer->product->name) ? $product_offer->product->name : ' ' }}</td>
                                    <td>{{ $product_offer->title_one }}</td>
                                    <td>{{ $product_offer->title_two }}</td>
                                    <td>{{ $product_offer->title_three }}</td>
                                    <td>{{ Str::limit($product_offer->description, 20) }}</td>
                                    <td>
                                        <img src="{{ asset($product_offer->image) }}" alt="" height="70"
                                             width="70">
                                    </td>
                                    <td>{{ $product_offer->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('product_offer.edit', $product_offer->id) }}"
                                               class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('product_offer.destroy', $product_offer->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you sure?')"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

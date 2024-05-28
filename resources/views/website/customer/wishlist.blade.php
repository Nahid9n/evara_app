@extends('website.master')

@section('title','Customer Wishlists ')

@section('body')


    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span></span> Pages
                <span></span> Wishlists
            </div>
        </div>
    </div>


    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center text-success">
                        {{ session('message') }}
                    </p>
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center">

                            <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Remove</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if (count($wishlists) > 0)
                            @foreach($wishlists as $wishListItem)
                            <tr>
                                <td class="image product-thumbnail"><img src="{{ asset($wishListItem->product->image) }}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h5 class="product-name"><a href="{{ route('product-detail',['id' => $wishListItem->product->id])}}">{{$wishListItem->product->name}}</a></h5>
                                    <p class="font-xs">{{ $wishListItem->product->short_description }}
                                    </p>
                                </td>
                                <td class="price" data-title="Price"><span>Tk.{{ $wishListItem->product->regular_price }} </span></td>
                                <td class="text-center" data-title="Stock">
                                    <span class="color3 font-weight-bold">In Stock: {{$wishListItem->product->stock_amount}}</span>
                                </td>
                                <td class="text-right" data-title="Cart">
                                    <a href="{{ route('product-detail',['id' => $wishListItem->product->id])}}" class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</a>
                                </td>
                                <td>
                                    <form action="{{ route('wishlist.destroy',$wishListItem->id) }}" method="post">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" data-title="Remove" class="btn btn-danger btn-sm bg-danger action" onclick="return confirm('Are you sure to delete?') ">
                                            <i class="fi-rs-trash"></i>
                                        </button>

                                    </form>

{{--
                                </td>

{{--                                class="action" data-title="Remove" --}}
{{--                                <td class="action" data-title="Remove"><a href="#"><i class="fi-rs-trash"></i></a></td>--}}
                            </tr>
                            @endforeach

                            </tbody>

                            @else

                                <h4 class="text-center text-success">No product available at wishlist.</h4>

                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


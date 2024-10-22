<div class="container">
    <div class="row product-grid-3" id="filterProducts">
        @foreach($products as $key => $product)
            <div class="col-lg-3 col-md-4 col-6 mb-2 g-4" style="border-radius: 20px; gap: 10px">
                <div class="product-cart-wrap mb-30 h-100" style="height: auto; border: 1px solid black">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="{{ route('product-detail',$product->slug) }}">
                                <img class="default-img" src="{{asset($product->image)}}" width="100" alt="">
                                <img class="hover-img" src="{{asset($product->back_image)}}" width="100" alt="">
                            </a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">25%</span>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-category">
                            <a href="{{route('product-category',$product->category->slug)}}">{{$product->category->name}}</a>
                        </div>
                        <h2><a href="{{ route('product-detail',$product->slug) }}">{{ truncateWords($product->name, 14) }}</a></h2>
                        <div class="product-price">
                            <span>{{$product->selling_price}} </span>
                            <span class="old-price">{{$product->regular_price}}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



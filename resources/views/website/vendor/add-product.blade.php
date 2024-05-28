@extends('website.master')

@section('title','Vendor Add Product')

@section('body')


    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span></span> Vendor
                <span></span> Add Product
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
                                <h4 class="float-start pt-3">Add Product</h4>
                            </div>
                            <div class="col">
                                <a href="{{route('vendor-product.index')}}" class="btn btn-success float-end">All Product</a>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col">
                                <h4>{{session('message')}}</h4>
                                <form action="{{route('vendor-product.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Category</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="category_id" onchange="setSubCategory(this.value)">
                                                <option value="" disabled selected> -- Select Product Category -- </option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Sub Category</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="sub_category_id" id="subCategoryId">
                                                <option value="" disabled selected> -- Select Product Sub Category -- </option>
                                                @foreach($sub_categories as $sub_category)
                                                    <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Brand</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="brand_id">
                                                <option value="" disabled selected> -- Select Product Brand -- </option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Unit</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="unit_id">
                                                <option value="" disabled selected> -- Select Product Unit -- </option>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Color</label>
                                        <div class="col-md-9">
                                            <select class="form-control js-example-basic-multiple" data-placeholder="Select Product Color" multiple name="color[]">
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Size</label>
                                        <div class="col-md-9">
                                            <select class="form-control js-example-basic-multiple" data-placeholder="Select Product Size" multiple name="size[]">
                                                @foreach($sizes as $size)
                                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="Product Name"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="code" placeholder="Product Code"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Short Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="short_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Long Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="long_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="image"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Other Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" multiple name="other_image[]"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Price</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="regular_price"/>
                                                <input type="number" class="form-control" name="selling_price"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Product Stock Amount</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="stock_amount"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9">
                                            <input type="submit" class="btn btn-success" value="Create New Product"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

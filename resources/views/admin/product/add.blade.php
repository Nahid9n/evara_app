@extends('admin.master')
@section('title','Add Product Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Product Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-7 border">
                                <div class="my-5">
                                    <h4 class="fw-bold my-4 text-center">GENERAL INFORMATION</h4>
                                    <hr>
                                    <div class="row d-flex form-group">
                                        <label for="name" class="col-md-3 form-label">Product Name <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="name" id="name1" required placeholder="Product Name">{{ old('name') }}</textarea>
                                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row d-flex mb-4 form-group">
                                        <label for="name"  class="col-md-3 form-label">Product Code <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9 input-group">
                                            <input class="form-control" value="{{ old('code') }}" name="code" id="sku" placeholder="Product Code" type="text"/>
                                            <button class="input-group-append btn btn-success" type="button" id="generate-sku-btn">Generate Code</button>
                                            <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row d-flex form-group">
                                        <label for="highlights"  class="col-md-3 form-label">Highlights</label>
                                        <div class="col-md-9 form-group">
                                            <select multiple name="highlights[]"  class="form-control select2 select2-show-search form-select" data-placeholder="Select Highlights" required >
                                                @foreach($highlights as $highlight)
                                                    <option value="{{$highlight->id}}"> {{$highlight->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row d-flex form-group">
                                        <label for="" class="col-md-3 form-label">Category Name  <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9">
                                            <select name="category_id" onchange="setSubCategory(this.value)" id="" class="form-control select2 select2-show-search form-select" required>
                                                <option value="" disabled selected> -- Select Category --</option>
                                                @foreach($categories as $category)
                                                    <option {{old('category_id') == $category->id ? 'selected':''}} value="{{$category->id}}"> {{$category->name}} </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row d-flex form-group">
                                        <label for="name"  class="col-md-3 form-label">Sub Category Name <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9">
                                            <select name="sub_category_id" id="subCategoryId" class="form-control select2 select2-show-search" required>
                                                <option value="" disabled selected> -- Select Sub Category --</option>
                                                @foreach($sub_categories as $sub_category)
                                                    <option {{old('sub_category_id') == $sub_category->id ? 'selected':''}} value="{{$sub_category->id}}"> {{$sub_category->name}} </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="text-danger">{{$errors->has('sub_category_id') ? $errors->first('sub_category_id') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row d-flex form-group">
                                        <label for="name"  class="col-md-3 form-label">Brand Name <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9">
                                            <select name="brand_id" id="" class="form-control select2 select2-show-search form-select" required>
                                                <option value="" disabled selected> -- Select Brand --</option>
                                                @foreach($brands as $brand)
                                                    <option {{old('brand_id') == $brand->id ? 'selected':''}} value="{{ $brand->id }}"> {{$brand->name}} </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row d-flex form-group">
                                        <label for="name"  class="col-md-3 form-label">Unit Name <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9">
                                            <select name="unit_id" id="" class="form-control select2 select2-show-search form-select" required>
                                                <option value="" disabled selected> -- Select Unit --</option>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}"> {{$unit->name}} </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row d-flex form-group">
                                        <label for="name"  class="col-md-3 form-label">Color Name <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9 form-group">
                                            <select multiple name="colors[]"  class="form-control select2 select2-show-search form-select" data-placeholder="Select Product Color" required >
                                                {{--                                    <option value="" disabled selected> -- Select Color --</option>--}}
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}"> {{$color->name}} </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="text-danger">{{$errors->has('color_id') ? $errors->first('color_id') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row d-flex form-group">
                                        <label for="name"  class="col-md-3 form-label">Size Name</label>
                                        <div class="col-md-9 form-group">
                                            <select multiple name="sizes[]"  class="form-control select2 select2-show-search form-select" data-placeholder="Select Product Size">
                                                {{--                                    <option value="" disabled selected> -- Select Color --</option>--}}
                                                @foreach($sizes as $size)
                                                    <option value="{{$size->id}}"> {{$size->name}} </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="text-danger">{{$errors->has('size_id') ? $errors->first('size_id') : ''}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <h4 class="fw-bold my-4 text-center">PRICING & STOCK INFORMATION</h4><hr>
                                </div>
                                <div class="row d-flex form-group">
                                    <label  class="col-md-3 form-label">Product Price <sup class="text-danger">*</sup></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input class="form-control"  name="regular_price" value="{{ old('regular_price') }}" placeholder="Regular Price" type="number" required/>
                                            <input class="form-control"  name="selling_price" value="{{ old('selling_price') }}" placeholder="Selling Price" type="number" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="mrp" class="col-md-3 form-label">MRP</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="mrp" value="{{ old('mrp') }}" name="mrp" placeholder="MRP" type="number"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="stockAmount" class="col-md-3 form-label">Stock Amount</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="stockAmount" value="{{ old('stock_amount') }}" name="stock_amount" placeholder="Stock Amount" type="number"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="alert_qty" class="col-md-3 form-label">Alert Quantity</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="alert_qty" value="{{ old('alert_qty') }}"  name="alert_qty" placeholder="Alert Quantity" type="number"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="max_order_qty" class="col-md-3 form-label">Max Order Quantity</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="max_order_qty" value="{{ old('max_order_qty') }}" name="max_order_qty" placeholder="Max Order Quantity" type="number"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="weight" class="col-md-3 form-label">weight <sub>(kg)</sub></label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="weight" value="{{ old('weight') }}" name="weight" placeholder="Weight" type="number"/>
                                    </div>
                                </div>

                                <div class="row d-flex form-group">
                                    <label for="vat" class="col-md-3 form-label">Vat</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="vat" value="{{ old('vat')}}" name="vat" placeholder="Vat" type="number"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label class="form-label col-md-3" for="free_delivery">Free Delivery</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2 select2-show-search form-select" data-placeholder="Select One" name="free_delivery">
                                            <option disabled selected>--Select One--</option>
                                            <option {{ old('free_delivery') == 1 ? 'selected':'' }} value="1">Yes</option>
                                            <option {{ old('free_delivery') == 0 ? 'selected':'' }} value="0" >No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label class="form-label col-md-3" for="vat_applicable">Vat Applicable</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2 select2-show-search form-select" data-placeholder="Select One" name="vat_applicable">
                                            <option  disabled selected>--Select One--</option>
                                            <option {{ old('vat_applicable') == 1 ? 'selected':'' }} value="1">Yes</option>
                                            <option {{ old('vat_applicable') == 0 ? 'selected':'' }} value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label class="form-label col-md-3" for="stock_visibility">Stock Visibility</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2 select2-show-search form-select" data-placeholder="Select One" name="stock_visibility">
                                            <option disabled selected >--Select One--</option>
                                            <option {{ old('stock_visibility') == 1 ? 'selected':'' }} value="1">Yes</option>
                                            <option {{ old('stock_visibility') == 0 ? 'selected':'' }} value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <h4 class="fw-bold my-4 uppercase">DESCRIPTION</h4><hr>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="description" class="col-md-3 form-label">Short Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="5" name="short_description" id="short_description" placeholder="Short Description" >{{ old('short_description')}}</textarea>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="summernote" class="col-md-3 form-label">Long Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control summernote" id="summernote"  name="long_description"  placeholder="Long Description"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-5 border">
                                <div class="">
                                    <h4 class="fw-bold my-4 text-center">MEDIA & FILES</h4><hr>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="imgInp" class="col-md-3 form-label">Product Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="dropify" data-height="200" />
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="imgInp" class="col-md-3 form-label">Product Back Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="back_image" class="dropify" data-height="200" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="video_link" class="col-md-3 form-label">Video Link</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('video_link') }}" name="video_link" id="video_link" placeholder="Video Link" type="url"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="highlights" class="col-md-3 form-label">Tags</label>
                                    <div class="col-md-9 form-group">
                                        <select multiple name="tags[]"  class="form-control select2 select2-show-search form-select" data-placeholder="Select Tags" >
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}"> {{$tag->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <div class="col-md-3">
                                        <label class="form-label" for="type">Refund</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2 select2-show-search form-select"
                                                data-placeholder="Select One" name="refund">
                                            <option {{ old('refund') == 1 ? 'selected':'' }} value="1">Yes</option>
                                            <option {{ old('refund') == 0 ? 'selected':'' }} value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="">
                                    <h4 class="fw-bold my-4 text-center">DISCOUNT</h4><hr>
                                </div>
                                <div class="row d-flex form-group">
                                    <label class="form-label col-md-3" for="discount_type">Discount Type</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2 select2-show-search form-select" name="discount_type">
                                            <option  value="2">--Select One--</option>
                                            <option {{ old('discount_type') == 0 ? 'selected':'' }} value="0">Flat Amount</option>
                                            <option {{ old('discount_type') == 1 ? 'selected':'' }} value="1">Percentage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="discount_value" class="col-md-3 form-label">Discount Value</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('discount_value') }}" name="discount_value" id="discount_value" placeholder="Discount Value" type="number"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label class="form-label col-md-3" for="discount_banner">Discount Banner</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2 select2-show-search form-select" data-placeholder="Select One" name="discount_banner">
                                            <option  value="2">--Select One--</option>
                                            <option {{ old('discount_banner') == 'save-percentage' ? 'selected':'' }} value="save-percentage">Save(%)</option>
                                            <option {{ old('discount_banner') == 'save-tk' ? 'selected':'' }} value="save-tk">Save(Tk)</option>
                                            <option {{ old('discount_banner') == 'discount-percentage' ? 'selected':'' }} value="discount-percentage">Discount(%)</option>
                                            <option {{ old('discount_banner') == 'discount-tk' ? 'selected':'' }} value="discount-tk">Discount(Tk)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <h4 class="fw-bold my-4 text-center">SEO INFORMATION</h4>
                                    <hr>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="meta_title" class="col-md-3 form-label">Meta Title</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" >{{ old('meta_title') }}</textarea>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="meta_description" class="col-md-3 form-label">Meta Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Meta Description" >{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="meta_keyword" class="col-md-3 form-label">Meta Keyword</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Meta Keyword" >{{ old('meta_keyword') }}</textarea>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="meta_author" class="col-md-3 form-label">Meta Author</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('meta_author') }}" name="meta_author" id="meta_author" placeholder="Meta Author" type="text"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="alt_text" class="col-md-3 form-label">Alt Text</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('alt_text') }}" name="alt_text" id="alt_text" placeholder="Alt Text" type="text"/>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label for="schema_text" class="col-md-3 form-label">Schema Text</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ old('schema_text') }}" name="schema_text" id="schema_text" placeholder="Schema Text" type="text"/>
                                    </div>
                                </div>

                                <div class="row d-flex form-group">
                                    <label class="col-md-3 form-label">Featured Status</label>
                                    <div class="col-md-9 pt-3">
                                        <select class="form-control" name="featured_status" id="">
                                            <option value="1" selected>Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex form-group">
                                    <label class="col-md-3 form-label">Publication Status</label>
                                    <div class="col-md-9 pt-3">
                                        <select class="form-control" name="status" id="">
                                            <option value="1" selected>Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success text-dark my-2 rounded-2 float-end" type="submit">Create New Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        function generateSKU() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let sku = '';

            for (let i = 0; i < 8; i++) {
                sku += characters.charAt(Math.floor(Math.random() * characters.length));
            }

            return sku;
        }

        $(document).ready(function() {
            $('#generate-sku-btn').click(function() {
                const sku = generateSKU();
                $('#sku').val(sku);
            });
        });
    </script>
@endpush

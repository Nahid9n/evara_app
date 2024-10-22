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
                    <a href="{{route('product_offer.create')}}"  data-bs-toggle="modal" data-bs-target="#addProductOffer" class="btn btn-primary ms-auto rounded-0">Add New Product Offer <i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
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
                            @foreach ($product_offers as $key => $product_offer)
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
                                            <a href="{{ route('product_offer.edit', $product_offer->id) }}" data-bs-toggle="modal" data-bs-target="#editProductOffer{{$key}}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></a>
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
                                <div class="modal fade" id="editProductOffer{{$key}}">
                                    <div class="modal-dialog modal-dialog-centered modal-xl task-view-modal" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header p-5">
                                                <h3 class="card-title">Edit Product Offer Form</h3>
                                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form action="{{ route('product_offer.update', $product_offer->id) }}" method="POST"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Product Name</label>
                                                                    <select name="product_id" class="form-control select2-show-search" required>
                                                                        <option value="" disabled selected>-- Select Product --</option>
                                                                        @foreach ($products as $product)
                                                                            <option value="{{ $product->id }}"
                                                                                {{ $product_offer->product_id == $product->id ? 'selected' : '' }}>
                                                                                {{ $product->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span
                                                                        class="text-danger">{{ $errors->has('product_id') ? $errors->first('product_id') : '' }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Title One</label>
                                                                <input type="text" class="form-control" name="title_one" value="{{ $product_offer->title_one }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Title Two</label>
                                                                <input type="text" class="form-control" name="title_two" value="{{ $product_offer->title_two }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Title Three</label>
                                                                <input type="text" class="form-control" name="title_three" value="{{ $product_offer->title_three }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Product Offer Description</label>
                                                                <textarea name="description" class="form-control" rows="3">{{ $product_offer->description }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Discount Amount</label>
                                                                <input type="text" class="form-control" name="discount_amount" value="{{ $product_offer->discount_amount }}"/>
                                                                <span class="text-danger">{{ $errors->has('discount_amount') ? $errors->first('discount_amount') : '' }}</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Product Offer Image</label>
                                                                <input type="file" class="form-control" name="image" id="imgInp">
                                                                <img src="{{ asset($product_offer->image) }}" class="mt-3" id="categoryImage"
                                                                     alt="" height="70" width="70">
                                                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Publication Status</label>
                                                                <label><input type="radio" value="1"
                                                                              {{ $product_offer->status == 1 ? 'checked' : '' }}
                                                                              name="status"><span>Published</span></label>
                                                                <label><input type="radio" value="0"
                                                                              {{ $product_offer->status == 0 ? 'checked' : '' }}
                                                                              name="status"><span>Unpublished</span></label>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary rounded-0 float-end">Update Product Offer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{$product_offers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addProductOffer">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header p-5">
                    <h3 class="card-title">Add Product Offer Form</h3>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product_offer.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                        <select name="product_id" class="form-control select2-show-search" required>
                                            <option value="" disabled selected>-- Select Product --</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        <span
                                            class="text-danger">{{ $errors->has('product_id') ? $errors->first('product_id') : '' }}</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title One <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title_one" value="{{ old('title_one') }}">
                                    <span class="text-danger">{{ $errors->has('title_one') ? $errors->first('title_one') : '' }}</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title Two</label>
                                    <input type="text" class="form-control" name="title_two" value="{{ old('title_two') }}">
                                    <span class="text-danger">{{ $errors->has('title_two') ? $errors->first('title_two') : '' }}</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title Three</label>
                                    <input type="text" class="form-control" name="title_three" value="{{ old('title_three') }}">
                                    <span class="text-danger">{{ $errors->has('title_three') ? $errors->first('title_three') : '' }}</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Offer Description</label>
                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Discount Amount <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="discount_amount" value="{{ old('discount_amount') }}"/>
                                    <span class="text-danger">{{ $errors->has('discount_amount') ? $errors->first('discount_amount') : '' }}</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Offer Image <sub class="text-danger">(1200 x 736)</sub></label>
                                    <input type="file" class="form-control" name="image" id="imgInp">
                                    <img src="" class="mt-3" id="categoryImage" alt="">
                                    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Publication Status</label>
                                    <label for="publishedAdd"><input type="radio" value="1"
                                                  name="status" id="publishedAdd"><span>Published</span></label>
                                    <label for="unpublishedAdd"><input type="radio" value="0" checked name="status" id="unpublishedAdd"><span>Unpublished</span></label>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-0 float-end">Create New Product Offer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

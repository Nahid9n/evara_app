@extends('admin.master')
@section('title','Manage Category Page')
@section('body')

    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Category Show  Table</h6>
                        <hr/>
                        <p class="text-muted">{{session('message')}}</p>
                        <table id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                            <th>sl</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    {{--                                    <td>{{ $blog->category_id }}</td>--}}
                                    {{--                                    <td>{{ $blog->description }}</td>--}}
                                    <td>{{ substr($category->description,0,50) }}</td>
                                    {{--                                    <td>{{ $blog->image }}</td>--}}
                                    <td><img src="{{ asset($category->image) }}" alt="" style="height: 50px ; width: 50px "></td>
                                    <td>{{ $category->status ==1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm float-start m-1 ">Edit</a>
                                        @if($category->status ==1 )
                                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-warning btn-sm float-start m-1 ">Inactive</a>
                                        @else
                                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-success btn-sm float-start m-1 ">Active</a>
                                        @endif
                                        <form action="{{ route('category.destroy',$category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                Delete
                                            </button>
                                        </form>
                                        {{--    <a href="{{ route('categories.destroy',$category->id) }}" class="btn btn-danger btn-sm">Delete</a>--}}
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

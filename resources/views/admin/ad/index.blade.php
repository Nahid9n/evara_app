@extends('admin.master')
@section('title','Manage Ad Page')
@section('body')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title"><i class="fa fa-money-bill"></i>  All Ad Info</h3>
                    <a class="btn btn-primary px-5" href="{{route('ad.create')}}">
                        ADD <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Product Info</th>
                                <th class="border-bottom-0">Ad Title </th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Status</th>

                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $ad)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ isset($ad->product->name) ? $ad->product->name :''}}</td>
                                    <td>{{$ad->title}}</td>
                                    <td><img src="{{asset($ad->image)}}" alt="" height="40" width="60"/></td>
                                    <td>{{$ad->status == 1 ? 'Published' : 'Unpublished'}}</td>



                                    <td>
                                        <a href="{{route('ad.show', $ad->id)}}" class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="{{route('ad.edit', $ad->id)}}" class="btn btn-success btn-sm float-start m-1">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        {{--
                                        @if($feature->status ==1 )
                                            <a href="{{ route('feature.show',$feature->id ) }}" class="btn btn-warning btn-sm float-start m-1" > <i class="fa fa-lock"></i></a>
                                        @else
                                            <a href="{{ route('feature.show',$feature->id ) }}" class="btn btn-blue btn-sm float-start m-1" > <i class="fa fa-unlock"></i></a>
                                        @endif
                                        --}}
                                        <form action="{{ route('ad.destroy',$ad->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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

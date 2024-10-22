@extends('admin.master')
@section('title','Product Queries Table')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Customer Tickets</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">All Tickets</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Tickets</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="">
                            <h3 class="card-title">Tickets Table</h3>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Subject</th>
                                <th class="border-bottom-0">Sending</th>
                                <th class="border-bottom-0">User</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr class="text-center">
                                    <td>{{$ticket->subject}}</td>
                                    <td>{{$ticket->created_at}}</td>
                                    <td>{{$ticket->user->name}}</td>
                                    <td>
                                        <form action="{{route('admin.ticket.status.update',$ticket->id)}}" method="get">
                                            <select class="form-control text-center text-white {{$ticket->status == 0 ? 'bg-warning':''}}{{$ticket->status == 1 ? 'bg-success':''}}{{$ticket->status == 2 ? 'bg-danger':''}} " name="status" id="" onchange="this.form.submit()">
                                                <option {{$ticket->status == 0 ? 'selected':''}} value="0">Pending</option>
                                                <option {{$ticket->status == 1 ? 'selected':''}} value="1">Open</option>
                                                <option {{$ticket->status == 2 ? 'selected':''}} value="2">Close</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td><a href="{{route('admin.ticket.view',$ticket->ticket_id)}}" class="btn btn-sm"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection

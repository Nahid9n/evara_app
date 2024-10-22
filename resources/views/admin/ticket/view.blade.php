@extends('admin.master')
@section('title','Reply Tickets')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Reply Tickets</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Tickets</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reply Tickets</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card p-4">
                <div class="">
                    <h4 class="my-2 d-block"><span class="fw-bold">{{ $ticket->subject }}</span> # {{ $ticket->ticket_id }}</h4>
                    <p ><span>{{ $ticket->user->name }}</span> {{ $ticket->created_at }}</p>
                </div>
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col">
                            <div class="card">
                                <div class="card-body overflow-hidden">
                                    <div class="example">
                                        @foreach($ticketReplys as $reply)
                                            <div class="media my-2 {{$reply->user_id == auth()->user()->id ? 'text-end':''}}">
                                                <div class="media-body overflow-hidden text-muted">
                                                    <pw class="text-primary">{{ $reply->user->name ?? ''}}</pw>
                                                    <p class="mb-0">{{$reply->reply}}</p>
                                                    <small class="text-muted">{{date_format($reply->created_at,'d M, Y h:m a')}}</small>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{route('admin.ticket.reply')}}">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}" readonly>
                            <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}" readonly>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="reply" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="col-md-12 d-grid justify-content-end">
                                <button type="submit" class="btn btn-sm btn-success px-5">send reply <i class="fa mx-1 fa-arrow-circle-o-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection


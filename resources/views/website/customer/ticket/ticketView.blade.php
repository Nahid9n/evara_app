@extends('website.master')
@section('title','Ticket View')
@section('body')
    <section class="mt-2 mb-50">
        <div class="container">
            @include('website.customer.layout.sidebar')
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h4 class="my-2"> <span class="fw-bold">{{ $ticket->subject }}</span> # {{ $ticket->ticket_id }}</h4>
                        <p> <span style="font-size: 12px">{{date_format($ticket->created_at,'d M, Y h:m a')}}</span> <span style="font-size: 10px" class="p-2 rounded-3 text-white {{$ticket->status == 1 ? 'bg-success':''}}{{$ticket->status == 2 ? 'bg-danger':''}}">{{$ticket->status == 1 ? 'Open':''}}{{$ticket->status == 2 ? 'Closed':''}}</span></p>
                    </div>
                    <div class="card-body">

                        <div class="row my-2">
                            <div class="col-lg-12">
                                <ul class="list-group list-group-flush mt-3">
                                    <!-- Replies -->
                                    <!-- Ticket Details -->
                                    @foreach($ticketReplys as $reply)
                                        <div class="media my-2 {{ $reply->user_id == auth()->user()->id ? 'text-end':'text-start'}} ">
                                            <div class="media-body">
                                                <div class="comment-header">
                                                    <p>
                                                        <span class="{{ $reply->user_id == auth()->user()->id ? 'bg-primary text-white':'bg-success'}} rounded-3 py-1 px-2">{{ $reply->reply }}</span><br>
                                                        <small style="font-size: 9px;">{{ date_format($reply->created_at,'d M, Y h:m a') }}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <form class="mt-3" method="post" action="{{route('customer.ticket.reply')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" readonly>
                                            <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}" readonly>
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control border-dark" name="reply" id="" cols="30" rows="5" {{$ticket->status == 0 ? 'readonly':''}}{{$ticket->status == 2 ? 'readonly':''}}></textarea>
                                            </div>
                                            <div class="col-md-12 d-grid justify-content-end">
                                                <button type="submit" class="btn btn-sm btn-success " {{$ticket->status == 0 ? 'disabled':''}}{{$ticket->status == 2 ? 'disabled':''}}>send reply</button>
                                            </div>
                                        </div>
                                    </form>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



@extends('website.customer.layout.app')
@section('title','Customer Dashboard')
@section('body')
    <div class="">
        @if(Request::route()->getName() == 'customer.view.ticket')
            <div class="card">
                <div class="card-header">
                    <h4 class="my-2"> <span class="fw-bold">{{ $ticket->subject }}</span> # {{ $ticket->ticket_id }}</h4>
                    <p><span>{{auth()->user()->name}}</span> {{date_format($ticket->created_at,'d M, Y h:m a')}} <span class="p-2 rounded-3 text-white {{$ticket->status == 1 ? 'bg-success':''}}{{$ticket->status == 2 ? 'bg-danger':''}}">{{$ticket->status == 1 ? 'Open':''}}{{$ticket->status == 2 ? 'Closed':''}}</span></p>
                </div>
                <div class="card-body">
                    <form method="post" action="{{--{{route('customer.ticket.reply')}}--}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}" readonly>
                            <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}" readonly>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="reply" id="" cols="30" rows="5" {{$ticket->status == 0 ? 'readonly':''}}{{$ticket->status == 2 ? 'readonly':''}}></textarea>
                            </div>
                            <div class="col-md-12 d-grid justify-content-end">
                                <button type="submit" class="btn btn-sm btn-success " {{$ticket->status == 0 ? 'disabled':''}}{{$ticket->status == 2 ? 'disabled':''}}>send reply</button>
                            </div>
                        </div>
                    </form>
                    <div class="row my-2">
                        <div class="col-lg-12">

                            <ul class="list-group list-group-flush mt-3">
                                <!-- Replies -->

                                <!-- Ticket Details -->
                                @foreach($ticketReplys as $reply)
                                    <li class="list-group-item px-0">
                                        <div class="media">
                                            <a class="media-left" href="#">
                                            <span class="avatar avatar-sm mr-3">
                                                <img width="50" height="50" class="rounded-circle" src="https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png">
                                            </span>
                                            </a>
                                            <div class="media-body">
                                                <div class="comment-header">
                                                    <span class="fs-14 fw-700 text-dark">{{ $reply->user->name }}</span>
                                                    <p class="text-muted text-sm fs-12 mt-2">{{date_format($reply->created_at,'d M, Y h:m a')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            {{$reply->reply}}
                                            <br>
                                            <br>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    <h5>Support Ticket</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('customer.store.ticket')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="sender_id" value="{{auth()->user()->id}}">
                            <div class="form-group col-md-12">
                                <label for="#sub">Subject <span class="text-danger">*</span></label>
                                <input class="form-control" id="sub" name="subject" type="text" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="#des">Provide a detailed description</label>
                                <textarea class="form-control" name="description" id="des" cols="30" rows="2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success">create ticket</button>
                            </div>
                        </div>
                    </form>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Ticket Id</th>
                                        <th>Subject</th>
                                        <th>Sending Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($tickets as $ticket)
                                        <tr>
                                            <td>#{{$ticket->ticket_id}}</td>
                                            <td>{{$ticket->subject}}</td>
                                            <td>{{$ticket->created_at}}</td>
                                            <td class="text-white {{$ticket->status == 0 ? 'bg-warning':''}}{{$ticket->status == 1 ? 'bg-success':''}}{{$ticket->status == 2 ? 'bg-danger':''}}">
                                                {{$ticket->status == 0 ? 'pending':''}}
                                                {{$ticket->status == 1 ? 'open':''}}
                                                {{$ticket->status == 2 ? 'closed':''}}
                                            </td>
                                            <td>
                                                <a class="btn-small d-block" href="{{ route('support.ticket.view', $ticket->ticket_id) }}" >View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">No Ticket Found</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection



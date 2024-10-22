<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketReply;
use Session;
class TicketController extends Controller
{
    public function customerTicket(){
        $tickets = Ticket::where('sender_id',auth()->user()->id)->get();
        return view('website.customer.ticket.index',compact('tickets'));
    }
    public function createTicket(Request $request){
        try {
            $this->validate($request,[
                'subject'=>'required'
            ]);
            $ticket = new Ticket();
            $ticket->subject = $request->subject;
            $ticket->ticket_id = rand(0,99999999999999);
            $ticket->description = $request->description;
            $ticket->sender_id = $request->sender_id;
            $ticket->save();
            toastr()->success('ticket create success.wait for approval.');
            return redirect()->back();
        }
        catch (\Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function ticketView($id){
        $ticket = Ticket::where('ticket_id',$id)->first();
        $ticketReplys = TicketReply::where('ticket_id', $id)->get();
        return view('website.customer.ticket.ticketView', compact('ticket', 'ticketReplys'));
    }

    public function viewTicket($id){
        return view('customer.home.index',[
//            'orders'=>Order::where('user_id', auth()->user()->id)->latest()->get(),
//            'billings'=> BillingModel::where('customer_id', auth()->user()->id)->first(),
//            'shippings'=> ShippingsModel::where('customer_id', auth()->user()->id)->first(),
//            'customer'=> Customer::where('user_id', auth()->user()->id)->first(),
            'id' => '',
            'ticket'=> Ticket::where('ticket_id',$id)->first(),
            'ticketReplys'=> TicketReply::where('ticket_id',$id)->get(),
        ]);
    }
    public function adminTicketManage(){

        return view('admin.ticket.ticket',[
            'tickets'=> Ticket::all(),
        ]);
    }
    public function ticketStatusUpdate(Request $request,$id){
        $ticket = Ticket::find($id);
        $ticket->status = $request->status;
        $ticket->save();
        toastr()->success('status save success.');
        return back();
    }
    public function adminViewTicket($id){
        return view('admin.ticket.view',[
            'ticket'=> Ticket::where('ticket_id',$id)->first(),
            'ticketReplys'=> TicketReply::where('ticket_id',$id)->get(),
        ]);
    }
    public function replyTicket(Request $request){
        try {
            $this->validate($request,[
                'reply'=>'required'
            ]);
            $replyTicket = new TicketReply();
            $replyTicket->user_id = $request->user_id;
            $replyTicket->ticket_id = $request->ticket_id;
            $replyTicket->reply = $request->reply;
            $replyTicket->save();
            toastr()->success('reply sent success.');
            return redirect()->back();
        }
        catch (\Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }

    }
}

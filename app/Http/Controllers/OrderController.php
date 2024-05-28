<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\Facade\Pdf;

use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index',[
//            'orders' => Order::all()
            'orders' => Order::orderby('id','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.order.show',[
            'order' => Order::find($id),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('admin.order.edit',[
            'order' => Order::find($id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        return $request;
        Order::updateOrder($request,$id );
        return redirect('/order')->with('message', 'Order info update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::deleteOrder($id);
        OrderDetail::deleteOrderDetailInfo($id);

        return back()->with('message', 'Order Information delete successfully');

    }

    public function showInvoice( string $id)
    {
        return view('admin.order.invoice-show',[
            'order' => Order::find($id)
        ]);
    }

    public function showDownload( string $id)
    {
//        $pdf = PDF::loadHTML('<h1>Test</h1>'); // make pdf
        $pdf = pdf::loadView('admin.order.invoice-download',[
            'order' => Order::find($id)
        ]); // make pdf
        return $pdf->stream(); // show pdf


//        return view('admin.order.invoice-download',[
//            'order' => Order::find($id)
//        ]);
    }







}

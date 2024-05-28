<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use Session;
use Illuminate\Http\Request;
use PDF;
class CustomerAuthController extends Controller
{

    private $customer , $orders;

    public function login()
    {
        return view('website.customer.login');
    }

    public function loginCheck( Request $request)
    {
//        return $request ;

        $this->customer = Customer::where('email',$request->user_name)->orWhere('mobile',$request->user_name)->first();

        if ( $this->customer){
            if (password_verify( $request->password , $this->customer->password)){
//                return 'success';

                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/my-dashboard');
            }
            else{
                return back()->with('message','Your password is not valid ');
            }
        }
        else{

            return back()->with('message','Your email or Mobile number is not valid ');
        }

    }

    public function newCustomer( Request $request)
    {
//        return $request ;
        $this->customer = Customer::newCustomer($request);
        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/my-dashboard') ;
    }
    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

    public function editCustomer( Request $request)
    {
        //return  $request;
        $this->customer = Customer::updateCustomer($request);

        Session::put('customer_id',  $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/my-dashboard')->with('message','Your Profile is Updated ');
    }

    public function showCustomerOrder($id)
    {
        $this->orders = Order::where('customer_id', Session::get('customer_id'))
            ->orderBy('id','desc')
            ->get();
        $this->customer = Customer::where('id', Session::get('customer_id'))
            ->first();
        return view('website.customer.order',[
            'orders' => $this->orders,
            'order' => Order::find($id),
            'customer'=>$this->customer,

        ]);
    }

    public function showCustomerInvoice( string $id)
    {
        return view('website.customer.invoice-show',[
            'order' => Order::find($id)
        ]);
    }

    public function showCustomerDownload( string $id)
    {
//        $pdf = PDF::loadHTML('<h1>Test</h1>'); // make pdf
        $pdf = PDF::loadView('website.customer.invoice-download',[
            'order' => Order::find($id)
        ]); // make pdf
        return $pdf->stream(); // show pdf
//        $pdf = PDF::loadView('pdf.document', $data);
//        return $pdf->stream('document.pdf');

    }




    public function dashboard()
    {
        $this->orders = Order::where('customer_id', Session::get('customer_id'))
                                 ->orderBy('id','desc')
                                 ->get();
        $this->customer = Customer::where('id', Session::get('customer_id'))
            ->first();

        return view('website.customer.dashboard',[
            'orders' => $this->orders,
            'customer' => $this->customer,
        ]);
    }
}

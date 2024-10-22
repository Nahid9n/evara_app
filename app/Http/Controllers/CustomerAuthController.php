<?php

namespace App\Http\Controllers;
use App\Models\Billing;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use Brian2694\Toastr\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Http\Request;
use PDF;
use Exception;
class CustomerAuthController extends Controller
{

    private $customer , $orders;

    public function login()
    {
        return view('website.customer.login');
    }

    public function loginCheck( Request $request)
    {
/*//        return $request ;

        $this->customer = User::where('email',$request->user_name)->orWhere('mobile',$request->user_name)->first();

        if ( $this->customer){
            if (password_verify( $request->password , $this->customer->password)){
//                return 'success';

                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect()->route('customer.dashboard')->with('message','Login Success.');
            }
            else{
                return back()->with('error','Your password is not valid ');
            }
        }
        else{

            return back()->with('error','Your email or Mobile number is not valid ');
        }*/


        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customer = User::where('email',$request->email)->first();
        if (isset($customer)){
            if ($customer->status == 1){
                if ($customer->role == 'customer'){
                    $credentials = $request->only('email', 'password');
                    if (Auth::attempt($credentials)) {
                        toastr()->success("Login Successfully");
                        return redirect()->route('customer.dashboard');
                    } else {
                        toastr()->error('Invalid email or password');
                        return redirect()->back();
                    }
                }
                else{
                    toastr()->error('You Are Not A Customer');
                    return redirect()->back();
                }

            }
            else{
                toastr()->error('You Are Banned Contact With Admin For More Update.');
                return redirect()->back();
            }
        }
        else{
            toastr()->error('You Are Not Registered.');
            return redirect()->back();
        }

    }

    public function newCustomer( Request $request)
    {

        $this->customer = User::newCustomer($request);
        $customer = new Customer();
        $customer->user_id = $this->customer->id;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile  = $request->mobile;
        $customer->save();

        $customerBilling = new Billing();
        $customerBilling->user_id = $this->customer->id;
        $customerBilling->save();

        $customerBilling = new Shipping();
        $customerBilling->user_id = $this->customer->id;
        $customerBilling->save();

        toastr()->success('Registration Success.Please Login');
        return back();
    }
    public function logout()
    {
        Auth::logout();
        toastr()->success("Logout Successfully");
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


    public function customerOrder()
    {
        $this->orders = Order::where('customer_id', auth()->user()->id)
            ->orderBy('id','desc')
            ->paginate(10);
        return view('website.customer.order.order',[
            'orders' => $this->orders,
            'customer'=>$this->customer,
        ]);
    }
    public function customerCancelOrder()
    {
        $this->orders = Order::where('customer_id', auth()->user()->id)->where('order_status','Cancel')
            ->orderBy('id','desc')
            ->paginate(10);
        return view('website.customer.order.cancel',[
            'orders' => $this->orders,
            'customer'=>$this->customer,
        ]);
    }

    public function showCustomerOrder($id)
    {
        $this->orders = Order::where('customer_id', auth()->user()->id)
            ->orderBy('id','desc')
            ->get();
        $this->customer = Customer::where('id', auth()->user()->id)
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

    public function address(){
        $billings = Billing::where('user_id', auth()->user()->id)->first();
        $shippings = Shipping::where('user_id', auth()->user()->id)->first();
        return view('website.customer.address.index', compact('billings', 'shippings'));
    }
    public function accountDetail(){
        $customer = Customer::where('user_id', auth()->user()->id)->first();
        return view('website.customer.account.index', compact('customer'));
    }

    public function updateCustomerInfo(Request $request, $id){
        try{
            $validation = Validator::make($request->all(),[
                'name'     => 'string|min:3|max:64|nullable',
                'mobile'          => 'string|min:5|max:20|nullable',
                'company'        => 'string|min:3|max:100|nullable',
                'address' => 'string|min:3|max:255|nullable',
                'gender'         => 'string|min:3|max:10|nullable',
                'state'          => 'string|min:3|max:64|nullable',
                'post'           => 'string|min:3|max:64|nullable',
                'country'        => 'string|min:3|max:100|nullable',
                'ssn'            => 'string|min:3|max:64|nullable',
                'city'           => 'string|min:3|max:64|nullable',
                'email'          => 'string|min:3|max:255|nullable',
                'dob'            => 'string|min:3|max:20|nullable',
            ]);
            if($validation->fails()) {
                return redirect()->back()->withErrors($validation->errors());
            }


            $user_table = User::find($id);
            $user_table->name = $request->name;
            $user_table->save();

            $customer = Customer::where('user_id',$id)->first();
            if($request->file('image')){
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = time().'.'.$extension;
                $directory = 'uploads/customer-images/';
                $image->move($directory , $imageName);
                $imageUrl = $directory.$imageName;
                if(file_exists($customer->image)) {
                    unlink($customer->image);
                }
                $customer->image = $imageUrl;
            }

            $customer->name = $request->name;
            $customer->mobile = $request->mobile;
            $customer->company = $request->company;
            $customer->address = $request->address;
            $customer->gender = $request->gender;
            $customer->marital_status = $request->marital_status;
            $customer->blood_group = $request->blood_group;
            $customer->state = $request->state;
            $customer->post = $request->post;
            $customer->country = $request->country;
            $customer->ssn = $request->ssn;
            $customer->city = $request->city;
            $customer->website = $request->website;
            $customer->facebook = $request->facebook;
            $customer->linkedIn = $request->linkedIn;
            $customer->twitter = $request->twitter;
            $customer->youtube = $request->youtube;
            $customer->instagram = $request->instagram;
            $customer->date_of_birth = $request->dob;
            $customer->save();

            toastr()->success('Data updated');
            return redirect()->route('customer.account.details');
        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function customerChangePassword(){
        return view('website.customer.password.index');
    }
    public function customerPasswordChange(Request $request, $id){
        try {
            $validate = Validator::make($request->all(),[
                'old_password' => 'required',
                'new_password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6'
            ]);

            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $customer = User::find($id);
            if ($customer) {
                if (password_verify($request->old_password, $customer->password)) {
                    $customer->password = bcrypt($request->new_password);
                    $customer->save();
                    toastr()->success('Password Change Successfully');
                    return back();
                } else {
                    toastr()->error('Old Password Mismatched');
                    return back();
                }
            }
            else {
                toastr()->error('data not found');
                return back();
            }
        }
        catch (Exception $e){
            toastr()->error('');
        }
    }
    public function billingsStore(Request $request, $id){
        try{
            $address = Billing::where('user_id', $id)->first();

            if(!$address){
                toastr()->error("Unable to update");
                return redirect()->back();
            }
            $address->address_one = $request->address_one;
            $address->address_two = $request->address_two;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->zip = $request->zip;
            $address->country = $request->country;
            $address->save();

            toastr()->success("Billing address has been updated");
            return redirect()->route('customer.address');
        }
        catch(Exception $e){
            toastr()->error($e);
            return redirect()->back();
        }
    }
    public function shippingStore(Request $request, $id){
        try{
            $address = Shipping::where('user_id', $id)->first();

            $address->address_one = $request->address_one;
            $address->address_two = $request->address_two;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->zip = $request->zip;
            $address->country = $request->country;
            $address->save();
            toastr()->success("Shipping address has been updated");
            return redirect()->route('customer.address');
        }
        catch(Exception $e){
            toastr()->error($e);
            return redirect()->back();
        }
    }
    public function dashboard()
    {
        $billings = Billing::where('user_id',auth()->user()->id)->first();
        $shippings = Shipping::where('user_id',auth()->user()->id)->first();
        return view('website.customer.home.index',compact('billings','shippings'));
    }
}

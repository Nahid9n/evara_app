<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
//        return Auth::user()->role;
        $product = Product::where('status',1)->count();
        $category = Category::where('status',1)->count();
        $customer = Customer::where('status',1)->count();
        return view('admin.home.index',compact('product','category','customer'));
    }
}

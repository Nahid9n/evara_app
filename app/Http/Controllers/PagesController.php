<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('website.pages.about');
    }

    public function purchaseGuide()
    {
        return view('website.pages.purchase-guide');
    }

    public function termsCondition()
    {
        return view('website.pages.terms-condition');
    }

    public function shippingPolicy()
    {
        return view('website.pages.shipping-policy');
    }

    public function returnPolicy()
    {
        return view('website.pages.return-policy');
    }

    public function contact()
    {
        return view('website.pages.contact');
    }

}

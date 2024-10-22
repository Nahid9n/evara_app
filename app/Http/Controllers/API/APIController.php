<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /*
        *  $searchText = asd asd
        *  $products = asdasdasd
    */
    private $searchText = '';
    private $products   = '';

    public function getProductBySearchText()
    {
        $this->searchText   = $_GET['search_text'];
        $products     = Product::where('status', 1)->where('name', 'LIKE', "%{$this->searchText}%")->get();
        foreach ($products as $product)
        {
            $product->image = asset($product->image);
        }
        return view('website.product.searchProduct',compact('products'));
    }

    public function getLatestProduct()
    {
        $this->products = Product::where('status', 1)->orderBy('id', 'desc')->take(8)->get();

        foreach ($this->products as $product)
        {
            $product->image = asset($product->image);
        }
        return response()->json($this->products);
    }
}

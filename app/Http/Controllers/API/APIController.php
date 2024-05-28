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
        $this->products     = Product::where('status', 1)->where('name', 'LIKE', "%{$this->searchText}%")->get(['id', 'name', 'image', 'selling_price', 'regular_price']);
        foreach ($this->products as $product)
        {
            //   $product->image = admin/img/product-img/1699934833.jpg
            $product->image = asset($product->image);
            //   $product->image = http://localhost/evara/public/admin/img/product-img/1699934833.jpg
        }
        return response()->json($this->products);
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

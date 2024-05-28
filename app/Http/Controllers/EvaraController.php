<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class EvaraController extends Controller
{
    private $product, $productOffer, $discount;


    public function index()
    {
      return view('website.home.index',[
          'products' => Product::where('featured_status',1)
         // 'products' => Product::where('status',1)
              ->orderBy('id','desc')
              ->take(8)
              ->get(['id','name','image','category_id','regular_price','selling_price']),
//          'product_offers' => ProductOffer::all(),
          'product_offers'  => ProductOffer::where('status',1)->orderBy('id','desc')->take(4)->get(),
          'vendor_products' => Product::whereNot('vendor_id', 0)->where('status', 1)->orderBy('id','desc')->take(16)->get(),
          'brands'    =>Brand::all(),
          'categories' => Category::where('status',1) ->orderBy('id','desc')->get(),
          'features' => Feature::where('status',1) ->orderBy('id','desc')->get(),
          'ad12s' => Ad::where('position',12) ->orderBy('id','desc')->take(1)->get(),
          'ad04s' => Ad::where('position',4) ->orderBy('id','desc')->take(1)->get(),


      ]);
    }

    public function category($id)
    {
        //        return 'ok';
        return view('website.category.index',[
            'products' => Product::where('category_id',$id)
                ->orderBy('id','desc')
                ->get(['id','name','image','regular_price','selling_price']),

            'categories' => Category::all(),

        ]);
    }


    public function subCategory($id)
    {
        return view('website.category.index',[
            'products' => Product::where('sub_category_id',$id)
                ->orderBy('id','desc')
                ->get(['id','name','image','regular_price','selling_price']),

            'categories' => Category::all(),

        ]);
    }

    public function product($id)
    {
        $this->product = Product::find($id);

        $this->productOffer = ProductOffer::where('product_id', $id)->orderBy('id', 'desc')->first();
        if ($this->productOffer)
        {
            $this->discount = $this->productOffer;
        }
        else
        {
            $this->discount = '';
        }

        return view('website.product.index', [
            'product' => $this->product,
            'category_products' => Product::where('category_id',$this->product->category_id)
            ->orderBy('id','desc')
            ->take(4)
            ->get(['id','name','image','selling_price','regular_price']),
            'discount'  => $this->discount,
        ]);
    }
}

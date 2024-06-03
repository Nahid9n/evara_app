<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use Exception;

class EvaraController extends Controller
{
    private $product, $productOffer, $discount;


    public function index()
    {
      return view('website.home.index',[
          'products' => Product::where('featured_status',1)
         // 'products' => Product::where('status',1)
              ->orderBy('id','desc')
              ->take(12)
              ->get(['id','name','image','category_id','brand_id','regular_price','selling_price','slug']),
            'latestProducts' => Product::where('status',1)->take(12)->latest()->get(),
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

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id',$category->id)->orderBy('id','desc')->get(['id','name','slug','category_id','image','back_image','regular_price','selling_price']);
        return view('website.category.index',[
            'products' => $products,
            'categories' => Category::where('status',1)->latest()->get(),

        ]);
    }


    public function subCategory($id)
    {
        return view('website.category.index',[
            'products' => Product::where('sub_category_id',$id)
                ->orderBy('id','desc')
                ->get(['id','name','slug','image','regular_price','selling_price']),

            'categories' => Category::where('status',1)->latest()->get(),

        ]);
    }

    public function allProduct()
    {
        return view('website.product.allproduct', [
            'products' => Product::where('status',1)->latest()->paginate(12),
        ]);
    }
    public function productDetails($slug)
    {
        try {
            $product = Product::where('slug',$slug)->first();

            $productOffer = ProductOffer::where('product_id', $product->id)->orderBy('id', 'desc')->first();
            if ($productOffer)
            {
                $discount = $productOffer;
            }
            else
            {
                $discount = '';
            }

            return view('website.product.index', [
                'product' => $product,
                'category_products' => Product::where('category_id',$product->category_id)
                    ->orderBy('id','desc')
                    ->take(4)
                    ->get(['id','name','slug','image','selling_price','regular_price']),
                'discount'  => $discount,
            ]);
        }
        catch (Exception $exception){
            return back()->with('error',$exception->getMessage());
        }

    }

}

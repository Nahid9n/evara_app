<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\CouponCollect;
use App\Models\Feature;
use App\Models\Highlight;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductOffer;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Exception;
use Session;

class EvaraController extends Controller
{
    private $product, $productOffer, $discount;
    private $per_page = 12;
    public function index()
    {
      $banners = Banner::where('status',1)->orderBy('position','asc')->get()->take(2);
      $ad12s = Ad::where('status',1)->orderBy('position','asc')->take(1)->get();
      return view('website.home.index',[
          'products' => Product::orderBy('id','desc')->take(12)->get(),
          'latestProducts' => Product::where('status',1)->take(50)->latest()->get(),
          'product_offers'  => ProductOffer::where('status',1)->orderBy('id','desc')->take(4)->get(),
          'brands'    => Brand::where('status',1)->orderBy('id','desc')->get(),
          'categories' => Category::where('status',1) ->orderBy('id','desc')->get(),
          'features' => Feature::where('status',1) ->orderBy('id','desc')->get(),
          'ad12s' => $ad12s,
          'banners' => $banners,
      ]);
    }
    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id',$category->id)->orderBy('id','desc')->paginate(18);
        return view('website.category.index',[
            'products' => $products,
            'categorySlug' => $slug,
            'subCategorySlug' => null,
            'categories' => Category::where('status',1)->latest()->get(),
            'subcategories' => SubCategory::where('category_id',$category->id)->where('status',1)->latest()->get(),
            'brands' => Brand::where('status',1)->latest()->get(),
            'colors' => Color::where('status',1)->latest()->get(),
            'sizes' => Size::where('status',1)->latest()->get(),

        ]);
    }
    public function subCategory($slug)
    {
        $subcategory = SubCategory::where('slug',$slug)->first();
        $subcategories = SubCategory::whereIn('category_id',[$subcategory->category_id])->where('status',1)->get();
        $products = Product::where('sub_category_id',$subcategory->id)->orderBy('id','desc')->paginate(18);
        return view('website.subcategory.index',[
            'products' => $products,
            'subCategorySlug' => $slug,
            'categorySlug' => $subcategory->category->slug,
            'categories' => Category::where('status',1)->latest()->get(),
            'subcategories' => $subcategories,
            'brands' => Brand::where('status',1)->latest()->get(),
            'colors' => Color::where('status',1)->latest()->get(),
            'sizes' => Size::where('status',1)->latest()->get(),
        ]);
    }
    public function productByBrand($slug)
    {
        $brand = Brand::where('slug',$slug)->first();
        $products = Product::where('brand_id',$brand->id)->orderBy('id','desc')->paginate(18);
        return view('website.brand.index',[
            'products' => $products,
            'brandSlug' => $slug,
            'categories' => Category::where('status',1)->latest()->get(),
            'subcategories' => SubCategory::where('status',1)->latest()->get(),
            'brands' => Brand::where('status',1)->latest()->get(),
            'colors' => Color::where('status',1)->latest()->get(),
            'sizes' => Size::where('status',1)->latest()->get(),

        ]);
    }
    public function allProduct()
    {
        return view('website.product.allproduct', [
            'products' => Product::where('status',1)->latest()->paginate(100),
            'categories' => Category::where('status',1)->latest()->get(),
            'subcategories' => SubCategory::where('status',1)->latest()->get(),
            'brands' => Brand::where('status',1)->latest()->get(),
            'colors' => Color::where('status',1)->latest()->get(),
            'sizes' => Size::where('status',1)->latest()->get(),
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
    public function productByTag($tag)
    {
        try {
            $products = Product::where('tags','LIKE','%'.$tag.'%')->paginate(100);

            return view('website.product.allproduct', [
                'products' => $products,
                'categories' => Category::where('status',1)->latest()->get(),
                'subcategories' => SubCategory::where('status',1)->latest()->get(),
                'brands' => Brand::where('status',1)->latest()->get(),
                'colors' => Color::where('status',1)->latest()->get(),
                'sizes' => Size::where('status',1)->latest()->get(),
            ]);
        }
        catch (Exception $exception){
            return back()->with('error',$exception->getMessage());
        }

    }
    public function filter(Request $request)
    {

//        try {
        $query = Product::query();

        /*$query->when($request->keyword, function ($q, $keyword) {
            $q->where('name','%like%', $keyword);
        });*/
        $query->when($request->category_id, function ($q, $categoryId) {
            $q->where('category_id', $categoryId);
        });
        $query->when($request->subcategory_id, function ($q, $subcategoryId) {
            $q->where('sub_category_id', $subcategoryId);
        });

        $query->when($request->brand_id, function ($q, $brandId) {
            $q->where('brand_id', $brandId);
        });

        $query->when($request->color, function ($q, $colorId) {
            $productIds = ProductColor::where('color_id', $colorId)
                ->pluck('product_id'); // Collect only product IDs
            $q->whereIn('id', $productIds);
        });

        $query->when($request->size, function ($q, $sizeId) {
            $productIds = ProductSize::where('size_id', $sizeId)
                ->pluck('product_id'); // Collect only product IDs
            $q->whereIn('id', $productIds);
        });

        $query->when($request->min_price && $request->max_price, function ($query) use ($request) {
            $query->whereBetween('regular_price', [$request->min_price, $request->max_price]);
        });

        $products = $query->latest()->paginate(48);

            /*$perPage = 100;
            $offset = isset($all_data->page) ? $all_data->page : 0;
            $products = $query->where('status',1)->latest()->paginate($perPage);
            $countProducts = $products->where('status',1)->count();*/
            if ($products->isEmpty()) {
                return view('website.empty.empty');
            }
            return view('website.filter.ajaxFilter', compact('products'));
//        }
//        catch (Exception $e){
//            Toastr::error($e->getMessage());
//            return back();
//        }
    }
    public function paginate(Request $request)
    {
        $products = Product::where('status',1)->paginate(20);
        return view('website.pagination.paginate', compact('products'))->render();
    }
    public function getSubCategoryByCategory(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
//        $subCategories = SubCategory::whereIn('category_id',$categoryIds)->get();
//        $subCategorySlug = null;
        return response()->json($subcategories);
        /*$categories = Category::whereIn('id',$request->id)->get('id');
        $categoryIds = array();
        foreach ($categories as $category){
            array_push($categoryIds,$category->id);
        }
        $subCategories = SubCategory::whereIn('category_id',$categoryIds)->get();
        $subCategorySlug = null;
        return view('website.filter.ajaxsubcategory',compact('subCategories','subCategorySlug'));*/
    }
    public function coupons(){
//        try {
        if (auth()->user()->id){
            $userCoupons = CouponCollect::where('user_id',auth()->user()->id)->get();
            $couponIds = array();
            foreach ($userCoupons as $coupon){
                array_push($couponIds,$coupon->coupon_id);
            }
            $coupons = Coupon::whereNotIn('id',$couponIds)->where('status',1)->latest()->paginate(12);
            return view('website.coupon.coupons', compact('coupons'));
        }
        else{
            $coupons = Coupon::where('status',1)->latest()->paginate(12);
            return view('website.coupon.coupons', compact('coupons'));
        }

//        }catch (Exception $e){
//            Toastr::error($e->getMessage());
//            return back();
//        }

    }

}

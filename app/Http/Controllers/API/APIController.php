<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /*
        *  $searchText = asd asd
        *  $products = asdasdasd
    */
    private $searchText = '';
    private $products   = '';

    public function getProductBySearchText(Request $request)
    {
        $searchText   = $request->search_text;
        $query = Product::query();

        $query->when($searchText, function ($q, $searchText) {
            $q->where('name', 'LIKE', "%{$searchText}%");
        });

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
        $categories = Category::where('status',1)->latest()->get();
        $subcategories = SubCategory::where('status',1)->latest()->get();
        $brands = Brand::where('status',1)->latest()->get();
        $colors = Color::where('status',1)->latest()->get();
        $sizes = Size::where('status',1)->latest()->get();
        /*$perPage = 100;
        $offset = isset($all_data->page) ? $all_data->page : 0;
        $products = $query->where('status',1)->latest()->paginate($perPage);
        $countProducts = $products->where('status',1)->count();*/
        if ($products->isEmpty()) {
            return view('website.empty.empty');
        }
        return view('website.product.searchProduct', compact('products','categories','subcategories','brands','colors','sizes'));

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

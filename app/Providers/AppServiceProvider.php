<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Vendor;
use App\Models\WishList;
use Illuminate\Support\ServiceProvider;
use View;
Use Session;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['website.master'],function ($view){
            $view->with('categories',Category::all());
            $view->with('wishlists',WishList::where('customer_id',Session::get('customer_id'))
                                              ->get());
            $view->with('setting', Setting::latest()->first());
            $view->with('vendor', Vendor::all());
        });
        View::composer(['admin.master'],function ($view){

            $view->with('vendor', Vendor::where('id', Session::get('vendor_id'))
                ->first());
            /*
            $view->with('vendor', Vendor::all());
            */
        });

    }
}

<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
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
        View::composer(['*'],function ($view){
            $view->with([
                'data' => null,
                'setting' => Setting::latest()->first(),
            ]);

        });
        View::composer(['website.master'],function ($view){
            $view->with('categories',Category::where('status',1)->take(12)->get());
            $view->with('pages',Page::where('status',1)->orderBy('serial','asc')->get());
            if (auth()->check()){
                $view->with('wishlists',WishList::where('customer_id',auth()->user()->id)->get());
            }
            else{
                $view->with('wishlists',null);
            }
            $view->with('setting', Setting::latest()->first());
            $view->with('vendor', Vendor::all());
        });
        View::composer(['website.customer.layout.app'],function ($view){
            $view->with('pages',Page::where('status',1)->orderBy('serial','asc')->get());
            $view->with('categories',Category::where('status',1)->get());
            $view->with('wishlists',WishList::where('customer_id',auth()->user()->id)
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

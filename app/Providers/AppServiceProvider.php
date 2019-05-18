<?php

namespace App\Providers;

use App\Banners;
use App\Category;
use App\Sub_Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $banner = Cache::get('banner', function () {
            $c=   Banners::all();
            Cache::put('banner', $c, 30);
            return $c;
        });
        $category = Cache::get('category', function () {
            $c=   Category::orderBy('category')->get();;
            Cache::put('category', $c, 30);
            return $c;
        });
        $sub_category = Cache::get('sub_category', function () {
            $c=   Sub_Category::orderBy('category')->get();;
            Cache::put('sub_category', $c, 30);
            return $c;
        });
        View::share('banner', $banner);
        View::share('category', $category);
        View::share('sub_category', $sub_category);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

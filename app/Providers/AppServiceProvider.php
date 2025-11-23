<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use App\Models\product;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        $categories = Category::whereRaw('top_id is null')->take(8)->get();
        View::share('categories', $categories);

//
//            $timeout = now()->addMinutes(10);
//            $statistics = Cache::remember('statistics', $timeout, function () {
//                return [
//                    'pending_order' => Order::where('situation', 'Siparişiniz alındı.')->count(),
//                    'completed_order' => Order::where('situation', 'Tamamlanan sipariş.')->count(),
//                    'total_product' => Product::count(),
//                    'total_category' => Category::count(),
//                    'total_user' => User::count()
//                ];
//            });
//        View::share('statistics', $statistics);




//        foreach(Settings::all() as $settings) {
//            Config::set('key.' . $settings->key, $settings->value);
//        }
    }
}

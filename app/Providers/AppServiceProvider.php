<?php

namespace App\Providers;

use App\Models\category;
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

//
//            $timeout = now()->addMinutes(10);
//            $statistics = Cache::remember('statistics', $timeout, function () {
//                return [
//                    'pending_order' => Order::where('situation', 'Siparişiniz alındı.')->count(),
//                    'completed_order' => Order::where('situation', 'Tamamlanan sipariş.')->count(),
//                    'total_product' => product::count(),
//                    'total_category' => category::count(),
//                    'total_user' => User::count()
//                ];
//            });
//        View::share('statistics', $statistics);




        foreach(Settings::all() as $settings) {
            Config::set('key.' . $settings->key, $settings->value);
        }
    }
}

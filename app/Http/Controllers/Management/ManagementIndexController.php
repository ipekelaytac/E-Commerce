<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Customer\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ManagementIndexController extends Controller
{
    public function index()
    {
        $pending_order = Order::where('situation', 'Siparişiniz alındı')->count();
        $completed_order = Order::where('situation', 'Sipariş tamamlandı')->count();
        $total_product = Product::count();
        $total_category = Category::count();
        $total_user = User::count();
        $total_order = Order::count();


        $date = new \DateTime('NOW');
        $date->modify('-100 year'); //
        $formatted_date = $date->format('Y-m-d H:i:s');
        $all_sales = Order::where('created_at', '>=', $formatted_date)
            ->sum('order_price');


        $date = new \DateTime('NOW');
        $date->modify('-24 hour'); //
        $formatted_date = $date->format('Y-m-d H:i:s');
        $day_sales = Order::where('created_at', '>=', $formatted_date)->sum('order_price');

        $day_sales_product = DB::table('cart_product')
            ->join('order', 'order.main_cart_id', 'cart_product.main_cart_id')
            ->where('order.created_at', '>=', $formatted_date)
            ->select('order.created_at', 'main_cart_id.number')
            ->sum('number');


        $best_selling_products = Order::select(DB::raw('products.product_name, products.price,product_detail.product_image, SUM(cart_product.number) as number,products.id as prod_id'))
            ->join('cart', 'cart.id', 'order.main_cart_id')
            ->join('cart_product', 'cart.id', 'cart_product.main_cart_id')
            ->join('products', 'products.id', 'cart_product.product_id')
            ->join('product_detail', 'products.id', 'product_detail.product_id')
            ->groupBy('product_name', 'price', 'product_image', 'prod_id')
            ->orderBy(DB::raw('SUM(cart_product.number)'), 'desc')
            ->take(5)
            ->get();


        $best_selling_products_category = Order::select(DB::raw('categories.category_name, SUM(cart_product.number) as number,products.id as prod_id'))
            ->join('cart', 'cart.id', 'order.main_cart_id')
            ->join('cart_product', 'cart.id', 'cart_product.main_cart_id')
            ->join('products', 'products.id', 'cart_product.product_id')
            ->join('category_product', 'products.id', 'category_product.product_id')
            ->join('categories', 'categories.id', 'category_product.category_id')
            ->groupBy('category_name', 'prod_id',)
            ->orderBy(DB::raw('SUM(cart_product.number)'), 'desc')
            ->get();


        $best_selling_category = Order::select(DB::raw('categories.category_name, SUM(cart_product.number) as number  '))
            ->join('cart_product', 'cart_product.main_cart_id', 'order.main_cart_id')
            ->join('products', 'products.id', 'cart_product.product_id')
            ->join('category_product', 'products.id', 'category_product.product_id')
            ->join('categories', 'categories.id', 'category_product.category_id')
            ->groupBy('category_name', 'number',)
            ->orderBy(DB::raw('SUM(cart_product.number)'), 'desc')
            ->get();

        $color = ['grey', 'black', 'yellow', 'pink', 'red', 'green', 'black', 'yellow', 'pink', 'red', 'green', 'black', 'yellow', 'pink', 'red', 'green'];
        $color_int = 0;

        foreach ($best_selling_category as $category) {
            $best_selling_categories[] = [
                'category_name' => $category->category_name,
                'number' => (int)$category->number,
            ];
        }
        $best_selling_categories = collect($best_selling_categories);
        $best_selling_categories = $best_selling_categories->groupBy('category_name');
        $best_selling_categories = $best_selling_categories->map(function ($categoryGroup) {
            return collect($categoryGroup)->sum('number');
        });


        $highest_orders = Order::orderByDesc('order_price')
            ->take(5)
            ->get();


        $orders = Order::with('MainCart.user')
            ->orderByDesc('id')
            ->take(5)
            ->get();

        $year_sales = array();
        $month = 1;
        $interval = 0;
        while ($month < 13) {
            for ($month_edit = 0; $month_edit < $month; $month_edit++) {
                $first_date = new \DateTime('NOW ' . '-' . $month_edit . 'month');
                $first_formatted_date = $first_date->format('Y-m-d H:i:s');
            }
            $interval = $interval + 2;
            $last_date = new \DateTime('NOW ' . '-' . $month . 'month');
            $last_formatted_date = $last_date->format('Y-m-d H:i:s');
            $month_sales = Order::where([
                ['created_at', '<=', $first_formatted_date],
                ['created_at', '>=', $last_formatted_date],
            ])
                ->sum('order_price');
            $str = (string)$month_sales;
            $year_sales[$interval] = $str;
            $month++;
        }


        return view('/management/index', compact('color', 'color_int', 'year_sales', 'total_order', 'best_selling_categories', 'best_selling_products_category', 'highest_orders', 'all_sales', 'day_sales', 'day_sales_product', 'orders', 'pending_order', 'completed_order', 'total_product', 'total_category', 'total_user', 'best_selling_products'));
    }
}


//        $highest_orders = DB::table('order')
//            ->join('cart', 'cart.id', 'order.main_cart_id')
//            ->join('cart_product', 'cart.id', 'cart_product.main_cart_id')
//            ->join('user', 'user.id', 'cart.user_id')
//            ->select('order.*','user.name_surname')
//            ->orderByDesc('order_price')
//            ->take(5)
//            ->get();
//        $sales_by_month = Order::select(DB::DATE_FORMAT('order.created_at, %Y-%m)month, SUM(cart_product.number) as number'))
//        ->join('cart', 'cart.id', 'order.cart_id')
//        ->join('cart_product', 'cart.id', 'cart_product.cart_id')
//        ->join('products', 'products.id', 'cart_product.product_id')
//    ->groupBy(DATE_FORMAT('order.created_at, %Y-%m'))
//    ->orderBy(DATE_FORMAT('order.created_at, %Y-%m'))
//    ->get();
//        $best_selling_products = DB::select("
//            SELECT products.product_name, SUM(cart_product.number) number
//            FROM order
//            INNER JOIN cart.id = order.order_id
//            INNER JOIN   cart.id = cart_product.cart_id
//            INNER JOIN products.id = cart_product.products_id
//            GROUP BY products.product_name
//            ORDER BY SUM(cart_product.number) DESC
//        ");

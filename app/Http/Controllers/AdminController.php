<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Search;
use App\Models\User;
use Artisan;
use Cache;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard(Request $request)
    {
        // //CoreComponentRepository::initializeCache();

        $counts = [];

        $counts['totalUsersCount'] = Cache::remember('totalUsersCount', 86400, function () {
            return User::where('user_type', 'customer')->count();
        });
        $counts['totalOrderCount'] = Cache::remember('totalOrderCount', 86400, function () {
            return Order::count();
        });
        $counts['categoryCount'] = Cache::remember('totalOrderCount', 86400, function () {
            return Category::count();
        });
        $counts['brandCount'] = Cache::remember('totalOrderCount', 86400, function () {
            return Brand::count();
        });

        $root_categories = Category::where('level', 0)->get();

        $searches = Search::latest()->with(['user'])->limit(10)->get();

        // Top Selling products
        // $topOrders = OrderDetail::groupBy('product_id')->selectRaw('product_id, sum(quantity) as sum')->orderBy('sum', 'DESC')->limit(1)->get()->pluck('product_id')->toArray();

        // $topProducts = Product::whereIn('id', $topOrders)->get();

        $topProducts2 = Product::withSum('orderDetails', 'quantity')->orderBy('order_details_sum_quantity','DESC')->get()
            ->where('order_details_sum_quantity', '>', 0);

            // dd($topProducts2);

        $cached_graph_data = Cache::remember('cached_graph_data', 86400, function () use ($root_categories) {
            $num_of_sale_data = null;
            $qty_data = null;
            foreach ($root_categories as $key => $category) {
                $category_ids = \App\Utility\CategoryUtility::children_ids($category->id);
                $category_ids[] = $category->id;

                $products = Product::with('stocks')->whereIn('category_id', $category_ids)->get();
                $qty = 0;
                $sale = 0;
                foreach ($products as $key => $product) {
                    $sale += $product->num_of_sale;
                    foreach ($product->stocks as $key => $stock) {
                        $qty += $stock->qty;
                    }
                }
                $qty_data .= $qty . ',';
                $num_of_sale_data .= $sale . ',';
            }
            $item['num_of_sale_data'] = $num_of_sale_data;
            $item['qty_data'] = $qty_data;

            return $item;
        });

        return view('backend.dashboard', compact('root_categories', 'cached_graph_data', 'searches', 'counts'));
    }

    function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        flash(translate('Cache cleared successfully'))->success();
        return back();
    }
}

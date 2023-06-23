<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Shop;
use App\Utility\CategoryUtility;
use Cache;

class SearchController extends Controller
{
    public function index(Request $request, $category_id = null, $brand_id = null)
    {
        $query = $request->keyword;
        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        $conditions = ['published' => 1];

        $products = Product::where($conditions);

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        } elseif ($request->brand != null) {
            $brand_ids = explode(',', $request->brand);
            $products->whereIn('brand_id', $brand_ids);
        }

        if ($request->categories) {
            $categoryids = explode(',', $request->categories);
            $category_ids[] = $categoryids;
        }
        if ($request->category) {
            $category_ids[] = $request->category;
        }

        if ($category_id != null) {
            $category_ids[] = $category_id;
        }

        if (!empty($category_ids)) {
            $products->whereIn('category_id', $category_ids);
        }

        if ($min_price != null && $max_price != null) {
            $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if ($query != null) {
            $searchController = new SearchController;
            $searchController->store($request);

            $products->where(function ($q) use ($query) {
                foreach (explode(' ', trim($query)) as $word) {
                    $q->where('name', 'like', '%' . $word . '%')
                        ->orWhere('tags', 'like', '%' . $word . '%')
                        ->orWhereHas('stocks', function ($q) use ($word) {
                            $q->where('sku', 'like', '%' . $word . '%');
                        });
                }
            });
        }

        switch ($sort_by) {
            case 'newest':
                $products->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $products->orderBy('created_at', 'asc');
                break;
            case 'name':
                $products->orderBy('name', 'asc');
                break;
            case 'price-asc':
                $products->orderBy('unit_price', 'asc');
                break;
            case 'price-desc':
                $products->orderBy('unit_price', 'desc');
                break;
            default:
                $products->orderBy('created_at', 'desc');
                break;
        }

        $products = $products->select([
            'id',
            'name',
            'sku',
            'category_id',
            'brand_id',
            'thumbnail_img',
            'unit_price',
            'purchase_price',
            'rating',
            'slug',
            'discount',
            'discount_type',
            'discount_end_date',
            'discount_start_date',
        ])->with('brand')->paginate(35)->appends(request()->query());

        $min_price_slider = $products->min('unit_price');
        $max_price_slider = $products->max('unit_price');

        $brands = Cache::rememberForever('brandsWithCount', function () {
            return Brand::select([
                'id',
                'name',
                'slug',
            ])->get();
        });

        $category = Cache::rememberForever('categoriesTree', function () {
            return CategoryUtility::getSidebarCategoryTree();
        });

        $selected_category = $request->category ?? 0;
        $side_categories = $request->categories ?? 0;

        return view('frontend.product.product_listing', compact('products', 'category', 'query', 'category_id', 'side_categories', 'selected_category', 'brand_id', 'sort_by', 'min_price', 'max_price', 'min_price_slider', 'max_price_slider', 'brands'));
    }

    public function listing(Request $request)
    {
        return $this->index($request);
    }

    public function listingByCategory(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return $this->index($request, $category->id);
        }
        abort(404);
    }

    public function listingByBrand(Request $request, $brand_slug)
    {
        $brand = Brand::where('slug', $brand_slug)->first();
        if ($brand != null) {
            return $this->index($request, null, $brand->id);
        }
        abort(404);
    }

    //Suggestional Search
    public function ajax_search(Request $request)
    {
        $keywords = array();
        $query = $request->search;
        $products = Product::where('published', 1)->where('tags', 'like', '%' . $query . '%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',', $product->tags) as $key => $tag) {
                if (stripos($tag, $query) !== false) {
                    if (sizeof($keywords) > 5) {
                        break;
                    } else {
                        if (!in_array(strtolower($tag), $keywords)) {
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::query());

        $products = $products->where('published', 1)
            ->where(function ($q) use ($query) {
                foreach (explode(' ', trim($query)) as $word) {
                    $q->where('name', 'like', '%' . $word . '%')
                        ->orWhere('tags', 'like', '%' . $word . '%')
                        ->orWhereHas('product_translations', function ($q) use ($word) {
                            $q->where('name', 'like', '%' . $word . '%');
                        })
                        ->orWhereHas('stocks', function ($q) use ($word) {
                            $q->where('sku', 'like', '%' . $word . '%');
                        });
                }
            })
            ->limit(3)
            ->get();

        $categories = Category::where('name', 'like', '%' . $query . '%')->get()->take(3);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%' . $query . '%')->get()->take(3);

        if (sizeof($keywords) > 0 || sizeof($categories) > 0 || sizeof($products) > 0 || sizeof($shops) > 0) {
            return view('frontend.partials.search_content', compact('products', 'categories', 'keywords', 'shops'));
        }
        return '0';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $search = Search::where('query', $request->keyword)->first();
        // if ($search != null) {
        //     $search->count = $search->count + 1;
        //     $search->save();
        // } else {
        //     $search = new Search;
        //     $search->query = $request->keyword;
        //     $search->save();
        // }
    }
}

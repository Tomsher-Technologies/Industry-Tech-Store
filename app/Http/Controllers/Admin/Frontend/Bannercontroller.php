<?php

namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Frontend\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class Bannercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(15);
        return view('backend.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        flash(translate('Banner has been deleted successfully'))->success();
        return redirect()->route('banners.index');
    }

    public function get_form(Request $request)
    {
        if ($request->link_type == "product") {
            $products = Product::select(['id', 'name'])->get();
            return view('partials.banners.banner_form_product', compact('products'));
        } elseif ($request->link_type == "category") {
            $categories = Category::where('parent_id', 0)
                ->with('childrenCategories')
                ->get();
                
            return view('partials.banners.banner_form_category', compact('categories'));
        } else {
            return view('partials.banners.banner_form');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin\Classifieds;

use App\Http\Controllers\Controller;
use App\Models\Classifieds\ClassifiedCategory;
use App\Models\Classifieds\ClassifiedListing;
use Illuminate\Http\Request;

class CalssifiedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $query = ClassifiedListing::with('category');
        if ($request->search) {
            $sort_search = $request->search;
            $query->where('title', 'like', '%' . $sort_search . '%');
        }
        $classifides = $query->paginate(15);
        return view('backend.classifides.listing.index', compact('classifides', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ClassifiedCategory::where('parent_id', 0)
            ->with('childrenCategories')
            ->get();
        return view('backend.classifides.listing.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ClassifiedListing::create($request->all());
        flash(translate('Classified created'))->success();
        return redirect()->route('classifides.index');
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
    public function edit(ClassifiedListing $classifide)
    {
        $categories = ClassifiedCategory::where('parent_id', 0)
            ->with('childrenCategories')
            ->get();

        return view('backend.classifides.listing.edit')->with(compact('categories', 'classifide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassifiedListing $classifide)
    {
        $classifide->update($request->all());
        flash(translate('Classified updated'))->success();
        return redirect()->route('classifides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClassifiedListing::destroy($id);
        flash(translate('Classified deleted'))->success();
        return redirect()->route('classifides.index');
    }
}

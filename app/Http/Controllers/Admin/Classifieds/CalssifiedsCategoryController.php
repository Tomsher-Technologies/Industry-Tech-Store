<?php

namespace App\Http\Controllers\Admin\Classifieds;

use App\Http\Controllers\Controller;
use App\Models\Classifieds\ClassifiedCategory;
use Illuminate\Http\Request;

class CalssifiedsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ClassifiedCategory::with(['parent']);

        $sort_search =  null;

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
            $sort_search = $request->search;
        }

        $categories = $query->paginate(15);

        return view('backend.classifides.category.index')->with(compact('categories', 'sort_search'));
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
        return view('backend.classifides.category.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = 0;
        if ($request->parent_id != "0") {
            $parent = ClassifiedCategory::find($request->parent_id);
            $level = $parent->level + 1;
        }

        ClassifiedCategory::create(array_merge($request->all(), [
            'level' => $level
        ]));

        flash(translate('Category created'))->success();
        return redirect()->route('classifides_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('asd');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassifiedCategory $classifides_category)
    {
        $categories = ClassifiedCategory::where('parent_id', 0)
            ->where('id', '!=', $classifides_category->id)
            ->with('childrenCategories', function ($q) use ($classifides_category) {
                return $q->where('parent_id', '!=', $classifides_category->id)
                    ->where('id', '!=', $classifides_category->id);
            })
            ->get();

            // dd($classifides_category);

        return view('backend.classifides.category.edit')->with(compact('categories', 'classifides_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassifiedCategory $classifides_category)
    {

        $input = $request->all();
        $classifides_category->fill($input)->save();

        if ($request->parent_id != "0") {
            $classifides_category->parent_id = $request->parent_id;

            $parent = ClassifiedCategory::find($request->parent_id);
            $classifides_category->level = $parent->level + 1;
        } else {
            $classifides_category->parent_id = 0;
            $classifides_category->level = 0;
        }

        $classifides_category->save();

        flash(translate('Category has been updated successfully'))->success();
        return redirect()->route('classifides_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassifiedCategory $classifides_category)
    {
        $update = ClassifiedCategory::where('parent_id', $classifides_category->id)
            ->update([
                'parent_id' => 0
            ]);

        $classifides_category->delete();

        flash(translate('Category deleted'))->success();
        return back();
    }
}

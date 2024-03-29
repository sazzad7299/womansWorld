<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    private $childCategoryObject;

    public function __construct()
    {
        $this->childCategoryObject = new ChildCategory();
    }

    public function index()
    {
        $childCategories = $this->childCategoryObject->getChildCategoriesWithCategoryAndSubCategory();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.childCategory', compact('childCategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate(ChildCategory::$validateRule);
        $this->childCategoryObject->storeChildCategory($request);
        return back();
    }

    public function edit(ChildCategory $childCategory)
    {

        $childCategories = $this->childCategoryObject->getChildCategoriesWithCategoryAndSubCategory();
        $categories = Category::orderBy('name', 'asc')->get();
        $subCategories = SubCategory::where('category_id', $childCategory->category_id)->get();
        return view('backend.admin.childCategory', compact('categories', 'childCategory', 'subCategories', 'childCategories'));
    }

    public function update(Request $request, ChildCategory $childCategory)
    {
        $request->validate(ChildCategory::$validateRule);
        $this->childCategoryObject->updateChildCategory($request, $childCategory);
        return redirect()->route('admin.child-categories.index');
    }
    
    public function destroy(ChildCategory $childCategory)
    {
        $this->childCategoryObject->destroyChildCategory($childCategory);
        return back();
    }
}

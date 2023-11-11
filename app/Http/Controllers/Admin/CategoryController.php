<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    private $categoryObject;
    public function __construct()
    {
        $this->categoryObject = new Category();
    }

    public function index()
    {
        $categories = Category::tree();
        return view('backend.admin.category', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryObject->storeCategory($request);
        return back();
    }

    public function update(CategoryRequest $request)
    {
        $data = $request->all();
        // dd($data);
        // $updateCategory   = $category->fill($data)->save();
        $this->categoryObject->updateCategory($request, $request->id);
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $this->categoryObject->destroyCategory($id);
        return back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productObject;

    public function __construct()
    {
        $this->productObject = new Product();
    }

    public function index()
    {
            $products = Product::query()->with(['size','colors','photos'])->select(['id','name','price','display','status','brand_id'])->paginate(8);
        // return $products;
        return view('backend.admin.products.index',compact('products'));
    }

    public function create()
    {
        $sizes = Size::orderBy('name', 'asc')->get(['id', 'name']);
        $brands = Brand::orderBy('name', 'asc')->get(['id', 'name']);
        $categories = Category::with('children')->where('type',1)->whereNull('parent_id')->get();
        $indentedCategories = Category::getIndentedCategories($categories);
        return view('backend.admin.products.create', compact('sizes', 'indentedCategories', 'brands'));
    }

    public function store(ProductRequest $request)
    {
        $this->productObject->storeProduct($request);
        return back();
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $sizes = Size::orderBy('name', 'asc')->get(['id', 'name']);
        $colors = Color::orderBy('name', 'asc')->get(['id', 'name']);
        $categories = Category::with('children')->whereNull('parent_id')->get();

        $indentedCategories = Category::getIndentedCategories($categories);
        $brands = Brand::orderBy('name', 'asc')->get();
        $products = Product::query()->where('id',$product->id)->with(['size','colors','photos','brand'])->first();
        return view('backend.admin.products.edit', compact('sizes', 'colors', 'indentedCategories', 'brands', 'products'));
    }

    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $this->productObject->updateProduct($request, $product);
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $this->productObject->destroyProduct($product);
        return back();
    }
}

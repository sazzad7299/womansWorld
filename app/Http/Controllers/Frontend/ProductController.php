<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductsApiResource;
use App\Http\Resources\V1\ProductDetailsApiResource;

class ProductController extends Controller
{
    public function shop(Request $request){
        $query = Product::query();
        if ($request->has('category')) {
            $category = Category::with('children')->where('slug', $request->category)->first();

            if (isset($category)) {
                $categoryId = $category->id;
                $childIds = $category->children->pluck('id')->toArray();
                $childIds = array_merge([$categoryId], $childIds);

                $query->where('status', 1)->whereIn('category_id', $childIds);
            }
            // $query->where('category_id', $request->category_id);
        }
        // Filter by product name
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('type')) {
            switch ($request->type) {
                case 'new':
                    $query->where('status', 1)->where('new', 1);
                    break;
                case 'featured':
                    $query->where('status', 1)->where('featured', 1);
                    break;
                case 'perfume-set':
                    $query->where('status', 1)->where('p_set', 1);
                    break;
                case 'offer':
                    $query->where('status', 1)->where('discount_type', '!=', 0);
                    break;
                default:
                    break;
            }
        }

        // Filter by price range
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->where('status', 1)->whereBetween('price', [$request->min_price, $request->max_price]);
        }



        if ($request->has('brand')) {
            $brand = Brand::where('slug', $request->brand)->first();
            // return $brand;
            if (isset($brand)) {
                $query->where('status', 1)->where('brand_id', $brand->id);
            }
        }
        $products = $query->paginate(10);
        return view('frontend.pages.shop',compact('products'));
    }
    public function products($id)
    {
        $category = ChildCategory::findOrFail($id);
        $products  = Product::where('child_category_id', $id)->get();
        return view('frontend.products', compact('products', 'category'));
    }

    public function product($slug)
    {
        $getProduct  = Product::where('slug', $slug)->firstOrFail();

        if(isset($getProduct)){
            $product = new ProductDetailsApiResource($getProduct);
            $product2 = Product::where('status',1)
            ->withCount('reviews as total_reviewes')
            ->withAvg('reviews as total_avarage_rating','rating')
            ->where('id', '!=', $product->id)
            ->orWhere('category_id',$product->category_id)
            ->orWhere('brand_id',$product->brand_id)
            ->orWhere('name','like', '%'.$product->name.'%')
            ->latest()->limit(10)->get();
            if(isset($product2)){
                $relatedProduct= ProductsApiResource::collection($product2);
            }else{
                $relatedProduct= ProductsApiResource::collection(Product::inRandomOrder()->limit(10)->get());
            }
            
        }
        return view('frontend.pages.product-details', compact('product', 'relatedProduct'));
    }
}

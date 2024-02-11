<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Null_;
use App\Http\Resources\V1\ProductsApiResource;
use App\Http\Resources\V1\ProductMiniCollection;
use App\Http\Resources\V1\ProductBrandApiResource;
use App\Http\Resources\V1\CategoryParentApiResource;
use App\Http\Resources\V1\ProductDetailsApiResource;

class ProductController extends Controller
{
    public function index()
    {
        return ProductsApiResource::collection(Product::latest()->paginate(10));
    }
    public function show($slug)
    {
        $getProduct = Product::where('slug', $slug)->where('status',1)->first();
        // return dd($getProduct);
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
            return response()->json(['product'=>$product,'relatedProduct'=>$relatedProduct],200) ;
        }
        else{
            return response()->json(['status'=>"Error",'message'=>"No Product Found"],404);
        }
    }
}

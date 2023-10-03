<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductsApiResource;

class BrandController extends Controller
{
    public function brands()
    {
        $brands = Brand::query()->where('status',1)->latest()->get();
        return response()->json($brands,200);
    }
    public function brand($slug)
    {
        $brand = Brand::query()->where('slug',$slug)->where('status',1)->first();
        $brand = Brand::query()->with(
            ['products'=>function($query){
            $query->where('status',1)->select(['id','name','slug','category_id','brand_id','display','status']);
        }])->where('slug',$slug)->first();
        if($brand){
            $product =  Product::query()->where('status',1)->where('brand_id',$brand->id)->paginate(50);
            if($product){
                $products = ProductsApiResource::collection($product);
                return response()->json($products,200);
            }

        }else{
            return response()->json([
                'status'=>"brand Not Found",
            ],404);
        }
    }
}

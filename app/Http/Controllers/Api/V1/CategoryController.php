<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductsApiResource;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::tree();
        return response()->json($categories,200);
    }
    public static function productbycategory($slug)
    {

        $category = Category::with('children')->where('slug',$slug)->first();

        if($category){
            $categoryId =$category->id;
            $childIds = $category->children->pluck('id')->toArray();
        $childIds = array_merge([$categoryId], $childIds);

        $products = Product::whereIn('category_id', $childIds)
            ->where('status', 1)
            ->paginate(20);
            $all = ProductsApiResource::collection($products);
        return $all;
        }else{
            return response()->json(['Status'=>'error','message'=>"Category not Found"]);
        }

    }
}

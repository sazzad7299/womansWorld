<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\WishlistResource;
use App\Http\Resources\V1\ProductsApiResource;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = auth('sanctum')->user()->id;
       $wishlistItems = Wishlist::query()->where('user_id',$user)->with('product')->get();
       $product = [];
       foreach($wishlistItems as $item){
        $product[]= $item['product'];
       }

       return ProductsApiResource::collection($product);
    //    return WishlistResource::collection($wishlistItems);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth('sanctum')->user()->id;
        $validatedData = $request->validate([
            'product_id' => 'required|unique:wishlists,product_id,NULL,id,user_id,' . $user,
        ],[
            'product_id.unique' => 'You have already added this product',
        ]);

        $review = new Wishlist([
            'user_id' => $user,
            'product_id' => $validatedData['product_id'],
        ]);
        if ($review->save()) {
            return response()->json(['message' => 'Product Added to your wishlist'], 201);
        } else {
            return response()->json(['message' => 'Failed to save wishlist'], 500);
        }
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
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        $user = auth('sanctum')->user()->id;
        $wishlist = Wishlist::query()->where('user_id',$user)->where('product_id',$id)->first();
        try {

            $wishlist->delete();
            return response()->json(['message'=>'Product removed from wishlist'],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

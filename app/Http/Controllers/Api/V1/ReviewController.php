<?php

namespace App\Http\Controllers\Api\V1;

use sanctum;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function store(Request $request)
    {

            $user = auth('sanctum')->user()->id;
        $validatedData = $request->validate([
            'product_id' => 'required|unique:reviews,product_id,NULL,id,user_id,' . $user,
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'body' => ['required', 'string'],
        ],[
            'product_id.unique' => 'You have already reviewed this product',
        ]);

        $review = new Review([
            'user_id' => $user,
            'product_id' => $validatedData['product_id'],
            'rating' => $validatedData['rating'],
            'body' => $validatedData['body'],
        ]);
        if ($review->save()) {
            return response()->json(['message' => 'Review saved successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to save review'], 500);
        }
    }

}

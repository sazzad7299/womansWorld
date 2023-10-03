<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\getProductRequest;
use App\Models\ProductRequest;
use Illuminate\Http\Request;

class ProductRequestController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(getProductRequest $request,ProductRequest $productrequest)
    {
        $user_id = auth('sanctum')->user()->id;
        $response = $productrequest->storeProduct($request,$user_id);
        return $response;


    }

}
